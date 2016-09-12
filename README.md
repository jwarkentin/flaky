# flaky

Node.js module for generating short, fixed-length, sequential UUIDs ideal for indexing in various tree based structures. It creates IDs without coordination between servers/instances (even multiple instances on the same machine) that can be used confidently without collisions, while still being mostly sequential and always ascending. It is also resistant to potentially large backward time jumps of the system clock (the amount of tolerance depends on how long it takes you to generate 100,000 ids basically).

All Flaky IDs are created with a full 64 bits of data. Flaky also provides a lot of flexibility in terms of what base encoding you want to use and what character set to encode with. By default it will do base 64 encoding and use the standard character set.

## Motiviation

I wanted a UUID generator that was designed for use with common database indexing techniques to provide the best performance for indexing and lookups, while also being efficient with space (i.e. short IDs). This is designed based on my understanding of how elasticsearch BlockTree indexing works as explained by [Mike McCandless](http://blog.mikemccandless.com/2014/05/choosing-fast-unique-identifier-uuid.html). It is loosely based on the concept of flake IDs. In my own benchmarks these IDs have proven to be faster and more efficient than the standard IDs assigned by Elasticsearch. It should work well with MySQL's InnoDB index format as well (though I haven't tested it).

To learn more about flake IDs see:
* http://www.boundary.com/blog/2012/01/flake-a-decentralized-k-ordered-unique-id-generator-in-erlang/
* There are some noteworthy comments on HN as well: https://news.ycombinator.com/item?id=3461557
* http://engineering.custommade.com/simpleflake-distributed-id-generation-for-the-lazy/
* "Use auto id or pick a good id" section at the bottom of the page: https://www.elastic.co/blog/performance-considerations-elasticsearch-indexing/

More specific to Elasticsearch, see:
* elasticsearch [issue 5941](https://github.com/elastic/elasticsearch/issues/5941)
* elasticsearch [implementation](https://github.com/elastic/elasticsearch/blob/9c1ac95ba8e593c90b4681f2a554b12ff677cf89/src/main/java/org/elasticsearch/common/TimeBasedUUIDGenerator.java)

## API

* [JavaScript](doc/JavaScript.php)
* [PHP](doc/PHP.md)