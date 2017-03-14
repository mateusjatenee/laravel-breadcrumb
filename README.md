Laravel Breadcumbs
================
[![Build Status](https://travis-ci.org/mateusjatenee/laravel-breadcrumb.svg?branch=master)](https://travis-ci.org/mateusjatenee/laravel-breadcrumbs)
[![Latest Stable Version](https://poser.pugx.org/mateusjatenee/laravel-breadcrumb/v/stable)](https://packagist.org/packages/mateusjatenee/laravel-breadcrumb)
[![Total Downloads](https://poser.pugx.org/mateusjatenee/laravel-breadcrumb/downloads)](https://packagist.org/packages/mateusjatenee/laravel-breadcrumb)
[![Latest Unstable Version](https://poser.pugx.org/mateusjatenee/laravel-breadcrumb/v/unstable)](https://packagist.org/packages/mateusjatenee/laravel-breadcrumb)
[![License](https://poser.pugx.org/mateusjatenee/laravel-breadcrumb/license)](https://packagist.org/packages/mateusjatenee/laravel-breadcrumb)


This package allows you to generate HTML for breadcumbs. Here's an example:  

```php
Breadcrumb::generate('users.show')
```

results on this using the Bootstrap Driver

`<ol class="breadcrumb"><li><span>Users</span></li><li class="active"><span>Show</span></li></ol>`  

You may write your own drivers. This will be documented soon.   

## Installation

This package can be installed through Composer.

``` bash
$ composer require mateusjatenee/laravel-breadcrumbs
```

Add the following service provider

```php
// config/app.php
'providers' => [
    ...
    Mateusjatenee\Breadcrumb\BreadcrumbServiceProvider::class,
    ...
];
```

This package also comes with a facade, which provides an easy way to call the the class.

```php
// config/app.php
'aliases' => [
    ...
    'Breadcrumb' => Mateusjatenee\Breadcrumb\Facades\Breadcrumb::class,
    ...
];
```  

You may register your drivers with the following code in a service provider's `boot` method
```php
Breadcumb::addDriver('driverName', DriverClass::class);
```  

And you may switch the default driver with the following code  
```php
Breadcumb::setDriver('driverName');
```

### Writing Drivers  

Writing a driver is pretty simple. You just have to create a class that extends `Mateusjatenee\Breadcrumb\BreadcrumbGenerator` and implements `Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract` and add the following methods: `getParentTags`, `getItemTags`, `getLastItemTags`. Example:  

```php
<?php

class BootstrapDriver extends BreadcrumbGenerator implements BreadcrumbDriverContract
{
    public function getParentTags()
    {
        return '<ol class="breadcrumb">{content}</ol>';
    }

    public function getItemTags()
    {
        return '<li><span>{item}</span></li>';
    }

    public function getLastItemTags()
    {
        return '<li class="active"><span>{item}</span></li>';
    }
}

?>

```

The package will automatically use that information to generate your HTML.

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
