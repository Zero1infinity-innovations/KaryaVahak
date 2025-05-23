<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home | Zero1infinity Innovations A Software Solution Company';
        return view('Frontend.index', $data);
    }

    // register your company page
    public function RegisterYourCompany()
    {
        $data['title'] = 'Register Your Company | Zero1infinity Innovations A Software Solution Company';
        return view("Frontend.Pages.register", $data);
    }

    // store company register data
    public function StoreYourCompany(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'coname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            Session::flash('error',  $validator->errors());
            return redirect()->back()->withInput();
        }

        $validated = $validator->validated();


        if ($req->hasFile('logo')) {
            $logoPath = $req->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }

        $validated['password'] = Hash::make($validated['password']);

        $company = Company::create($validated);

        if ($company) {

            $emailData = collect($validated)->except(['password', 'logo'])->all();

            $emailBody = "<h3>Hello {$emailData['name']},</h3>";
            $emailBody .= "<p>Your company has been successfully registered with the following details:</p><ul>";

            foreach ($emailData as $key => $value) {
                $label = ucwords(str_replace('_', ' ', $key));
                $emailBody .= "<li><strong>{$label}:</strong> {$value}</li>";
            }

            $emailBody .= "</ul><p>Thank you!</p>";

            MailHelper::sendMail(
                $validated['email'],
                'Company Registration Confirmation',
                $emailBody
            );

            $erpData = collect($validated)->except(['password', 'logo'])->all();

            $erpBody = "<h3>New Company Registration Details:</h3><ul>";

            foreach ($erpData as $key => $value) {
                $label = ucwords(str_replace('_', ' ', $key));
                $erpBody .= "<li><strong>{$label}:</strong> {$value}</li>";
            }

            $erpBody .= "</ul>";

            MailHelper::sendMail(
                'info@z1iinnovation.com',
                'New Company Registered - Full Details',
                $erpBody
            );

            Session::flash('success', 'Company registered successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Company registration failed!');
            return redirect()->back()->withInput();
        }
    }

    // LoginYourCompany
    public function LoginYourCompany()
    {
        $data["title"] = "Login Your Company | Zero1infinity Innovations A Software Solution Company";
        return view("Frontend.Pages.login", $data);
    }


    // forgetpassword
    public function ForgetPassword()
    {
        $data['title'] = "Forget Your Password | Zero1infinity Innovations A Software Solution Company";
        return view("Frontend.Pages.forgetpassword", $data);
    }

    // send reset link
    public function SendResetLink(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            Session::flash('error',  $validator->errors());
            return redirect()->back()->withInput();
        }

        $validated = $validator->validated();

        $getCompanyData = Company::where('email', $req->email)->first();
        if (!is_null($getCompanyData)) {
            // dd($getCompanyData);
            $token = Str::random(64);
            $resetLink = route('resetPasswordForm', ['token' => $token, 'email' => $req->email]);

            DB::table('company_password_resets')->updateOrInsert(
                ['email' => $req->email],
                ['token' => $token, 'created_at' => now()]
            );

            $emailBody = "
            <div style='font-family: Arial, sans-serif; text-align: center; padding: 20px; max-width: 600px; margin: auto;'>
                <h2>Hello {$getCompanyData->name},</h2>
                <p style='text-align: justify;'>
                    You have requested to reset your password for your KaryaVahak account. Please click the button below to proceed. 
                    This link will expire in <strong>30 minutes</strong>.
                </p>
                <a href='{$resetLink}' style='
                    background-color: #007bff;
                    color: #fff;
                    padding: 12px 24px;
                    display: inline-block;
                    border-radius: 6px;
                    text-decoration: none;
                    font-weight: bold;
                    margin-top: 20px;
                '>Reset Password</a>
                <p style='margin-top: 30px; font-size: 14px; color: #555;'>If you did not request a password reset, please ignore this email.</p>
            </div>
            ";


            MailHelper::sendMail(
                $validated['email'],
                'Reset Link',
                $emailBody
            );
            Session::flash('success', 'Password reset link sent on your email!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Entred email is not registered!');
            return redirect()->back()->withInput();
        }
    }

    // show reset form
    public function showResetForm(Request $request)
    {
        $title = "Reset Password | Zero1infinity Innovations A Software Solution Company";
        $email = $request->query('email');
        $token = $request->query('token');

        $data = DB::table('company_password_resets')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$data || Carbon::parse($data->created_at)->addMinutes(30)->isPast()) {
            Session::flash('error', 'Token expired or invalid!');
            return redirect()->route('forgetPassword');
        }

        return view('Frontend.Pages.resetpassword', compact('email', 'token', 'title'));
    }


    // submit reset password
    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $check = DB::table('company_password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$check || Carbon::parse($check->created_at)->addMinutes(30)->isPast()) {
            return back()->with('error', 'This token is invalid or has expired.');
        }

        Company::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('company_password_resets')->where('email', $request->email)->delete();
        Session::flash('success', 'Password reset successfully.');
        return redirect()->route('loginCompany');
    }
}
