<?php

// app/graphql/queries/admParameter/AdmParametersQuery 

namespace App\GraphQL\Queries\AdmParameter;

use App\Models\AdmParameter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AdmParametersQuery extends Query
{
    protected $attributes = [
        'name' => 'admParameters',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AdmParameter'));
    }

    public function resolve($root, $args)
    {
        return AdmParameter::all();
    }
}
