# Restaurant Search

A companion project for our blog post on Elasticsearch's completion suggester.

## Getting started

Install dependencies:

```
composer install
bower install
```

Create the database, setup the schema, and load the fixtures:

```
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
```
