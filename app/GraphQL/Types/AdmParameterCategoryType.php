<?php

// app/graphql/types/AdmParameterCategoryType

namespace App\GraphQL\Types;

use App\Models\AdmParameterCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmParameterCategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmParameterCategory',
        'description' => 'Collection of categories parameters',
        'model' => AdmParameterCategory::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of parameter category'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of parameter category'
            ],
            'order' => [
                'type' => Type::int(),
                'description' => 'Order of parameter category'
            ]
        ];
    }
}
