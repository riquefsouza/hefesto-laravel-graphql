<?php

// app/graphql/queries/admUser/AdmUserQuery

namespace App\GraphQL\Queries\AdmUser;

use App\Models\AdmUser;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmUserService;

class AdmUserQuery extends Query
{
    protected $attributes = [
        'name' => 'admUser',
    ];

    /**
     * @var AdmUserService
     */
    private $service;

    public function __construct(AdmUserService $service)
    {
        $this->service = $service;
    }

    public function type(): Type
    {
        return GraphQL::type('AdmUser');
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
        $obj = AdmUser::findOrFail($args['id']);
        $this->service->setTransient($obj);
        return $obj;
    }
}
