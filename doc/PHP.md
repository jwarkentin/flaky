## Installation

```
composer require jwarkentin/flaky
```

Make sure you include the autoloader:

```php
require_once(__DIR__ . '/vendor/autoload.php');
```

## Usage Example

```php
use Flaky\Flaky;

Flaky::id();
// -> '17SBf4yMoD2z'

Flaky::id();
// -> '17SBf4yMIA3Y'

Flaky::id();
// -> '17SBf4yN0ZWw'
```

## API

### Flaky::id([base, [symbols]])

- `base`
  With the default character set you can pick any number between 2-64 for encoding. The higher the number the shorter the ID.
- `symbols`
  Currently you can specify any provided symbol string by name (`base64` or `base64URL` for now) or pass a string of unique characters.

```php
use Flaky\Flaky;

// Any number within the provided symbol string length
Flaky::id(48);

// `null` will skip arguments
Flaky::id(null, 'base64URL');

// Pass your own set of characters. Useful if you want a higher base encoding.
Flaky::id(85, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+/?<>,.;:|');
```