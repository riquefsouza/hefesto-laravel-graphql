<?php

// app/graphql/mutations/admPage/UpdateAdmPageMutation

namespace App\GraphQL\Mutations\AdmPage;

use App\Models\AdmPage;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmPageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmPage',
        'description' => 'Updates a page'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmPage');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $admPage = AdmPage::findOrFail($args['id']);
        $admPage->fill($args);
        $admPage->save();

        return $admPage;
    }
}
