# javascript / addTargetToExtLinks

## Files

- nifty / javascript / [addTargetToExtLinks.js](../../javascript/addTargetToExtLinks.js)

## Usage

```html
<a href="page.html">local-link-1</a>
<!-- expected:
<a href="page.html">local-link-1</a>
-->

<a href="https://mydomain.com/page.html">local-link-2</a>
<!-- expected:
<a href="https://mydomain.com/page.html">local-link-2</a>
-->

<a href="https://example.org">remote-link-1</a>
<!-- expected:
<a href="https://example.org" target="_blank">remote-link-1</a>
-->
```

```html
<script type="module">
    import { addTargetToExtLinks } from "./addTargetToExtLinks.js";

    // on DOM loaded
    addTargetToExtLinks()

    // or optionally override target and/or cssClass
    // addTargetToExtLinks('_self', 'myCssClass');
</script>
```
