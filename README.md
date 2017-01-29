Wrike PHP SDK
================================

**Proof of Concept - NOT YET USABLE!!!**

**First usable version around 2017-03-01**

[![Packagist](https://img.shields.io/packagist/v/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist](https://img.shields.io/packagist/vpre/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist](https://img.shields.io/packagist/dt/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist](https://img.shields.io/packagist/dm/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)
[![Packagist](https://img.shields.io/packagist/dd/zibios/wrike-php-sdk.svg)](https://packagist.org/packages/zibios/wrike-php-sdk)



**ToDo before v0.1.0 version**
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
