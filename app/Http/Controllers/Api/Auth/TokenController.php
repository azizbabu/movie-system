<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Authenticate;
use Illuminate\Support\Facades\Auth;

/**
 * API authentication
 *
 *
 *
 * @Resource("Authenticate", uri="/auth/token")
 */
class TokenController extends ApiController
{
    /**
     * Login api
     *
     * @param \App\Http\Requests\Api\Authenticate $request.
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Authenticate $request)
    {
    	$credentials = $request->only('email', 'password');

    	if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

    		$user = Auth::user();

    		try {
    			if(!$token = $user->createToken('MyApp')->accessToken) {
    				return $this->response->errorInternal('Could not create token from logged in user');
    			}
	    	} catch (Exception $ex) {
	    		return $this->response->errorInternal('Could not create token');
	    	}

	    	return $this->response->array([
	    		'token'	=> $token
	    	]);
    	}
    	
    	return $this->response->errorUnauthorized();
    }
}
