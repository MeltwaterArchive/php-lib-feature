Feature Flags
=============

[![Latest Version on Packagist](https://img.shields.io/packagist/v/datasift/feature.svg?style=flat-square)](https://packagist.org/packages/datasift/feature)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/datasift/php-lib-feature/master.svg?style=flat-square)](https://travis-ci.org/datasift/php-lib-feature)
[![Total Downloads](https://img.shields.io/packagist/dt/datasift/feature.svg?style=flat-square)](https://packagist.org/packages/datasift/feature)

Simple PHP Library to manager feature flags

Installation
------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `datasift/feature`.

	"require": {
		"datasift/feature": "3.*"
	}

Next, update Composer from the Terminal:

    composer update


Drivers
-------

- Array - Simple array of key value pairs.
- File - JSON file containing key value pairs.
- Consul - Using consul key value store.
- Redis - Using redis key value store.

Usage
-----

TBA

Testing
-------

To test the library itself, run the tests:

    composer test
    
Contributing
------------

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

Credits
-------

- [nathanmac](https://github.com/nathanmac)
- [All Contributors](../../contributors)

License
-------

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
