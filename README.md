Laravel Breadcumbs
================
[![Build Status](https://travis-ci.org/mateusjatenee/laravel-breadcumbs.svg?branch=master)](https://travis-ci.org/mateusjatenee/laravel-breadcumbs)
[![Latest Stable Version](https://poser.pugx.org/mateusjatenee/laravel-breadcumb/v/stable)](https://packagist.org/packages/mateusjatenee/laravel-breadcumb)
[![Total Downloads](https://poser.pugx.org/mateusjatenee/laravel-breadcumb/downloads)](https://packagist.org/packages/mateusjatenee/laravel-breadcumb)
[![Latest Unstable Version](https://poser.pugx.org/mateusjatenee/laravel-breadcumb/v/unstable)](https://packagist.org/packages/mateusjatenee/laravel-breadcumb)
[![License](https://poser.pugx.org/mateusjatenee/laravel-breadcumb/license)](https://packagist.org/packages/mateusjatenee/laravel-breadcumb)


This package allows you to generate HTML for breadcumbs. Here's an example:  

```php
Breadcumb::generate('users.show')
```

results on this using the Cube Dashboard Driver

`<ol class="breadcrumb"><li><span>Users</span></li><li class="active"><span>Show</span></li></ol>`  

You may write your own drivers. This will be documented soon.   

## Installation

This package can be installed through Composer.

``` bash
$ composer require mateusjatenee/laravel-breadcumbs
```

Add the following service provider

```php
// config/app.php
'providers' => [
    ...
    Mateusjatenee\Breadcumb\BreadcumbServiceProvider::class,
    ...
];
```

This package also comes with a facade, which provides an easy way to call the the class.

```php
// config/app.php
'aliases' => [
    ...
    'Breadcumb' => Mateusjatenee\Breadcumb\Facades\Breadcumb::class,
    ...
];
```  

You may register your drivers with the following code  
```php
Breadcumb::addDriver('driverName', DriverClass::class);
```  

And you may switch the default driver with the following code  
```php
Breadcumb::setDriver('driverName');
```

#### Running tests
``` bash
$ composer test
```

#### License
This library is licensed under the MIT license. Please see [LICENSE](LICENSE.md) for more details.

#### Changelog
Please see [CHANGELOG](CHANGELOG.md) for more details.

#### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for more details.
