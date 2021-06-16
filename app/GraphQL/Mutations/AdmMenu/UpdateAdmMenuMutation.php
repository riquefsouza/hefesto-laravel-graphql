<?php

// app/graphql/mutations/admMenu/UpdateAdmMenuMutation

namespace App\GraphQL\Mutations\AdmMenu;

use App\Models\AdmMenu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAdmMenuMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAdmMenu',
        'description' => 'Updates a menu'
    ];

    public function type(): Type
    {
        return GraphQL::type('AdmMenu');
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
        $admMenu = AdmMenu::findOrFail($args['id']);
        $admMenu->fill($args);
        $admMenu->save();

        return $admMenu;
    }
}
