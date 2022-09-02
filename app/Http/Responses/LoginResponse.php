<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        if (Auth::user()->role == "Administration") {
        	$home = config('fortify.home');
        } elseif (Auth::user()->role == "Chairman") {
        	$home = config('fortify.chair');
        } elseif (Auth::user()->role == "Teacher") {
        	$home = config('fortify.teach');
        }

        // $home = Auth::user()->role == "Administration" ? config('fortify.home') : config('fortify.teach');
        
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect($home);
    }

}