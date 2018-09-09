<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $spectator_id spectator id
@property varchar $ticket_no ticket no
@property datetime $start_time start time
@property datetime $end_time end time
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Ticket extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tickets';

    /**
    * Mass assignable columns
    */
    protected $fillable=['spectator_id','ticket_no','start_time','end_time'];

    /**
    * Date time columns.
    */
    protected $dates=['start_time','end_time'];




}