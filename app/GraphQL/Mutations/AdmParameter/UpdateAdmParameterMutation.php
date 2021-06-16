<?php

// app/graphql/mutations/admParameter/UpdateAdmParameterMutation 

namespace App\GraphQL\Mutations\AdmParameter;

use App\Models\AdmParameter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmParameterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmParameter',
        'description' => 'Updates a parameter'
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
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $admParameter = AdmParameter::findOrFail($args['id']);
        $admParameter->fill($args);
        $admParameter->save();

        return $admParameter;
    }
}