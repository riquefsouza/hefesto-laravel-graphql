<?php

// app/graphql/mutations/admPage/CreateAdmPageMutation

namespace App\GraphQL\Mutations\AdmPage;

use App\Models\AdmPage;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmPageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmPage',
        'description' => 'Creates a page'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmPage');
    }

    public function args(): array
    {
        return [
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string())
            ],
            'url' => [
                'name' => 'url',
                'type' => Type::nonNull(Type::string())
            ],
            'admIdProfiles' => [
                'name' => 'admIdProfiles',
                'type' => Type::listOf(Type::int()),
                'rules' => ['exists:admProfiles,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admPage = new AdmPage();
        $admPage->fill($args);
        $admPage->save();

        return $admPage;
    }
}
