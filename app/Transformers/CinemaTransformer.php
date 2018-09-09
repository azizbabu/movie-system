<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Cinema;

class CinemaTransformer extends TransformerAbstract
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


    public function transform(Cinema $cinema)
    {
        return [
			"id" => $cinema->id,
			"name" => $cinema->name,
			"created_at" => $cinema->created_at,
			"updated_at" => $cinema->updated_at,

        ];

    }
}