<?php

// app/graphql/queries/admPage/AdmPagesQuery

namespace App\GraphQL\Queries\AdmPage;

use App\Models\AdmPage;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmPageService;

class AdmPagesQuery extends Query
{
    protected $attributes = [
        'name' => 'admPages',
    ];

    /**
     * @var AdmPageService
     */
    private $service;

    public function __construct(AdmPageService $service)
    {
        $this->service = $service;
    }

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AdmPage'));
    }

    public function resolve($root, $args)
    {
        $list = AdmPage::all();
        $this->service->setTransientList($list);
        return $list;
    }
}
