<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{

   public function sendQuery(Request $req){
      $ValidatedData=$req->validate([
         'Name'=>['required'],
         'Email'=>['required','unique:_messages,Email','email'],
         'Subject'=>['required','max:10'],
         'Message'=>['required'],
      ]); 
      Message::create([
         'Name'=>$ValidatedData["Name"],
         'Email'=>$ValidatedData["Email"],
         'Subject'=>$ValidatedData["Subject"],
         'Message'=>$ValidatedData["Message"]
      ]);

      return back()->with('success','Your Query Was Send Successfully!');
   }
}
