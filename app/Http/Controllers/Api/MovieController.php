<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Movie;
use App\Transformers\MovieTransformer;
use App\Models\Cinema;
use App\Http\Requests\Api\Movies\Index;
use App\Http\Requests\Api\Movies\Show;
use App\Http\Requests\Api\Movies\Store;
use App\Http\Requests\Api\Movies\Update;
use App\Http\Requests\Api\Movies\Destroy;


/**
 * Movie
 *
 * @Resource("Movie", uri="/movies")
 */

class MovieController extends ApiController
{
        /**
     * List of Movie
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
       return $this->response->paginator(Movie::paginate(10), new MovieTransformer());
    }
     /**
     * Show details about a Movie
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Movie",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Movie]."})
     * })
     */
    public function show(Show $request, $movie)
    {
      $movie = Movie::findOrFail($movie);
      return $this->response->item($movie, new MovieTransformer());
    }
    /**
     * Create a Movie
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "cinema_id": "required|exists:cinemas,id|numeric",
    "name": "required|max:191",
    "director_name": "required|max:191"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Movie"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Movie;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new MovieTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Movie');
        }
    }
    /**
     * Update a existing Movie
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Movie", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "cinema_id": "required|exists:cinemas,id|numeric",
    "name": "required|max:191",
    "director_name": "required|max:191"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Movie]."})
     * })
     */
    public function update(Update $request, $movie)
    {
        $movie = Movie::findOrFail($movie);
        $movie->fill($request->all());

        if ($movie->save()) {
            return $this->response->item($movie, new MovieTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Movie');
        }
    }
    /**
     * Delete an existing Movie
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Movie",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Movie successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Movie]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Movie"})
     * })
     */
    public function destroy(Destroy $request, $movie)
    {
        $movie = Movie::findOrFail($movie);

        if ($movie->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Movie successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Movie');
        }
    }

}
