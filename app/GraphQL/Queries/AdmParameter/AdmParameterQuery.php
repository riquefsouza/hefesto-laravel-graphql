<?php

// app/graphql/queries/admParameter/AdmParameterQuery 

namespace App\GraphQL\Queries\AdmParameter;

use App\Models\AdmParameter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AdmParameterQuery extends Query
{
    protected $attributes = [
        'name' => 'admParameter',
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmParameter');
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
        return AdmParameter::findOrFail($args['id']);
    }
}
