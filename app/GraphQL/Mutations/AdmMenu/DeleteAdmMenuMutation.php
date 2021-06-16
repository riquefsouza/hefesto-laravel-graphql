<?php

// app/graphql/mutations/admMenu/DeleteAdmMenuMutation

namespace App\GraphQL\Mutations\AdmMenu;

use App\Models\AdmMenu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAdmMenuMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAdmMenu',
        'description' => 'Deletes a menu'
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
                'rules' => ['exists:admMenus']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admMenu = AdmMenu::findOrFail($args['id']);

        return  $admMenu->delete() ? true : false;
    }
}
