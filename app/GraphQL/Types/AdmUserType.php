<?php

// app/graphql/types/AdmUserType

namespace App\GraphQL\Types;

use App\Models\AdmUser;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmUserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmUser',
        'description' => 'Collection of users',
        'model' => AdmUser::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of user'
            ],
            'active' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'active user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'Email of user'
            ],
            'login' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'login of user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'name of user'
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'password of user'
            ],
            'admIdProfiles' => [
                'type' => Type::listOf(Type::int()),
                'description' => 'id profiles of user'
            ],
            'userProfiles' => [
                'type' => Type::string(),
                'description' => 'Profiles of user'
            ],
            'currentPassword' => [
                'type' => Type::string(),
                'description' => 'Current password of user'
            ],
            'newPassword' => [
                'type' => Type::string(),
                'description' => 'New password of user'
            ],
            'confirmNewPassword' => [
                'type' => Type::string(),
                'description' => 'Confirm new password of user'
            ]
        ];
    }
}
