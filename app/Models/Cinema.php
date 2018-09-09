<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Cinema extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'cinemas';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}