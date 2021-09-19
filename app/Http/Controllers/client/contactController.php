<?php

namespace App\Http\Controllers\client;

use App\Notifications\ContactReplyNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
     public function contactIndex()
    {


        return view('client.pages.Contact');
    }

     function ContactSend(Request $request){

        $validator=Validator::make(request()->all(),[
        'name'=>'required',
        'subject'=>'required',
        'massage'=>'required',
        'email'=>'required | email',
        'PhonNumber'=>'required|min:8| max:16',


       ]);

       if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $name=$request->input('name');
        $email=$request->input('email');
        $subject=$request->input('subject');
        $PhonNumber=$request->input('PhonNumber');
        $massage=$request->input('massage');


        $contact= new Contact();
        $contact->name=$name;
        $contact->email=$email;
        $contact->subject=$subject;
        $contact->mobile=$PhonNumber;
        $contact->msg=$massage;
       $result= $contact->save();

       if ( $result) {
          return 1;
       }else {
        return 0;
       }


    }
}
