<?php

// app/graphql/mutations/admParameterCategory/DeleteAdmParameterCategoryMutation 

namespace App\GraphQL\Mutations\AdmParameterCategory;

use App\Models\AdmParameterCategory;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteAdmParameterCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmParameterCategory',
        'description' => 'deletes a category parameter'
    ];

    public function type(): Type
    {
        return Type::boolean();
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
        $admParameterCategory = AdmParameterCategory::findOrFail($args['id']);

        return  $admParameterCategory->delete() ? true : false;
    }
}
