## Installation

```
npm install flaky
```

## Usage Example

```js
var flaky = require('flaky');

flaky.id()
// -> '5n29BnZXhcR'

flaky.id()
// -> '5n29BnZXhcS'

flaky.id()
// -> '5n29BnZXhcT'
```

## API

### flaky#id([base, [symbols]])

- `base`
  With the default character set you can pick any number between 2-64 for encoding. The higher the number the shorter the ID.
- `symbols`
  Currently you can specify any provided symbol string by name (`base64` or `base64URL` for now) or pass a string of unique characters.

```js
// Any number within the provided symbol string length
flaky.id(48)

// `null` will skip arguments
flaky.id(null, 'base64URL')

// Pass your own set of characters. Useful if you want a higher base encoding.
flaky.id(85, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+/?<>,.;:|')
```