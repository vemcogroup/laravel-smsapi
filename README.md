# Laravel SmsApi

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vemcogroup/laravel-smsapi.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/laravel-smsapi)
[![Total Downloads](https://img.shields.io/packagist/dt/vemcogroup/laravel-smsapi.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/laravel-smsapi)

## Description

This package allows you to quickly send SMS in Laravel via the SMSAPI service.

This is first version and only support to send SMS.

Further versions will support more of SMSAPI features. 

Remember to register an account at [SMSAPI](https://www.smsapi.com/en/signup) before using this package.

## Installation

You can install the package via composer:

```bash
composer require vemcogroup/laravel-smsapi
```

The package will automatically register its service provider.

To publish the config file to `config/translation.php` run:

```bash
php artisan vendor:publish --provider="Vemcogroup\SmsApi\SmsApiServiceProvider"
```

This is the default contents of the configuration:

```php
return [

    /*
        |--------------------------------------------------------------------------
        | Token
        |--------------------------------------------------------------------------
        |
        | Here you define your API TOKEN for smsapi
        |
        | More info: https://www.smsapi.com/docs/#authentication
        |
        */
    
        'token' => env('SMSAPI_TOKEN'),
];
```

## Usage

You are now able to send sms with this code 

```bash
use Vemcogroup\SmsApi\SmsApi;

SmsApi::send($to, $from, $message);
``` 
