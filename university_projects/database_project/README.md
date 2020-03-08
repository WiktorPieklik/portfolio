# Database 2 university project

## Tech stack

- Nginx >= v1.16
- PHP >= v7.3.13
- Composer v.1.9.0
- MySQL >= v8.0.18
- Symfony v5.0.2
- Node.js LTS v12.13.0

## Installation
##### Clone this repository

#### Sequence below can be done automatically by running `npm run setup`.

- Assuming you have `MySQL` (`and running configure database access in .env file`)
- Run `composer install`
- Run `npm install`
- Run `php bin/console doctrine:database:create`
- Run `php bin/console doctrine:migrations:migrate`
- Run `php bin/console doctrine:fixtures:load`

#### If you don't have npm somehow

- Assuming you have `MySQL` (`and running configure database access in .env file`)
- Run `composer install`
- Run `php bin/console app:setup`

## Getting app up to date
#### Sequence below can be done automatically by running `npm run refresh`

- Run `git pull`
- Run `composer update`
- Run `php bin/console doctrine:schema:drop --force --full-database`
- Run `php bin/console doctrine:migrations:migrate`
- Run `php bin/console doctrine:fixtures:load`

#### If you don't have npm somehow

- Run `php bin/console app:refresh`
