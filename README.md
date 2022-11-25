# Vueon

Instalcja Vue z Vite w Laravelu w wybranym katalogu (vue-project).

### Project Laravela

```sh
composer create-project laravel/laravel:^9.0 demo
```

### Dodaj pakiet atomjoy/vueon

```sh
cd demo
composer require atomjoy/vueon 1.0.*
composer update
composer dump-autoload -o
```

### Utwórz projekt Vue w Laravel

```sh
npm init vue@latest
cd vue-project
npm install
cd ..
```

### Konfiguracja Vite

```sh
# Laravel root dir
php artisan vendor:publish --tag=vueon-config --force
```

### Dodaj routes

```php
<?php
// Laravel routes
Route::get('/welcome', function () {
    return view('welcome');
});

// Laravel login auth redirect url
Route::get('/login', function () {
    return view('vueon::vue');
})->name('login');

// Vue all routes
Route::fallback(function () {
    return view('vueon::vue');
});
```

### Uruchom aplikację

demo/vue-project

```sh
cd vue-project
# Vue build
npm run build
# Clear Laravel view cache
php artisan view:clear
# Php Laravel server
php ../artisan serve
```

## Wyczyść view cache (dev mode)

Jeżeli przeglądarka nie pokazuje aktualnej strony lub pokazuje błąd wczytywania plików index.[hash].js wyczyść view cache w Laravelu i uruchom localny server ponownie.

```sh
php artisan view:clear
php artisan serve
```

### Lub wyłącz view cache w Laravel (dev mode)

Dodaj do pliku config/view.php

```php
<?php
return [
    'cache' => false,
    // ...
]
```

## Instalacja pakietów Vue

```sh
cd vue-project
npm install --save-dev axios
npm install --save-dev vue-i18n@9
npm install --save-dev @googlemaps/js-api-loader
```
