Wrike PHP SDK
================================

**Proof of Concept - NOT YET USABLE!!!**

**First usable version around 2017-03-01**

Introduction
------------

**This is full pre-configured Wrike PHP SDK package for [Wrike PHP Library](https://github.com/zibios/wrike-php-library).**

For general purpose please check [full configured Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk).
For none standard purposes please check [generic Wrike PHP Library](https://github.com/zibios/wrike-php-library),
[HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle),
and [response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer).

Project status
--------------

**Packagist**:
[![Packagist License](https://img.shields.io/packagist/l/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)

**This WrikePhpSdk**:
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3dea766e-c7cc-4180-b611-8a3b103f334f/mini.png)](https://insight.sensiolabs.com/projects/3dea766e-c7cc-4180-b611-8a3b103f334f)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1fcef9280f3844b6bb1249fe0f21de0f)](https://www.codacy.com/app/zibios/wrike-php-sdk)
[![Test Coverage](https://codeclimate.com/github/zibios/wrike-php-sdk/badges/coverage.svg)](https://codeclimate.com/github/zibios/wrike-php-sdk/coverage)
[![Build Status](https://travis-ci.org/zibios/wrike-php-sdk.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-sdk)
[![Dependency Status](https://www.versioneye.com/user/projects/588e6de35715cf00490345f5/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/588e6de35715cf00490345f5)

**Generic [WrikePhpLibrary](https://github.com/zibios/wrike-php-library)**:
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09/mini.png)](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9b3b1cf6321040fa910c0c1c335b5ba1)](https://www.codacy.com/app/zibios/wrike-php-library)
[![Test Coverage](https://codeclimate.com/github/zibios/wrike-php-library/badges/coverage.svg)](https://codeclimate.com/github/zibios/wrike-php-library/coverage)
[![Build Status](https://travis-ci.org/zibios/wrike-php-library.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-library)
[![Dependency Status](https://www.versioneye.com/user/projects/5899f1acc71294004c4c3322/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5899f1acc71294004c4c3322)

**Plugin [WrikePhpJmsserializer](https://github.com/zibios/wrike-php-jmsserializer)**:
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-jmsserializer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-jmsserializer/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c5257b55-3b63-4739-9e91-2f231d189691/mini.png)](https://insight.sensiolabs.com/projects/c5257b55-3b63-4739-9e91-2f231d189691)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/8d37c4ffd44647dba3f4e82dae223481)](https://www.codacy.com/app/zibios/wrike-php-jmsserializer)
[![Test Coverage](https://codeclimate.com/github/zibios/wrike-php-jmsserializer/badges/coverage.svg)](https://codeclimate.com/github/zibios/wrike-php-jmsserializer/coverage)
[![Build Status](https://travis-ci.org/zibios/wrike-php-jmsserializer.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-jmsserializer)
[![Dependency Status](https://www.versioneye.com/user/projects/5899f1afc71294003d853b1f/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5899f1afc71294003d853b1f)

**Plugin [WrikePhpGuzzle](https://github.com/zibios/wrike-php-guzzle)**:
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-guzzle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-guzzle/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8a8a49af-f1a6-40c9-97c6-dda145e8a75c/mini.png)](https://insight.sensiolabs.com/projects/8a8a49af-f1a6-40c9-97c6-dda145e8a75c)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1b24d23368ad4971a0fbf47ed0457e86)](https://www.codacy.com/app/zibios/wrike-php-guzzle)
[![Test Coverage](https://codeclimate.com/github/zibios/wrike-php-guzzle/badges/coverage.svg)](https://codeclimate.com/github/zibios/wrike-php-guzzle/coverage)
[![Build Status](https://travis-ci.org/zibios/wrike-php-guzzle.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-guzzle)
[![Dependency Status](https://www.versioneye.com/user/projects/5899f1dec71294004db15114/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5899f1dec71294004db15114)

[All badges](docs/Badges.md)

Installation
------------
To try it yourself clone the repository:

```bash
git clone git@github.com:zibios/wrike-php-sdk.git
cd wrike-php-sdk
```

and install dependencies with composer:

```bash
composer install
```

Run PHPUnit tests:

```bash
./vendor/bin/phpunit
``` 


Reference
---------

[Generic Wrike PHP Library](https://github.com/zibios/wrike-php-library)

[Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) for Wrike PHP Library

[HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle) for Wrike PHP Library


Official [Wrike API Documentation](https://developers.wrike.com/documentation/api/overview)

License
-------

This bundle is available under the [MIT license](LICENSE).
