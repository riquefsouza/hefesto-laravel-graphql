<?php

// app/graphql/queries/admParameterCategory/AdmParameterCategoriesQuery 

namespace App\GraphQL\Queries\AdmParameterCategory;

use App\Models\AdmParameterCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AdmParameterCategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'admParameterCategories',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AdmParameterCategory'));
    }

    public function resolve($root, $args)
    {
        return AdmParameterCategory::all();
    }
}
