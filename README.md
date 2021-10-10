# Pirectus - a small Client for Directus 9

This Version is in a early Stage and only supports get, post, patch for Items. Authentification is only possible with token.
It uses [Guzzle, PHP HTTP client](https://docs.guzzlephp.org/en/stable/) and is inspired by the [Directus JavaScript SDK](https://docs.directus.io/reference/sdk/)

Pirectus is used in [Super Gear Directus](https://github.com/tentakelfabrik/super-gear-directus), a small CMS.

## Installation

```php
composer require tentakelfabrik/pirectus
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

## ItemsQueryBuilder

### fields(array $fields)
### addFields(array $fields)
### filter(array $filter)
### addFilter(array $filter)
### limit(int $value)
### offset(int $value)
### groupBy(array $groupBy)
### addGroupBy(string $field)
### aggregate(string $aggregate, string $field)
### sort(array $sort)
### addSort(array $sort)
### search(string $value)
### meta(string $value)
### aliases(string $field, string $alias)