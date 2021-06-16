<?php

// app/graphql/mutations/admProfile/DeleteAdmProfileMutation

namespace App\GraphQL\Mutations\AdmProfile;

use App\Models\AdmProfile;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAdmProfileMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmProfile',
        'description' => 'Deletes a profile'
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
                'rules' => ['exists:admProfiles']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admProfile = AdmProfile::findOrFail($args['id']);

        return  $admProfile->delete() ? true : false;
    }
}
