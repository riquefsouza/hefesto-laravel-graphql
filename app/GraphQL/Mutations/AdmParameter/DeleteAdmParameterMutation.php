<?php

// app/graphql/mutations/admParameter/DeleteAdmParameterMutation 

namespace App\GraphQL\Mutations\AdmParameter;

use App\Models\AdmParameter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAdmParameterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmParameter',
        'description' => 'Deletes a parameter'
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
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:admParameters']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admParameter = AdmParameter::findOrFail($args['id']);

        return  $admParameter->delete() ? true : false;
    }
}