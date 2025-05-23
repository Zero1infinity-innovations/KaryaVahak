<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
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

            $erpData = collect($validated)->all();

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
            return redirect()->back();
        }
    }
}
