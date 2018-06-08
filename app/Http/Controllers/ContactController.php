<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
         return view('contact.create');
    }

    public function send(ContactFormRequest $request)
    {

        $contact = [];

        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');

        Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));
        
        return redirect()->route('contact.create')->with('success', 'Your message has been sent!');;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'message' => 'required|string|min:10|max:2000',
            'g-recaptcha-response' => new Captcha()
        ]);

        Contact::create(
            [
            'email' => $validatedData['email'],
            'message' => $validatedData['message']
            ]
        );

        return redirect()->back()->with('message', 'Contact us query submitted successfully');
    }
}
