<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Rating;
use App\Transformers\RatingTransformer;
use App\Models\Movie;
use App\Models\Spectator;
use App\Http\Requests\Api\Ratings\Index;
use App\Http\Requests\Api\Ratings\Show;
use App\Http\Requests\Api\Ratings\Store;
use App\Http\Requests\Api\Ratings\Update;
use App\Http\Requests\Api\Ratings\Destroy;


/**
 * Rating
 *
 * @Resource("Rating", uri="/ratings")
 */

class RatingController extends ApiController
{
        /**
     * List of Rating
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
       return $this->response->paginator(Rating::paginate(10), new RatingTransformer());
    }
     /**
     * Show details about a Rating
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Rating",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Rating]."})
     * })
     */
    public function show(Show $request, $rating)
    {
      $rating = Rating::findOrFail($rating);
      return $this->response->item($rating, new RatingTransformer());
    }
    /**
     * Create a Rating
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "movie_id": "required|exists:movies,id|numeric",
    "spectator_id": "required|exists:spectators,id|numeric",
    "ratings": "required|numeric"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Rating"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Rating;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new RatingTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Rating');
        }
    }
    /**
     * Update a existing Rating
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Rating", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "movie_id": "required|exists:movies,id|numeric",
    "spectator_id": "required|exists:spectators,id|numeric",
    "ratings": "required|numeric"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Rating]."})
     * })
     */
    public function update(Update $request, $rating)
    {
        $rating = Rating::findOrFail($rating);
        $rating->fill($request->all());

        if ($rating->save()) {
            return $this->response->item($rating, new RatingTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Rating');
        }
    }
    /**
     * Delete an existing Rating
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Rating",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Rating successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Rating]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Rating"})
     * })
     */
    public function destroy(Destroy $request, $rating)
    {
        $rating = Rating::findOrFail($rating);

        if ($rating->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Rating successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Rating');
        }
    }

}
