<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller
{
        /**
      	 *
     	 *
     	 **/
    	public function index() {
   		echo "<pre>"; print_r(\Auth::user()); echo "</pre>";  echo "Success"; 
		\Auth::logout();   
	}
}
