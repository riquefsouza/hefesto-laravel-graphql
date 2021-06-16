<?php

// app/graphql/queries/admParameterCategory/AdmParameterCategoryQuery 

namespace App\GraphQL\Queries\AdmParameterCategory;

use App\Models\AdmParameterCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AdmParameterCategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'admParameterCategory',
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmParameterCategory');
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
        return AdmParameterCategory::findOrFail($args['id']);
    }
}
