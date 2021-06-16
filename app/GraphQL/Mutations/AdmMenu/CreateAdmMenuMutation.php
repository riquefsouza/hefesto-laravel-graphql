<?php

// app/graphql/mutations/admMenu/CreateAdmMenuMutation

namespace App\GraphQL\Mutations\AdmMenu;

use App\Models\AdmMenu;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateAdmMenuMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAdmMenu',
        'description' => 'Creates a menu'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmMenu');
    }

    public function args(): array
    {
        return [
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string())
            ],
            'idMenuParent' => [
                'name' => 'idMenuParent',
                'type' => Type::int(),
                'rules' => ['exists:admMenus,id']
            ],
            'idPage' => [
                'name' => 'idPage',
                'type' => Type::int(),
                'rules' => ['exists:admPages,id']
            ],
            'order' => [
                'name' => 'order',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $admMenu = new AdmMenu();
        $admMenu->fill($args);
        $admMenu->save();

        return $admMenu;
    }
}
