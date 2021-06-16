<?php

// app/graphql/mutations/admProfile/CreateAdmProfileMutation

namespace App\GraphQL\Mutations\AdmProfile;

use App\Models\AdmProfile;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmProfileMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmProfile',
        'description' => 'Creates a profile'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmProfile');
    }

    public function args(): array
    {
        return [
            'administrator' => [
                'name' => 'administrator',
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string())
            ],
            'general' => [
                'name' => 'general',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admProfile = new AdmProfile();
        $admProfile->fill($args);
        $admProfile->save();

        return $admProfile;
    }
}
