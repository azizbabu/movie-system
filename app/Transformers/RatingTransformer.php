<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Rating;

class RatingTransformer extends TransformerAbstract
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


    public function transform(Rating $rating)
    {
        return [
			"id" => $rating->id,
			"movie_id" => $rating->movie_id,
			"spectator_id" => $rating->spectator_id,
			"ratings" => $rating->ratings,
			"created_at" => $rating->created_at,
			"updated_at" => $rating->updated_at,

        ];

    }
}