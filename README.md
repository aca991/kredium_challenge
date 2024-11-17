# Kredium Challenge

## Getting started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Download and install [Docker](https://www.docker.com/get-started).
This project is using Laravel Sail for local environment.

Clone project:

```sh 
  git clone git@github.com:aca991/kredium_challenge.git
```

From the project root file, run following commands:

```sh
  composer install
  ./vendor/bin/sail up
  ./vendor/bin/sail artisan migrate
  ./vendor/bin/sail artisan db:seed
  ./vendor/bin/sail npm install
  ./vendor/bin/sail npm build
```

Open another terminal, and run following commands:
```sh
  ./vendor/bin/sail artisan migrate
  ./vendor/bin/sail artisan db:seed
  ./vendor/bin/sail npm install
  ./vendor/bin/sail npm build
```

Run file watcher for development:
```sh
  ./vendor/bin/sail npm run dev
```

There are two advisor users that can be used for logging in:
* Email: advisor@example.com, password: test123
* Email: advisor2@example.com, password: test123



