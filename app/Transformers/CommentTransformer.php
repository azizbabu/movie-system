<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Comment;

class CommentTransformer extends TransformerAbstract
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


    public function transform(Comment $comment)
    {
        return [
			"id" => $comment->id,
			"movie_id" => $comment->movie_id,
			"spectator_id" => $comment->spectator_id,
			"comment" => $comment->comment,
			"created_at" => $comment->created_at,
			"updated_at" => $comment->updated_at,

        ];

    }
}