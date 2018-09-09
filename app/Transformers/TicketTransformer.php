<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Ticket;

class TicketTransformer extends TransformerAbstract
{
    public function __construct()
    {

    }

    /**
     * @var array
     */
    private $validParams = ['q', 'limit', 'page'];

    /**
     * @var array
     */
    protected $availableIncludes = [];

     /**
      * @var array
      */
    protected $defaultIncludes = [];


    public function transform(Ticket $ticket)
    {
        return [
			"id" => $ticket->id,
			"spectator_id" => $ticket->spectator_id,
			"ticket_no" => $ticket->ticket_no,
			"start_time" => $ticket->start_time,
			"end_time" => $ticket->end_time,
			"created_at" => $ticket->created_at,
			"updated_at" => $ticket->updated_at,

        ];

    }
}