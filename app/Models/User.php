<?php
namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
   @property varchar $name name
@property varchar $email email
@property varchar $password password
@property varchar $remember_token remember token
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class User extends Authenticatable 
{
    use HasApiTokens, Notifiable;
    
    /**
    * Database table name
    */
    protected $table = 'users';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name','email'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}