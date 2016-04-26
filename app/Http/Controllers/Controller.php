<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	/*
         * Generate Random String
         * @param $length (int)
         * @return (string)
         **/
	public function generateRandomString($length = 10) {
        	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        	$charactersLength = strlen($characters);
        	$randomString = '';
        	for ($i = 0; $i < $length; $i++) {
               		$randomString .= $characters[rand(0, $charactersLength - 1)];
        	}
        	return $randomString;
    	}
}
