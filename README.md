# Croppie Widget for Yii2 

[![Latest Version](https://img.shields.io/github/release/2amigos/yii2-croppie-widget.svg?style=flat-square)](https://github.com/2amigos/yii2-croppie-widget/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-croppie-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-croppie-widget)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-croppie-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-croppie-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-croppie-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-croppie-widget)

Renders a [Croppie plugin](http://foliotek.github.io/Croppie/). The fast, easy to use, image cropping plugin with tons
of configuration options!

## Install

Via Composer

```bash
$ composer require 2amigos/yii2-croppie-widget
```

## Usage

The usage of this widget is pretty simple:

```php

<?php

use dosamigos\croppie\CroppieWidget;

/* @var $this yii\web\View */
?>

<?= CroppieWidget::widget(['id' => 'test-widget', 'clientOptions' => ['enableExif']]) ?>
```

## Testing

```bash
$ phpunit
```

## Using code fixer

We have added a PHP code fixer to standardize our code. It includes Symfony, PSR2 and some contributors rules. 

```bash 
./vendor/bin/php-cs-fixer fix ./src --config .php_cs
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [2amigos](https://github.com/2amigos)
- [All Contributors](../../contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

<blockquote>
    <a href="http://www.2amigos.us"><img src="http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png"></a><br>
    <i>Custom Software | Web & Mobile Development </i><br>
    <a href="http://www.2amigos.us">www.2amigos.us</a>
</blockquote>
