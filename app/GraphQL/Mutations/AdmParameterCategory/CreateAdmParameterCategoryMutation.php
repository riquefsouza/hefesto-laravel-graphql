<?php

// app/graphql/mutations/admParameterCategory/CreateAdmParameterCategoryMutation 

namespace App\GraphQL\Mutations\AdmParameterCategory;

use App\Models\AdmParameterCategory;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmParameterCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmParameterCategory',
        'description' => 'Creates a category parameter'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmParameterCategory');
    }

    public function args(): array
    {
        return [
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'order' => [
                'name' => 'order',
                'type' => Type::int(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admParameterCategory = new AdmParameterCategory();
        $admParameterCategory->fill($args);
        $admParameterCategory->save();

        return $admParameterCategory;
    }
}
