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

## Docker

Build and run the containers:

```
docker-compose build
docker-compose up -d
```

Add `restaurant-search.dev` to your hosts file:

```
# Unix only: use this command to get the right IP, OSX binds to localhost
docker network inspect restaurantsearch_default | grep Gateway
sudo sh -c 'echo "127.0.0.1 restaurant-search.dev\n" >> /etc/hosts'
```

Update `parameters.yml` to use the networked containers:

```
parameters:
    database_host: db
    # ...
    elasticsearch_host: elk
```

Install dependencies, create the database schema, and populate Elasticsearch:

```
docker-compose exec node bower install
docker-compose exec php bash
  composer install
  sf doctrine:schema:update --force
  sf doctrine:fixtures:load
```

### Usage

- <http://restaurant-search.dev:81> to visit the Symfony app.
- <http://restaurant-search.dev:5602> to visit Kibana (the "Dev Tools" side-menu option has replaced Kibana Sense).
- Logs for Symfony and Nginx are in `docker/logs`.
- `docker-compose down` when you're finished.

## About Codevate

Codevate is a specialist [app development company](https://www.codevate.com/) that builds cloud-connected software. This repository was created for a blog post about a [custom web application development](https://www.codevate.com/services/web-development) project and was written by Chris Lush.
