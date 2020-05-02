<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Localecontroller extends Controller
{
    public function en(Request $request) {

     $request->session()->put('lang' , 'en') ;

     return back() ;
    }


      public function ar(Request $request) {

     $request->session()->put('lang' , 'ar') ;

     return back() ;
   }
}

    public function email(Request $request) {

      Mail::to('diyaa@gmail.com')->send(new welcomeMail);
      return success() ;
   }


