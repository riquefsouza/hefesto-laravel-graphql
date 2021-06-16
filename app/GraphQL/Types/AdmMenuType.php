<?php

// app/graphql/types/AdmMenuType

namespace App\GraphQL\Types;

use App\Models\AdmMenu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmMenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmMenu',
        'description' => 'Collection of menus',
        'model' => AdmMenu::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of menu'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of menu'
            ],
            'idMenuParent' => [
                'type' => Type::int(),
                'description' => 'id Menu Parent of menu'
            ],
            'idPage' => [
                'type' => Type::int(),
                'description' => 'id Page of menu'
            ],
            'order' => [
                'type' => Type::int(),
                'description' => 'Order of menu'
            ],
            'admPage' => [
                'type' => GraphQL::type('AdmPage'),
                'description' => 'The page of the menu'
            ],
            'admMenuParent' => [
                'type' => GraphQL::type('AdmMenu'),
                'description' => 'The menu parent of the menu'
            ]
        ];
    }
}
