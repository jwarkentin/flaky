var flaky = require('../flaky'),
    HashTable = require('hashtable');

var testnum = 500000;
var ids = new HashTable();

for(var i = 0; i < 500000; ++i) {
  var id = flaky.base64Id();
  if(ids.has(id)) {
    console.log("Found duplicate key '" + id + "' at i = " + i + " - Original found at i = " + ids.get(id));
    process.exit();
  } else {
    ids.put(id, i);
  }
}
