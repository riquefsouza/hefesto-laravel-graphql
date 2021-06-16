<?php

// app/graphql/types/AdmParameterType 

namespace App\GraphQL\Types;

use App\Models\AdmParameter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmParameterType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmParameter',
        'description' => 'Collection of parameters',
        'model' => AdmParameter::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of parameter'
            ],
            'code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Code of parameter'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of parameter'
            ],
            'idParameterCategory' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'id Parameter Category of parameter'
            ],
            'value' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Value of parameter'
            ],
            'admParameterCategory' => [
                'type' => GraphQL::type('AdmParameterCategory'),
                'description' => 'The category of the parameter'
            ]
        ];
    }
}
