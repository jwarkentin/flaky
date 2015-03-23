# flaky
Node.js module for generating short, fixed-length, sequential UUIDs ideal for indexing in various tree based structures, with no external dependencies.

## Motiviation
I wanted a UUID generator that was designed for use with indexing to provide the best performance for indexing and lookups, while also being efficient with space (i.e. short ids). This is designed based on my understanding of how elasticsearch BlockTree indexing works as explained by [Mike McCandless](http://blog.mikemccandless.com/2014/05/choosing-fast-unique-identifier-uuid.html). It is loosely based on the concept of flake ids.

To learn more about flake id see:
* http://www.boundary.com/blog/2012/01/flake-a-decentralized-k-ordered-unique-id-generator-in-erlang/
* There are some noteworthy comments on HN as well: https://news.ycombinator.com/item?id=3461557

More specific to elasticsearch, see:
* elasticsearch [issue 5941](https://github.com/elastic/elasticsearch/issues/5941)
* elasticsearch [implementation](https://github.com/elastic/elasticsearch/blob/9c1ac95ba8e593c90b4681f2a554b12ff677cf89/src/main/java/org/elasticsearch/common/TimeBasedUUIDGenerator.java)

## Installation
```
npm install flaky
```

## Usage

```js
var flaky = require('flaky');

flaky.base64Id();
// -> 'UxFXMp1tDQA'

flaky.base64Id();
// -> 'UxFXMp1tDQB'

flaky.base64Id();
// -> 'UxFXMp1tDQC'
```

You can also get a raw [Buffer](https://nodejs.org/api/buffer.html) object which you can encode however you want:
```js
var flaky = require('flaky');

flaky.bufferId();
// -> <Buffer 14 31 05 17 0c 29 35 2d 03 10 02>
```
