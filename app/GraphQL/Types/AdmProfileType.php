<?php

// app/graphql/types/AdmProfileType

namespace App\GraphQL\Types;

use App\Models\AdmProfile;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmProfile',
        'description' => 'Collection of profiles',
        'model' => AdmProfile::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of profile'
            ],
            'administrator' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Administrator of profile'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of profile'
            ],
            'general' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'General of profile'
            ],
            'admPages' => [
                'type' => Type::listOf(GraphQL::type('AdmPage')),
                'description' => 'The pages of the profile'
            ],
            'admUsers' => [
                'type' => Type::listOf(GraphQL::type('AdmUser')),
                'description' => 'The users of the profile'
            ],
            'profilePages' => [
                'type' => Type::string(),
                'description' => 'pages of profile'
            ],
            'profileUsers' => [
                'type' => Type::string(),
                'description' => 'users of profile'
            ]
        ];
    }
}
