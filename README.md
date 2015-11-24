# JWidgetBundle

Provides support of jwsdk (https://github.com/enepomnyaschih/jwsdk) in Symfony applications

## Requirements

* Symfony 2.3 *and later*
* PHP 5.3 *and later*

## Installation

### Install via Composer

Add the following lines to your `composer.json` file and then run `php composer.phar install` or `php composer.phar update`:

```json
{
    "require": {
        "issart/jwidget-sdk-bundle": "dev-master"
    },
    "repositories": [
        {
            "type": "git",
            "url": "git@github.com:dpetelin/jwidget-sdk-bundle.git
        },
    ],
}
```

### Register the bundle

To start using the bundle, register it in `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = [
        // Other bundles...
        new ISSArt\Bundle\JWidgetBundle\ISSArtJWidgetBundle(),
    ];
}
```

### Update config.yml

Add the following lines for doctrine configuration in `config.yml` file:

```yml
issart_jwidget:
    configPath: "%kernel.root_dir%/config/jwsdk
```

## Using

 run command 
 
 issart:jwidget:build