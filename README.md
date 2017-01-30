Wrike PHP SDK
================================

**Proof of Concept - NOT YET USABLE!!!**

**First usable version around 2017-03-01**

**Packagist**
[![Packagist License](https://img.shields.io/packagist/l/doctrine/orm.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)

**Github** 
[![Github License](https://img.shields.io/github/license/zibios/wrike-php-sdk.svg)](https://github.com/zibios/wrike-php-sdk/blob/master/LICENSE)
[![Github Downloads](https://img.shields.io/github/downloads/zibios/wrike-php-sdk/total.svg)](https://github.com/zibios/wrike-php-sdk)
[![Github Tag](https://img.shields.io/github/tag/zibios/wrike-php-sdk.svg)](https://github.com/zibios/wrike-php-sdk)
[![Github Release](https://img.shields.io/github/release/zibios/wrike-php-sdk.svg)](https://github.com/zibios/wrike-php-sdk)

**Scrutnizer**
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-sdk/?branch=master)

**Libraries.io**
[![Libraries.io](https://img.shields.io/librariesio/github/zibios/wrike-php-sdk.svg)](https://libraries.io/packagist/zibios%2Fwrike-php-sdk)

**VersionEye**
[![Dependency Status](https://www.versioneye.com/user/projects/588e6de35715cf00490345f5/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/588e6de35715cf00490345f5)

**Travis**
[![Build Status](https://travis-ci.org/zibios/wrike-php-sdk.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-sdk)

**SensioLabs Insight**
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/3dea766e-c7cc-4180-b611-8a3b103f334f.svg)](https://insight.sensiolabs.com/projects/3dea766e-c7cc-4180-b611-8a3b103f334f)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3dea766e-c7cc-4180-b611-8a3b103f334f/mini.png)](https://insight.sensiolabs.com/projects/3dea766e-c7cc-4180-b611-8a3b103f334f)

**Codacy**
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1fcef9280f3844b6bb1249fe0f21de0f)](https://www.codacy.com/app/zibios/wrike-php-sdk)
[![Codacy grade](https://img.shields.io/codacy/grade/1fcef9280f3844b6bb1249fe0f21de0f.svg)](https://www.codacy.com/app/zibios/wrike-php-sdk)
[![Codacy coverage](https://img.shields.io/codacy/coverage/1fcef9280f3844b6bb1249fe0f21de0f.svg)](https://www.codacy.com/app/zibios/wrike-php-sdk)

**Required for v0.1.0 version**
- [ ] Connect to external services (packagist, travis, scrutinizer, ...)
- [ ] Establishing some common rules for all external services
- [ ] Wrike OAuth 2.0 implementation
- [ ] Wrike Web-hooks implementation
- [ ] Code Review
- [ ] Architecture refactoring: "More KISS, or more SOLID, that is the question"
- [ ] Test suite refactoring
- [ ] Resource implementation finalize
- [ ] Test suite finalize
- [ ] Documentation prepare

**Resources implementation status**
- [x] Contacts
- [x] Users
- [x] Groups
- [x] Invitations
- [ ] Accounts
- [ ] Workflows
- [ ] Custom Fields
- [ ] Folders and Projects
- [ ] Tasks
- [ ] Comments
- [ ] Dependencies
- [ ] Timelogs
- [ ] Attachments
- [ ] Version
- [ ] IDs
- [ ] Colors

Installation
-----------
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
-------

[Wrike API Documentation](https://developers.wrike.com/documentation/api/overview)

Package general architecture inspired by [mpclarkson/freshdesk-php-sdk](https://github.com/mpclarkson/freshdesk-php-sdk) 

License
-------

This bundle is available under the [MIT license](LICENSE).
