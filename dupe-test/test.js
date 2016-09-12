let flaky = require('../flaky'),
    HashTable = require('hashtable')

let testnum = 5000000
let ids = new HashTable()

for (let i = 0; i < testnum; ++i) {
  let id = flaky.id()
  if (ids.has(id)) {
    console.log("Found duplicate key '" + id + "' at i = " + i + " - Original found at i = " + ids.get(id))
    process.exit()
  } else {
    // console.log(i, id)
    ids.put(id, i)
  }
}

console.log('Finished with no collisions!')