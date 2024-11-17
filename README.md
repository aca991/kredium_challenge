# Kredium Challenge

## Getting started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes using Laravel Sail.

### Prerequisites

PHP and composer should be installed on your local machine.  
Download and install [Docker](https://www.docker.com/get-started).

Clone project:

```sh 
  git clone git@github.com:aca991/kredium_challenge.git
```
Change the folder to the project root by running the following command:
```sh
  cd kredium_challenge
```

Copy sample .env file to the actual one:
```sh
  cp samples/.laravel-env .env
```

To build Docker containers, run following commands:

```sh
  composer install
  ./vendor/bin/sail up
```

Open another terminal, and run following commands:
```sh
  ./vendor/bin/sail npm install
```
```sh
  ./vendor/bin/sail npm run build
```

Run file watcher for development:
```sh
  ./vendor/bin/sail npm run dev
```

Your application should be accessible at: http://localhost

There are two advisor users that can be used for logging in:
* Email: advisor@example.com, password: test123
* Email: advisor2@example.com, password: test123



