
# Collection of Laravel helper functions


## Installation

```bash
  composer require shegunbabs/laravel-helpers
```

## Helpers

#### carbon
shortcut for `new Carbon` or `Carbon::parse()`
```php
carbon('today'); //2021-11-29 00:00:00
carbon('yesterday'); //2021-11-28 00:00:00
```

#### emoji
print emojis using php
```php
emoji('CHARACTER_GRINNING_FACE'); //😀
```
This function is based on the [Spatie Emoji package](https://github.com/spatie/emoji).
Refer to the documentation for more information

#### chain
Make an ordinary object chainable.
```php
chain(new SomeClass)
    ->firstMethod()
    ->secondMethod()
    ->thirdMethod(carry);

// Use "carry" constant to pass the return value of a method into the other.

chain(new Str)->lower('John Doe')->camel(carry);
// returns "johnDoe"
// You can grab the result of the chain by trailing a "()" on the end of it.
```