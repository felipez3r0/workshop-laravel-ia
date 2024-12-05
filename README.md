# Workshop - Laravel + IA (Phpconference 2024)

## Requisitos
- Docker

## Passo a passo
1: `curl -s https://laravel.build/example-app | bash`

2: `./vendor/bin/sail artisan migrate` OU `php artisan migrate`

3: `./vendor/bin/sail composer require laravel/breeze --dev`
Obs: caso precise abrir o terminal - `./vendor/bin/sail shell`

4: `./vendor/bin/sail artisan breeze:install` OU `php artisan breeze:install`
Blade with Alpine

5: `./vendor/bin/sail composer require mozex/anthropic-laravel`

6: `./vendor/bin/sail artisan anthropic:install` OU `php artisan anthropic:install`

7: `./vendor/bin/sail artisan make:controller DashboardController`

8: `composer require openai-php/laravel`

9: Adicionar as keys no .env