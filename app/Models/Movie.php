<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $cinema_id cinema id
@property varchar $name name
@property varchar $director_name director name
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property Cinema $cinema belongsTo
   
 */
class Movie extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'movies';

    /**
    * Mass assignable columns
    */
    protected $fillable=['cinema_id','name','director_name'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * cinema
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function cinema()
    {
        return $this->belongsTo(Cinema::class,'cinema_id');
    }




}