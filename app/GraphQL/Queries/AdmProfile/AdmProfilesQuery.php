<?php

// app/graphql/queries/admProfile/AdmProfilesQuery

namespace App\GraphQL\Queries\AdmProfile;

use App\Models\AdmProfile;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Services\AdmProfileService;

class AdmProfilesQuery extends Query
{
    protected $attributes = [
        'name' => 'admProfiles',
    ];

    /**
     * @var AdmProfileService
     */
    private $service;

    public function __construct(AdmProfileService $service)
    {
        $this->service = $service;
    }

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AdmProfile'));
    }

    public function resolve($root, $args)
    {
        $list = AdmProfile::all();
        $this->service->setTransientList($list);
        return $list;
    }
}
