<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Ticket;
use App\Transformers\TicketTransformer;
use App\Http\Requests\Api\Tickets\Index;
use App\Http\Requests\Api\Tickets\Show;
use App\Http\Requests\Api\Tickets\Store;
use App\Http\Requests\Api\Tickets\Update;
use App\Http\Requests\Api\Tickets\Destroy;


/**
 * Ticket
 *
 * @Resource("Ticket", uri="/tickets")
 */

class TicketController extends ApiController
{
        /**
     * List of Ticket
     *
     * @Get("/")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("page", description="The page of results to view.", type="integer", default=1)
     * })
     * @Response(200, body={
       "data": {{{}}}
    })
     */
    public function index(Index $request)
    {
       return $this->response->paginator(Ticket::paginate(10), new TicketTransformer());
    }
     /**
     * Show details about a Ticket
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Ticket",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Ticket]."})
     * })
     */
    public function show(Show $request, $ticket)
    {
      $ticket = Ticket::findOrFail($ticket);
      return $this->response->item($ticket, new TicketTransformer());
    }
    /**
     * Create a Ticket
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "spectator_id": "required|numeric",
    "ticket_no": "required|unique:tickets,ticket_no|max:10",
    "start_time": "required|date",
    "end_time": "required|date"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Ticket"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Ticket;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new TicketTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Ticket');
        }
    }
    /**
     * Update a existing Ticket
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Ticket", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "spectator_id": "required|numeric",
    "ticket_no": "required|unique:tickets,ticket_no|max:10",
    "start_time": "required|date",
    "end_time": "required|date"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Ticket]."})
     * })
     */
    public function update(Update $request, $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->fill($request->all());

        if ($ticket->save()) {
            return $this->response->item($ticket, new TicketTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Ticket');
        }
    }
    /**
     * Delete an existing Ticket
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Ticket",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Ticket successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Ticket]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Ticket"})
     * })
     */
    public function destroy(Destroy $request, $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);

        if ($ticket->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Ticket successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Ticket');
        }
    }

}
