<?php

// app/graphql/queries/admMenu/AdmMenuQuery

namespace App\GraphQL\Queries\AdmMenu;

use App\Models\AdmMenu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmMenuService;

class AdmMenuQuery extends Query
{
    protected $attributes = [
        'name' => 'admMenu',
    ];

    /**
     * @var AdmMenuService
     */
    private $service;

    public function __construct(AdmMenuService $service)
    {
        $this->service = $service;
    }

    public function type(): Type
    {
        return GraphQL::type('AdmMenu');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $obj = AdmMenu::findOrFail($args['id']);
        $this->service->setTransient($obj);
        return $obj;
    }
}
