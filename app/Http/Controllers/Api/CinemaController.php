<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Cinema;
use App\Transformers\CinemaTransformer;
use App\Http\Requests\Api\Cinemas\Index;
use App\Http\Requests\Api\Cinemas\Show;
use App\Http\Requests\Api\Cinemas\Store;
use App\Http\Requests\Api\Cinemas\Update;
use App\Http\Requests\Api\Cinemas\Destroy;


/**
 * Cinema
 *
 * @Resource("Cinema", uri="/cinemas")
 */

class CinemaController extends ApiController
{
        /**
     * List of Cinema
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
       return $this->response->paginator(Cinema::paginate(10), new CinemaTransformer());
    }
     /**
     * Show details about a Cinema
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Cinema",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Cinema]."})
     * })
     */
    public function show(Show $request, $cinema)
    {
      $cinema = Cinema::findOrFail($cinema);
      return $this->response->item($cinema, new CinemaTransformer());
    }
    /**
     * Create a Cinema
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "name": "required|max:191"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Cinema"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Cinema;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new CinemaTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Cinema');
        }
    }
    /**
     * Update a existing Cinema
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Cinema", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "name": "required|max:191"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Cinema]."})
     * })
     */
    public function update(Update $request, $cinema)
    {
        $cinema = Cinema::findOrFail($cinema);
        $cinema->fill($request->all());

        if ($cinema->save()) {
            return $this->response->item($cinema, new CinemaTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Cinema');
        }
    }
    /**
     * Delete an existing Cinema
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Cinema",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Cinema successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Cinema]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Cinema"})
     * })
     */
    public function destroy(Destroy $request, $cinema)
    {
        $cinema = Cinema::findOrFail($cinema);

        if ($cinema->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Cinema successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Cinema');
        }
    }

}
