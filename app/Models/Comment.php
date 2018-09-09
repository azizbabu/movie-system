<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $movie_id movie id
@property int $spectator_id spectator id
@property text $comment comment
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property Spectator $spectator belongsTo
@property Movie $movie belongsTo
   
 */
class Comment extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'comments';

    /**
    * Mass assignable columns
    */
    protected $fillable=['movie_id','spectator_id','comment'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * spectator
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function spectator()
    {
        return $this->belongsTo(Spectator::class,'spectator_id');
    }

    /**
    * movie
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function movie()
    {
        return $this->belongsTo(Movie::class,'movie_id');
    }




}