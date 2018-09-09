<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Actor;
use App\Transformers\ActorTransformer;
use App\Http\Requests\Api\Actors\Index;
use App\Http\Requests\Api\Actors\Show;
use App\Http\Requests\Api\Actors\Store;
use App\Http\Requests\Api\Actors\Update;
use App\Http\Requests\Api\Actors\Destroy;


/**
 * Actor
 *
 * @Resource("Actor", uri="/actors")
 */

class ActorController extends ApiController
{
        /**
     * List of Actor
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
       return $this->response->paginator(Actor::paginate(10), new ActorTransformer());
    }
     /**
     * Show details about a Actor
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Actor",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Actor]."})
     * })
     */
    public function show(Show $request, $actor)
    {
      $actor = Actor::findOrFail($actor);
      return $this->response->item($actor, new ActorTransformer());
    }
    /**
     * Create a Actor
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "name": "required|max:191",
    "gender": "required|in:male,female",
    "phone": "nullable|max:191"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Actor"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Actor;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new ActorTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Actor');
        }
    }
    /**
     * Update a existing Actor
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Actor", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "name": "required|max:191",
    "gender": "required|in:male,female",
    "phone": "nullable|max:191"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Actor]."})
     * })
     */
    public function update(Update $request, $actor)
    {
        $actor = Actor::findOrFail($actor);
        $actor->fill($request->all());

        if ($actor->save()) {
            return $this->response->item($actor, new ActorTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Actor');
        }
    }
    /**
     * Delete an existing Actor
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Actor",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Actor successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Actor]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Actor"})
     * })
     */
    public function destroy(Destroy $request, $actor)
    {
        $actor = Actor::findOrFail($actor);

        if ($actor->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Actor successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Actor');
        }
    }

}
