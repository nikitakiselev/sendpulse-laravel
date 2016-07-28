# Sendpulse API for Laravel 5

Sendpulse API package for Laravel 5

# Installation

```bash
composer require nikitakiselev/sendpulse
```

Add `NikitaKiselev\SendPulse\SendPulseProvider::class` to providers

**config/app.php**
```php
'providers' => [
    NikitaKiselev\SendPulse\SendPulseProvider::class,
],

'aliases' => [
    'SendPulse' => NikitaKiselev\SendPulse\SendPulse::class,
]
```

Publish config

```bash
php artisan vendor:publish --provider="NikitaKiselev\SendPulse\SendPulseProvider" --tag="config"
```

Set the api key variables in your `.env` file

```
SENDPULSE_API_USER_ID=null
SENDPULSE_API_SECRET=null
```

# Usage API

https://sendpulse.com/ru/integrations/api

```php
// From container
$api = app('sendpulse');
$books = $api->listAddressBooks();

// From facade
$books = \SendPulse::listAddressBooks();

// From dependency injection
public function getBooks(\NikitaKiselev\SendPulse\Contracts\SendPulseApi $api)
{
    $books = $api->listAddressBooks();
}
```