<?php

declare(strict_types = 1);

return [
    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each route
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}',
    // ]
    //
    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
    // 'controllers' => [
    //     'query' => '\Rebing\GraphQL\GraphQLController@query',
    //     'mutation' => '\Rebing\GraphQL\GraphQLController@mutation'
    // ]
    //
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',

    // Any middleware for the graphql route group
    'middleware' => [],

    // Additional route group attributes
    //
    // Example:
    //
    // 'route_group_attributes' => ['guard' => 'api']
    //
    'route_group_attributes' => [],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'default_schema' => 'default',

    'batching' => [
        // Whether to support GraphQL batching or not.
        // See e.g. https://www.apollographql.com/blog/batching-client-graphql-queries-a685f5bcd41b/
        // for pro and con
        'enable' => true,
    ],

    // The schemas for query and/or mutation. It expects an array of schemas to provide
    // both the 'query' fields and the 'mutation' fields.
    //
    // You can also provide a middleware that will only apply to the given schema
    //
    // Example:
    //
    //  'schema' => 'default',
    //
    //  'schemas' => [
    //      'default' => [
    //          'query' => [
    //              'users' => App\GraphQL\Query\UsersQuery::class
    //          ],
    //          'mutation' => [
    //
    //          ]
    //      ],
    //      'user' => [
    //          'query' => [
    //              'profile' => App\GraphQL\Query\ProfileQuery::class
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //      'user/me' => [
    //          'query' => [
    //              'profile' => App\GraphQL\Query\MyProfileQuery::class
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //  ]
    //
    'schemas' => [
        'default' => [
            'query' => [
                'admParameter' => App\GraphQL\Queries\AdmParameter\AdmParameterQuery::class,
                'admParameters' => App\GraphQL\Queries\AdmParameter\AdmParametersQuery::class,
                'admParameterCategory' => App\GraphQL\Queries\AdmParameterCategory\AdmParameterCategoryQuery::class,
                'admParameterCategories' => App\GraphQL\Queries\AdmParameterCategory\AdmParameterCategoriesQuery::class,
                'admMenu' => App\GraphQL\Queries\AdmMenu\AdmMenuQuery::class,
                'admMenus' => App\GraphQL\Queries\AdmMenu\AdmMenusQuery::class,
                'admPage' => App\GraphQL\Queries\AdmPage\AdmPageQuery::class,
                'admPages' => App\GraphQL\Queries\AdmPage\AdmPagesQuery::class,
                'admProfile' => App\GraphQL\Queries\AdmProfile\AdmProfileQuery::class,
                'admProfiles' => App\GraphQL\Queries\AdmProfile\AdmProfilesQuery::class,
                'admUser' => App\GraphQL\Queries\AdmUser\AdmUserQuery::class,
                'admUsers' => App\GraphQL\Queries\AdmUser\AdmUsersQuery::class,
            ],
            'mutation' => [
                'createAdmParameter' => App\GraphQL\Mutations\AdmParameter\CreateAdmParameterMutation::class,
                'updateAdmParameter' => App\GraphQL\Mutations\AdmParameter\UpdateAdmParameterMutation::class,
                'deleteAdmParameter' => App\GraphQL\Mutations\AdmParameter\DeleteAdmParameterMutation::class,
                'createAdmParameterCategory' => App\GraphQL\Mutations\AdmParameterCategory\CreateAdmParameterCategoryMutation::class,
                'updateAdmParameterCategory' => App\GraphQL\Mutations\AdmParameterCategory\UpdateAdmParameterCategoryMutation::class,
                'deleteAdmParameterCategory' => App\GraphQL\Mutations\AdmParameterCategory\DeleteAdmParameterCategoryMutation::class,
                'createAdmMenu' => App\GraphQL\Mutations\AdmMenu\CreateAdmMenuMutation::class,
                'updateAdmMenu' => App\GraphQL\Mutations\AdmMenu\UpdateAdmMenuMutation::class,
                'deleteAdmMenu' => App\GraphQL\Mutations\AdmMenu\DeleteAdmMenuMutation::class,
                'createAdmPage' => App\GraphQL\Mutations\AdmPage\CreateAdmPageMutation::class,
                'updateAdmPage' => App\GraphQL\Mutations\AdmPage\UpdateAdmPageMutation::class,
                'deleteAdmPage' => App\GraphQL\Mutations\AdmPage\DeleteAdmPageMutation::class,
                'createAdmProfile' => App\GraphQL\Mutations\AdmProfile\CreateAdmProfileMutation::class,
                'updateAdmProfile' => App\GraphQL\Mutations\AdmProfile\UpdateAdmProfileMutation::class,
                'deleteAdmProfile' => App\GraphQL\Mutations\AdmProfile\DeleteAdmProfileMutation::class,
                'createAdmUser' => App\GraphQL\Mutations\AdmUser\CreateAdmUserMutation::class,
                'updateAdmUser' => App\GraphQL\Mutations\AdmUser\UpdateAdmUserMutation::class,
                'deleteAdmUser' => App\GraphQL\Mutations\AdmUser\DeleteAdmUserMutation::class,
            ],
            'types' => [
                'AdmParameter' => App\GraphQL\Types\AdmParameterType::class,
                'AdmParameterCategory' => App\GraphQL\Types\AdmParameterCategoryType::class,
                'AdmMenu' => App\GraphQL\Types\AdmMenuType::class,
                'AdmPage' => App\GraphQL\Types\AdmPageType::class,
                'AdmProfile' => App\GraphQL\Types\AdmProfileType::class,
                'AdmUser' => App\GraphQL\Types\AdmUserType::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],

    // The types available in the application. You can then access it from the
    // facade like this: GraphQL::type('user')
    //
    // Example:
    //
    // 'types' => [
    //     App\GraphQL\Type\UserType::class
    // ]
    //
    'types' => [
        // ExampleType::class,
        // ExampleRelationType::class,
        // \Rebing\GraphQL\Support\UploadType::class,
    ],

    // The types will be loaded on demand. Default is to load all types on each request
    // Can increase performance on schemes with many types
    // Presupposes the config type key to match the type class name property
    'lazyload_types' => false,

    // This callable will be passed the Error object for each errors GraphQL catch.
    // The method should return an array representing the error.
    // Typically:
    // [
    //     'message' => '',
    //     'locations' => []
    // ]
    'error_formatter' => [\Rebing\GraphQL\GraphQL::class, 'formatError'],

    /*
     * Custom Error Handling
     *
     * Expected handler signature is: function (array $errors, callable $formatter): array
     *
     * The default handler will pass exceptions to laravel Error Handling mechanism
     */
    'errors_handler' => [\Rebing\GraphQL\GraphQL::class, 'handleErrors'],

    // You can set the key, which will be used to retrieve the dynamic variables
    'params_key' => 'variables',

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://webonyx.github.io/graphql-php/security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false,
    ],

    /*
     * You can define your own pagination type.
     * Reference \Rebing\GraphQL\Support\PaginationType::class
     */
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    /*
     * You can define your own simple pagination type.
     * Reference \Rebing\GraphQL\Support\SimplePaginationType::class
     */
    'simple_pagination_type' => \Rebing\GraphQL\Support\SimplePaginationType::class,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix' => '/graphiql',
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],

    /*
     * Overrides the default field resolver
     * See http://webonyx.github.io/graphql-php/data-fetching/#default-field-resolver
     *
     * Example:
     *
     * ```php
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     * },
     * ```
     * or
     * ```php
     * 'defaultFieldResolver' => [SomeKlass::class, 'someMethod'],
     * ```
     */
    'defaultFieldResolver' => null,

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,

    /*
     * Automatic Persisted Queries (APQ)
     * See https://www.apollographql.com/docs/apollo-server/performance/apq/
     */
    'apq' => [
        // Enable/Disable APQ - See https://www.apollographql.com/docs/apollo-server/performance/apq/#disabling-apq
        'enable' => env('GRAPHQL_APQ_ENABLE', false),

        // The cache driver used for APQ
        'cache_driver' => env('GRAPHQL_APQ_CACHE_DRIVER', config('cache.default')),

        // The cache prefix
        'cache_prefix' => config('cache.prefix') . ':graphql.apq',

        // The cache ttl in minutes - See https://www.apollographql.com/docs/apollo-server/performance/apq/#adjusting-cache-time-to-live-ttl
        'cache_ttl' => 300,
    ],
];
