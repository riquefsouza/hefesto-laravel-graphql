<?php

// app/graphql/queries/admProfile/AdmProfileQuery

namespace App\GraphQL\Queries\AdmProfile;

use App\Models\AdmProfile;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmProfileService;

class AdmProfileQuery extends Query
{
    protected $attributes = [
        'name' => 'admProfile',
    ];

    /**
     * @var AdmProfileService
     */
    private $service;

    public function __construct(AdmProfileService $service)
    {
        $this->service = $service;
    }

    public function type(): Type
    {
        return GraphQL::type('AdmProfile');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $obj = AdmProfile::findOrFail($args['id']);
        $this->service->setTransient($obj);
        return $obj;
    }
}
