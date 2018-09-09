<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property enum $gender gender
@property varchar $phone phone
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Actor extends Model 
{
    const GENDER_MALE='male';

const GENDER_FEMALE='female';

    /**
    * Database table name
    */
    protected $table = 'actors';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name','gender','phone'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}