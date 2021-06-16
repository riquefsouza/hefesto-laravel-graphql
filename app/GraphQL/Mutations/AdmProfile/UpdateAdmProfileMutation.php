<?php

// app/graphql/mutations/admProfile/UpdateAdmProfileMutation

namespace App\GraphQL\Mutations\AdmProfile;

use App\Models\AdmProfile;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmProfileMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmProfile',
        'description' => 'Updates a profile'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmProfile');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $admProfile = AdmProfile::findOrFail($args['id']);
        $admProfile->fill($args);
        $admProfile->save();

        return $admProfile;
    }
}
