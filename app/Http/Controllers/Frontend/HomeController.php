<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
