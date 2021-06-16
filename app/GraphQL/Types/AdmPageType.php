<?php

// app/graphql/types/AdmPageType

namespace App\GraphQL\Types;

use App\Models\AdmPage;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AdmPageType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AdmPage',
        'description' => 'Collection of pages',
        'model' => AdmPage::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of page'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of page'
            ],
            'url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Url of page'
            ],
            'admIdProfiles' => [
                'type' => Type::listOf(Type::int()),
                'description' => 'id profiles of page'
            ],
            'pageProfiles' => [
                'type' => Type::string(),
                'description' => 'pageProfiles of page'
            ]
        ];
    }
}
