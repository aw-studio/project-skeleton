# Project Skeleton

A project skeleton for aw-studio projects.

## Setup

Setting up the new project:

```shell
rm -rf composer.lock && composer install && php artisan project:setup
```

In production:

```shell
php artisan db:seed --class=ProjectSetupSeeder
```

## Containig

-   [Fjord](https://github.com/aw-studio/fjord)
-   [Fjord Ui Kit](https://github.com/aw-studio/fjord-ui-kit)
-   [Fjord Pages](https://github.com/aw-studio/fjord-pages)
-   [Localize](https://github.com/aw-studio/localize)
-   [Tailwind](https://tailwindcss.com/)
-   Default Pages (Home, Datapolicy, Imprint)

## Setup

Create a new project using composer. The following example will create a project named `blog`.

```shell
composer create-project --prefer-dist aw-studio/project-skeleton blog
```

## Testing

Run tests via composer:

```shell
composer test
```
