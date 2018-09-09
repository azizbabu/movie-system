<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Comment;
use App\Transformers\CommentTransformer;
use App\Models\Movie;
use App\Models\Spectator;
use App\Http\Requests\Api\Comments\Index;
use App\Http\Requests\Api\Comments\Show;
use App\Http\Requests\Api\Comments\Store;
use App\Http\Requests\Api\Comments\Update;
use App\Http\Requests\Api\Comments\Destroy;


/**
 * Comment
 *
 * @Resource("Comment", uri="/comments")
 */

class CommentController extends ApiController
{
        /**
     * List of Comment
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
       return $this->response->paginator(Comment::paginate(10), new CommentTransformer());
    }
     /**
     * Show details about a Comment
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Comment",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Comment]."})
     * })
     */
    public function show(Show $request, $comment)
    {
      $comment = Comment::findOrFail($comment);
      return $this->response->item($comment, new CommentTransformer());
    }
    /**
     * Create a Comment
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "movie_id": "required|exists:movies,id|numeric",
    "spectator_id": "required|exists:spectators,id|numeric",
    "comment": "required|string"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Comment"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Comment;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new CommentTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Comment');
        }
    }
    /**
     * Update a existing Comment
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Comment", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "movie_id": "required|exists:movies,id|numeric",
    "spectator_id": "required|exists:spectators,id|numeric",
    "comment": "required|string"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Comment]."})
     * })
     */
    public function update(Update $request, $comment)
    {
        $comment = Comment::findOrFail($comment);
        $comment->fill($request->all());

        if ($comment->save()) {
            return $this->response->item($comment, new CommentTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Comment');
        }
    }
    /**
     * Delete an existing Comment
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Comment",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Comment successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Comment]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Comment"})
     * })
     */
    public function destroy(Destroy $request, $comment)
    {
        $comment = Comment::findOrFail($comment);

        if ($comment->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Comment successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Comment');
        }
    }

}
