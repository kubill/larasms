## LaraSms

this is a sms library for laravel

## Version Compatibility

| Sms Provider     |  Version  | Support |
|:-------:|:-------:|:-----:|
| more provider | coming soon |  |

Installation
------------

Install using composer:

```bash
composer require kubill/larasms
```

Laravel version < 5.5 (optional)
------------------

Add the service provider in `config/app.php`:

```php
\Kubill\LaraSms\SmsServiceProvider::class,
```

And add the `Sms` alias to `config/app.php`:

```php
'Sms' => \Kubill\LaraSms\Facades\Sms::class,
```

Then run these commands to publish config：

```bash
php artisan vendor:publish --provider="Kubill\LaraSms\SmsServiceProvider"
```

Basic Usage
-----------

use the `Sms` Facade:

simple
```php
use \Kubill\LaraSms\Facades\Sms;

Sms::send('hello world', '188xxxxxxxx');
```

batch
```php
use \Kubill\LaraSms\Facades\Sms;

Sms::batchSend('hello world', array('188xxxxxxxx', '189xxxxxxxx'));
```

## License

LaraSms is licensed under [The MIT License (MIT)](LICENSE).
