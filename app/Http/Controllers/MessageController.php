<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   public function send(Request $request,$lang)
   {
       $validatedData = $request->validate([
          'name'=> 'required|max:255',
          'email'=> 'required|max:255|email',
           'subject'=> 'required|max:255',
           'message'=> 'required|min:25'
       ]);

       if(Message::create($validatedData)) {
           return redirect()->to('/' . $lang . '/contact')->with([
               'success' => 'Message Sent Successfully'
           ]);
       }

       abort(500);
   }
}
