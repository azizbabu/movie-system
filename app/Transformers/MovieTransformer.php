<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Movie;

class MovieTransformer extends TransformerAbstract
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


    public function transform(Movie $movie)
    {
        return [
			"id" => $movie->id,
			"cinema_id" => $movie->cinema_id,
			"name" => $movie->name,
			"director_name" => $movie->director_name,
			"created_at" => $movie->created_at,
			"updated_at" => $movie->updated_at,

        ];

    }
}