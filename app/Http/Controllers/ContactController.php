<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\ContactEmail;


class ContactController extends Controller
{

  public function form(){
    return view("contact");
  }

  public function store(Request $request){

    $contact = [];
    $contact['name'] = $request->get('name');
    $contact['email'] = $request->get('email');
    $contact['message'] = $request->get('message');

    \Mail::to($contact['email'])->send(new ContactEmail($contact));

    flash('Your message has been sent!')->success();

    return redirect()->route('blog.contact');
  }
}
