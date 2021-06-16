<?php

// app/graphql/queries/admUser/AdmUsersQuery

namespace App\GraphQL\Queries\AdmUser;

use App\Models\AdmUser;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmUserService;

class AdmUsersQuery extends Query
{
    protected $attributes = [
        'name' => 'admUsers',
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
        return Type::listOf(GraphQL::type('AdmUser'));
    }

    public function resolve($root, $args)
    {
        $list = AdmUser::all();
        $this->service->setTransientList($list);
        return $list;
    }
}
