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
### About Codevate
Codevate is a specialist [app development company](https://www.codevate.com/) that builds cloud-connected software. This repository was created for a blog post about a [custom web application development](https://www.codevate.com/services/web-development) project and was written by Chris Lush.
