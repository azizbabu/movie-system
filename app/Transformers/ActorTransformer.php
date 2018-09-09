<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Actor;

class ActorTransformer extends TransformerAbstract
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


    public function transform(Actor $actor)
    {
        return [
			"id" => $actor->id,
			"name" => $actor->name,
			"gender" => $actor->gender,
			"phone" => $actor->phone,
			"created_at" => $actor->created_at,
			"updated_at" => $actor->updated_at,

        ];

    }
}