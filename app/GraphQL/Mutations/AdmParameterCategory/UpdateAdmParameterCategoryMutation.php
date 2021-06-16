<?php

// app/graphql/mutations/admParameterCategory/UpdateAdmParameterCategoryMutation 

namespace App\GraphQL\Mutations\AdmParameterCategory;

use App\Models\AdmParameterCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmParameterCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmParameterCategory',
        'description' => 'Updates a category parameter'
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
                'type' =>  Type::nonNull(Type::int()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
            ],
            'order' => [
                'name' => 'order',
                'type' => Type::int(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admParameterCategory = AdmParameterCategory::findOrFail($args['id']);
        $admParameterCategory->fill($args);
        $admParameterCategory->save();

        return $admParameterCategory;
    }
}