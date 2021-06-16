<?php

// app/graphql/queries/admMenu/AdmMenusQuery

namespace App\GraphQL\Queries\AdmMenu;

use App\Models\AdmMenu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmMenuService;

class AdmMenusQuery extends Query
{
    protected $attributes = [
        'name' => 'admMenus',
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
        return Type::listOf(GraphQL::type('AdmMenu'));
    }

    public function resolve($root, $args)
    {
        $list = AdmMenu::all();
        $this->service->setTransientList($list);
        return $list;
    }
}
