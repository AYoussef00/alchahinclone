<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller; // Import the base controller
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('web-views/pages/contact-us');
    }
}
