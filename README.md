# Laravel Registration Validator
_Solid credential validation for Laravel >= 7.x_

This is fork from [photogabble/laravel-registration-validator](https://github.com/photogabble/laravel-registration-validator)  that hasn't been maintained for 3 years. 

Main goal is to mitigate potential issues caused by _Unicode [homoglyphs](https://en.wikipedia.org/wiki/Homoglyph)_ 
> a homoglyph is one of two or more graphemes, characters, or glyphs with
shapes that **appear identical or very similar**

Here is a [utility](http://unicode.org/cldr/utility/confusables.jsp) to play with these **confusable homoglyphs**.
The Unicode Consortium published list of this [confusable](https://www.unicode.org/Public/security/latest/confusables.txt)

---
  <a href="https://travis-ci.org/r4v/laravel-registration-validator"><img src="https://travis-ci.org/r4v/laravel-registration-validator.svg?branch=master" alt="Build Status"></a>
  <a href="https://packagist.org/packages/r4v/laravel-registration-validator"><img src="https://img.shields.io/packagist/v/r4v/laravel-registration-validator.svg" alt="Latest Stable Version"></a>
  <a href="LICENSE"><img src="https://img.shields.io/github/license/r4v/laravel-registration-validator.svg" alt="License"></a>

### About this package

> _An all-Latin username containing confusables is probably fine, and an all-Cyrillic username containing confusables is probably fine, but a username containing mostly Latin plus one Cyrillic code point which happens to be confusable with a Latin one… is not._ - [James Bennet](https://www.b-list.org/weblog/2018/feb/11/usernames/)

I began writing this package soon after reading the above quote from [this article](https://www.b-list.org/weblog/2018/feb/11/usernames/) by James Bennett on registration credential validation that referenced how [Django’s auth system](https://github.com/ubernostrum/django-registration/blob/1d7d0f01a24b916977016c1d66823a5e4a33f2a0/registration/validators.py) validates new users credentials.

In addition to unicode confusables validation this package also includes a PHP port of the reserved name validation that Django's auth system uses.

This is project built for use with Laravel versions >= 7.x and PHP >= 7.1.

### Install

Install this library with composer: `composer require r4v/laravel-registration-validator`.

### Usage

This package provides three validators: `not-reserved-name`, `not-confusable-string` and `not-confusable-email`.

#### Not Reserved Name Validator

This validator checks the input to ensure it does not contain any strings listed within config key `registration-validation.reserved_list`. To extend this list use the `php artisan vendor:publish` command to copy this config to your project.

#### Not Confusable String Validator

This validator checks the input using the [photogabble/php-confusable-homoglyphs](https://github.com/photogabble/php-confusable-homoglyphs) to ensure it does not contain any confusable unicode characters.

#### Not Confusable Email Validator

This validator does not validate that the input is a valid email address, instead it validates that a string containing an `@` does not contain any confusable unicode characters for each part either side of the `@` symbol.
