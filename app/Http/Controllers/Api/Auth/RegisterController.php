<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Http\Requests\Api\Register;

/**
 * API user registration
 *
 * @Resource("Register", uri="/auth/register")
 */
class RegisterController extends ApiController
{
    /**
     * Register api
     *
     * @param \Illuminate\Http\Register $request.
     * @return \Illuminate\Http\Response
     */
    public function store(Register $request)
    {
    	$user = new User;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->fill($request->except(['email', 'password']));

    	if($user->save()) {

    		return $this->response->array([
    			'status' => 200,
    			'message' => 'Successfully registered'
    		]);
    	}

    	return $this->response->errorInternal('Error occurred');
    }
}
