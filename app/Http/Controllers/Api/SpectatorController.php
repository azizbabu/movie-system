<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Spectator;
use App\Transformers\SpectatorTransformer;
use App\Http\Requests\Api\Spectators\Index;
use App\Http\Requests\Api\Spectators\Show;
use App\Http\Requests\Api\Spectators\Store;
use App\Http\Requests\Api\Spectators\Update;
use App\Http\Requests\Api\Spectators\Destroy;


/**
 * Spectator
 *
 * @Resource("Spectator", uri="/spectators")
 */

class SpectatorController extends ApiController
{
        /**
     * List of Spectator
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
       return $this->response->paginator(Spectator::paginate(10), new SpectatorTransformer());
    }
     /**
     * Show details about a Spectator
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Spectator",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Spectator]."})
     * })
     */
    public function show(Show $request, $spectator)
    {
      $spectator = Spectator::findOrFail($spectator);
      return $this->response->item($spectator, new SpectatorTransformer());
    }
    /**
     * Create a Spectator
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
     *      @Response(500, body={"message": "Error occurred while saving Spectator"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Spectator;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new SpectatorTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Spectator');
        }
    }
    /**
     * Update a existing Spectator
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Spectator", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "name": "required|max:191",
    "gender": "required|in:male,female",
    "phone": "nullable|max:191"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Spectator]."})
     * })
     */
    public function update(Update $request, $spectator)
    {
        $spectator = Spectator::findOrFail($spectator);
        $spectator->fill($request->all());

        if ($spectator->save()) {
            return $this->response->item($spectator, new SpectatorTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Spectator');
        }
    }
    /**
     * Delete an existing Spectator
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Spectator",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Spectator successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Spectator]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Spectator"})
     * })
     */
    public function destroy(Destroy $request, $spectator)
    {
        $spectator = Spectator::findOrFail($spectator);

        if ($spectator->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Spectator successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Spectator');
        }
    }

}
