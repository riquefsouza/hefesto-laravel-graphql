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

# Queries

```
query{
    admParameterCategory(id: 1){
      id
      description
      order
    }
}

query{
    admParameterCategories{
      id
      description
      order
    }
}

query{
    admParameter(id: 1){
      id
      description
    }
}

query{
    admParameters{
      id
      description
      admParameterCategory {
        id
      }
    }
}

query{
  admMenus{
    id
    description
    order
    admPage{
      id
      description
    }
    admMenuParent{
      id
      description
    }
  }
}

query{
  admPages{
    id
    description
    admIdProfiles
    pageProfiles
  }
}

query{
  admProfiles{
    id
    description
    admPages{
      id
      description
    }
    admUsers{
      id
      login
      name
    }
  }
}

query{
  admUsers{
    id
    login
    name
    email
    active
    admIdProfiles
  }
}

```
