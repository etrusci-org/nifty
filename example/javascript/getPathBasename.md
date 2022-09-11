# javascript / getPathBasename

## Files

- nifty / javascript / [getPathBasename.js](../../javascript/getPathBasename.js)

## Usage

```javascript
import { getPathBasename } from "./getPathBasename.js";

let basename1 = getPathBasename('path/to/hello.txt')
let basename2 = getPathBasename('path/to/hello')
let basename3 = getPathBasename('path/to/hello/')

console.log(basename1)
// expected output:
// hello.txt

console.log(basename2)
// expected output:
// hello

console.log(basename3)
// expected output:
// hello
```
