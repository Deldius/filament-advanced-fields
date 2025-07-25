# This package will provide additional missing fields for FilamentPHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/deldius/filament-advanced-fields.svg?style=flat-square)](https://packagist.org/packages/deldius/filament-advanced-fields)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/deldius/filament-advanced-fields/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/deldius/filament-advanced-fields/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/deldius/filament-advanced-fields/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/deldius/filament-advanced-fields/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/deldius/filament-advanced-fields.svg?style=flat-square)](https://packagist.org/packages/deldius/filament-advanced-fields)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require deldius/filament-advanced-fields
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-advanced-fields-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-advanced-fields-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-advanced-fields-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$advancedFields = new Deldius\AdvancedFields();
echo $advancedFields->echoPhrase('Hello, Deldius!');
```

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

- [Trung](https://github.com/Deldius)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
