<?php

// app/graphql/mutations/admParameter/CreateAdmParameterMutation 

namespace App\GraphQL\Mutations\AdmParameter;

use App\Models\AdmParameter;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmParameterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmParameter',
        'description' => 'Creates a parameter'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmParameter');
    }

    public function args(): array
    {
        return [
            'code' => [
                'name' => 'code',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
            ],
            'idParameterCategory' => [
                'name' => 'idParameterCategory',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:admParameterCategories,id']
            ],
            'value' => [
                'name' => 'value',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admParameter = new AdmParameter();
        $admParameter->fill($args);
        $admParameter->save();

        return $admParameter;
    }
}