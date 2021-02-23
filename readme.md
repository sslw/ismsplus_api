# ISMSPLUS client

ISMSPLUS is a PHP client for sending sms via SSL Wirless SMS gateway.

## Installation

```shell
composer require sslw/ismsplus
```

Wait for few minutes. Composer will automatically install this package for your project.

### For Laravel

Open `config/app` and add this line in `providers` section

```php
Ssl\Isms\SmsServiceProvider::class,
```

For Facade support you have add this line in `aliases` section.

```php
'Sms'   =>  Ssl\Isms\Facades\Sms::class,
```

Then run this command

```shell
php artisan vendor:publish --provider="Ssl\Isms\\SmsServiceProvider"
```

## Configuration

This package is required three configurations.

1. domain = Which is provided by SSL Wirless.
2. api_token = API authorization token which is provided by SSL Wirless
3. sid = Whis is provided by SSL Wireless

## Usages

php-sslwireless-sms is take an array as config file. Lets services

```php
use Ssl\Isms\SMS;

$sms = new Sms();
$response = $sms->single('01xxxxxxxxx','Your Message body', 'Your unique sms id');

$result = json_decode($response);

if($result->status_code == 200) {
    echo "Success";
} else {
    echo $result->error_message;
}

```
