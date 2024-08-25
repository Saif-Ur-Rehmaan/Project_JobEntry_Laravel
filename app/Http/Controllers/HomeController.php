<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexPage(){

        
        return view('index');
    }
    public function AboutPage(){
        return view('about');
    }
    public function ErrorPage(){
        return view('error');
    }
    public function TestimonialPage(){
        return view('testimonial');
    }
    public function ContactUsPage(){
        return view('contactus');
    }
}
