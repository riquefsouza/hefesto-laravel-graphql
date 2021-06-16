<?php

// app/graphql/mutations/admUser/CreateAdmUserMutation

namespace App\GraphQL\Mutations\AdmUser;

use App\Models\AdmUser;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmUser',
        'description' => 'Creates a user'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmUser');
    }

    public function args(): array
    {
        return [
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
        $admUser = new AdmUser();
        $admUser->fill($args);
        $admUser->save();

        return $admUser;
    }
}
