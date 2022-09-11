# javascript / secondsToDurationString

## Files

- nifty / javascript / [secondsToDurationString.js](../../javascript/secondsToDurationString.js)

## Usage

```javascript
import { secondsToDurationString } from "./secondsToDurationString.js";

let sec = secondsToDurationString(1);
let min = secondsToDurationString(60);
let hour = secondsToDurationString(60 * 60, false);

let tpl = { prefix: '<', d: '{d}:', h: '{h}:', m: '{m}:', s: '{s}', suffix: '>' };
let day = secondsToDurationString(60 * 60 * 24, false, tpl);

console.log(sec);
// expected output:
// 0d 00h 00m 01s

console.log(min);
// expected output:
// 0d 00h 01m 00s

console.log(hour);
// expected output:
// 0d 1h 0m 0s

console.log(day);
// expected output:
// <1:0:0:0>
```
