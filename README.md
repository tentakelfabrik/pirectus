# Pirectus - a small Client for Directus 9

This Client Supports Directus 9, it is written in PHP and use Guzzle for handling requests.

In this Version

## Installation

```php

```

## Quickstart

```php
require('vendor/autoload.php');

use Pirectus\Pirectus;
use Pirectus\Auth\TokenAuth;

$pirectus = new Pirectus('<directus-url>', [
    'auth' => new TokenAuth('<directus-authtoken>')
]);
```

```php
$results = $pirectus
    ->items('pages')
    ->fields(['id', 'title', 'content'])
    ->filter([
        'status' => ['_eq' => 'published']
    ])
    ->find();
```