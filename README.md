# hefesto-laravel-graphql

```
composer create-project laravel/laravel hefesto-laravel-graphql

cd hefesto-laravel-graphql

composer require --dev barryvdh/laravel-ide-helper

composer require rebing/graphql-laravel

php artisan vendor:publish --provider="Rebing\\GraphQL\\GraphQLServiceProvider"

cd app
mkdir GraphQL
cd GraphQL
mkdir Mutations
mkdir Queries
mkdir Types

php -S localhost:8000 -t public

http://localhost:8000/graphiql

```
