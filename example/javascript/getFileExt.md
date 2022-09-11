# javascript / getFileExt

## Files

- nifty / javascript / [getFileExt.js](../../javascript/getFileExt.js)

## Usage

```javascript
import { getFileExt } from "./getFileExt.js";

let ext1 = getFileExt('path/to/hello.txt');
let ext2 = getFileExt('path/to/hello');

console.log(ext1);
// expected output:
// txt

console.log(ext2);
// expected output:
// path/to/hello
```
