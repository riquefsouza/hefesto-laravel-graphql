<?php

// app/graphql/mutations/admPage/DeleteAdmPageMutation

namespace App\GraphQL\Mutations\AdmPage;

use App\Models\AdmPage;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAdmPageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmPage',
        'description' => 'Deletes a page'
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
                'rules' => ['exists:admPages']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admPage = AdmPage::findOrFail($args['id']);

        return  $admPage->delete() ? true : false;
    }
}
