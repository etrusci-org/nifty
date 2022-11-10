# javascript / RandomQuoteTyper

## Files

- nifty / javascript / [RandomQuoteTyper.js](../../javascript/RandomQuoteTyper.js)
- nifty / javascript / [quotes.js](../../javascript/quotes.js)

## Usage

```html
<div class="randomQuoteTyper"></div>
```

```javascript
import { RandomQuoteTyper } from "./RandomQuoteTyper.js";
import { quotes } from './quotes.js';

RandomQuoteTyper.typingSpeed = 100;
RandomQuoteTyper.targetSelector = '.randomQuoteTyper';

RandomQuoteTyper.init(quotes);

RandomQuoteTyper.typeQuote();

setInterval(() => {
    RandomQuoteTyper.typeQuote();
}, 6_000);
```
