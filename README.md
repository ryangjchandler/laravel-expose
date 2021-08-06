# A clean integration between Laravel and Expose.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-expose.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-expose)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-expose/run-tests?label=tests)](https://github.com/ryangjchandler/laravel-expose/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-expose/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/laravel-expose/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-expose.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-expose)

This package provides an `artisan expose` command to quickly share you site via Expose. It will also replace the `APP_URL` environment variable with the URL that Expose is sharing your site through.

> This package only supports Expose setups that use a custom domain and specific subdomains. Support for free-tier users will come soon.

## Installation

You can install the package via composer:

```bash
composer require ryangjchandler/laravel-expose
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="RyanChandler\LaravelExpose\LaravelExposeServiceProvider" --tag="expose-config"
```

This is the contents of the published config file:

```php
return [

    'domain' => env('EXPOSE_DOMAIN'),

    'subdomain' => env('EXPOSE_SUBDOMAIN'),

    'server' => env('EXPOSE_SERVER'),

];
```

## Usage

You should begin by adding the following variables to your `.env` file:

```dotenv
EXPOSE_SUBDOMAIN=your-subdomain-here
EXPOSE_DOMAIN=your-domain-here.com
EXPOSE_SERVER=your-server-here # e.g. eu-1
```

Now you can run the `artisan expose` command and your `.env` file's `APP_URL` variable will be replaced with the new URL that Expose is using.

When you hit <kbd>Ctrl + C</kbd> to terminate the command, the `APP_URL` variable will be restored so that you can continue using your site locally.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
