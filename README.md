Translit
=============

[![Build Status](https://travis-ci.org/Av007/translit.svg?branch=master)](https://travis-ci.org/Av007/translit)

The helper for url translation.

- Translation (russian, german and etc, except chinese japanese, thai... and other asian and Arabyan countries)
- Url translation, replacement with allowed url values
- Cutting long words


Usage
------
```
$title = Text::urlFormat('тест *?тест');
echo $title; // test-test 
```

Tests
----

```
composer install
./vendor/bin/phpunit -c phpunit.xml.dist --coverage-text
```
