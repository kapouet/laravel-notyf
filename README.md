![Laravel Notyf banner](https://laravel-og.beyondco.de/Laravel%20Notyf.png?theme=dark&packageManager=composer+require&packageName=kapouet%2Flaravel-notyf&pattern=architect&style=style_1&description=Add+Notyf+support+in+your+Laravel+app&md=1&showWatermark=1&fontSize=100px&images=bell)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kapouet/laravel-notyf.svg?style=flat-square)](https://packagist.org/packages/kapouet/laravel-notyf)
[![Total Downloads](https://img.shields.io/packagist/dt/kapouet/laravel-notyf.svg?style=flat-square)](https://packagist.org/packages/kapouet/laravel-notyf)

Add [Notyf](https://github.com/caroso1222/notyf) support in your Laravel app.

## Installation

You can install the package via composer

```shell
composer require kapouet/laravel-notyf
```

You can publish the config file with:

```shell
php artisan vendor:publish --provider="Kapouet\Notyf\NotyfServiceProvider" --tag="kapouet:config"
```

The config file is structured like Notyf, but in PHP, see https://github.com/caroso1222/notyf#api

## Usage

### Import assets

```html
<!-- For CSS -->
<x-notyf::styles/>

<!-- For JS -->
<!-- Import this script after Livewire if you use it -->
<xnotyf::scripts/>
```

### Send toast with PHP

```php
Notyf::success('I\'m a success message');
Notyf::error('I\'m an error message');

// If you are added custom types in config file
// https://github.com/caroso1222/notyf#inotyfnotificationoptions
Notyf::message('custom', 'I\'m a custom message');
```

### Send toast with Livewire

```php
use Kapouet\Notyf\Traits\Livewire\WithNotyf;
use Livewire\Component;

class MyComponent extends Component
{
    use WithNotyf;
    
    public function render(): string
    {
        return <<<'blade'
            <div>
                <button wire:click="toast">Toast me</button>
            </div>
        blade;
    }
    
    public function toast(): void
    {
        $this->notyfSuccess('I\'m a success message');
        $this->notyfError('I\'m an error message');

        // If you are added custom types in config file
        // https://github.com/caroso1222/notyf#inotyfnotificationoptions
        $this->notyfMessage('custom', 'I\'m a custom message');
    }
}
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Quentin CATHERINE](https://github.com/balsakup)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
