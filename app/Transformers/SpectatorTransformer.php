<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Spectator;

class SpectatorTransformer extends TransformerAbstract
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


    public function transform(Spectator $spectator)
    {
        return [
			"id" => $spectator->id,
			"name" => $spectator->name,
			"gender" => $spectator->gender,
			"phone" => $spectator->phone,
			"created_at" => $spectator->created_at,
			"updated_at" => $spectator->updated_at,

        ];

    }
}