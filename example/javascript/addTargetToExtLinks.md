# javascript / addTargetToExtLinks

## Files

- nifty / javascript / [addTargetToExtLinks.js](../../javascript/addTargetToExtLinks.js)

## Usage

```html
<a href="page.html">local-link-1</a>
<!-- expected change:
none
-->

<a href="https://mydomain.com/page.html">local-link-2</a>
<!-- expected change:
none
-->

<a href="https://example.org">remote-link-1</a>
<!-- expected change:
<a href="https://example.org" target="_blank">remote-link-1</a>
-->
```

```javascript
import { addTargetToExtLinks } from "./addTargetToExtLinks.js";

// on DOM loaded
addTargetToExtLinks();

// or optionally override target and/or add cssClass
addTargetToExtLinks('_self', 'myCssClass');
```
