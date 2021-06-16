<?php

// app/graphql/mutations/admUser/UpdateAdmUserMutation

namespace App\GraphQL\Mutations\AdmUser;

use App\Models\AdmUser;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmUser',
        'description' => 'Updates a user'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmUser');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'active' => [
                'name' => 'active',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'login' => [
                'name' => 'login',
                'type' => Type::nonNull(Type::string())
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string()
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string())
            ],
            'admIdProfiles' => [
                'name' => 'admIdProfiles',
                'type' => Type::listOf(Type::int()),
                'rules' => ['exists:admProfiles,id']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $admUser = AdmUser::findOrFail($args['id']);
        $admUser->fill($args);
        $admUser->save();

        return $admUser;
    }
}
