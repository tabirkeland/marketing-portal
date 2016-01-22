<?php

namespace App\Http\Controllers;

use Mail;
use Input;
use Redirect;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function getHome(Request $request)
    {
        return view('marketing.home');
    }

    public function getAbout(Request $request)
    {
        return view('marketing.about');
    }

    public function getServices(Request $request)
    {
        return view('marketing.services');
    }

    public function getContact(Request $request)
    {
        return view('marketing.contact');
    }

    public function postContactForm(Request $request)
    {
        $form = Input::all();

        $sent = Mail::raw($form['message'], function ($m) use ($form) {
            $m->to('tabirkeland@gmail.com');
            $m->from($form['email']);
            $m->subject('Contact Form from: ' . $form['name']);
        });

        if ($sent) {
            return redirect('contact')->with('status', 'Your message was successfully sent!');
        }

        return redirect('contact.get')->with('error_message', 'Sorry, we were unable to send your message.');
    }
}
