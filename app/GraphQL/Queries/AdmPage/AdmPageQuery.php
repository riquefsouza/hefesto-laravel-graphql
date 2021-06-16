<?php

// app/graphql/queries/admPage/AdmPageQuery

namespace App\GraphQL\Queries\AdmPage;

use App\Models\AdmPage;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmPageService;

class AdmPageQuery extends Query
{
    protected $attributes = [
        'name' => 'admPage',
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
        return GraphQL::type('AdmPage');
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
        $obj =  AdmPage::findOrFail($args['id']);
        $this->service->setTransient($obj);
        return $obj;
    }
}
