<?php

// app/graphql/mutations/admUser/DeleteAdmUserMutation

namespace App\GraphQL\Mutations\AdmUser;

use App\Models\AdmUser;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAdmUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmUser',
        'description' => 'Deletes a user'
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
                'rules' => ['exists:admUsers']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admUser = AdmUser::findOrFail($args['id']);

        return  $admUser->delete() ? true : false;
    }
}
