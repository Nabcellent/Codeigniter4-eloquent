# The Illuminate Database package for CodeIgniter 4

[![Latest Stable Version](https://poser.pugx.org/nabcellent/codeigniter4-eloquent/v)](https://packagist.org/packages/nabcellent/codeigniter4-eloquent)
[![Total Downloads](https://poser.pugx.org/nabcellent/codeigniter4-eloquent/downloads)](https://packagist.org/packages/nabcellent/codeigniter4-eloquent)
[![Latest Unstable Version](https://poser.pugx.org/nabcellent/codeigniter4-eloquent/v/unstable)](https://packagist.org/packages/nabcellent/codeigniter4-eloquent)
[![License](https://poser.pugx.org/nabcellent/codeigniter4-eloquent/license)](https://packagist.org/packages/nabcellent/codeigniter4-eloquent)

Codeigniter Database package.

This started as a fork from [agungsugiarto/codeigniter4-eloquent](https://github.com/agungsugiarto/codeigniter4-eloquent). Changes include:

- PHP 8 support only
- Implemented Schema builder
- Updated illuminate/database to 8.*
- Updated illuminate/pagination to 8.*

## Installation

Include this package via Composer:
Add -W to downgrade psr/container package as Illuminate/container needs that version.

```console
composer require nabcellent/codeigniter4-eloquent -W
```

## Publish config
publish the config file with following spark command
```php
php spark eloquent:publish
```

## Customizing view pagination
The default view for pagination available with preset for bootstrap4 and basic html, if you want to customize
just copy from `\vendor\nabcellent\codeigniter4-eloquent\src\Views\Bootstrap4.php` and modify with your style after that put on folder App\Views. Finnaly change your config in `App\Config\Eloquent.php`

## Setup services eloquent
Open App\Controllers\BaseController.php

add `service('eloquent');` on function initController
```php
//--------------------------------------------------------------------
// Preload any models, libraries, etc, here.
//--------------------------------------------------------------------
// E.g.:
// $this->session = \Config\Services::session();

service('eloquent');
```
## Usage

Example model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'authors';
    protected $primaryKey = 'id';
}

```

### How to use in controller
```php
<?php 

namespace App\Controllers;

use App\Models\Authors;
use Nabz\Models\DB;

class Home extends BaseController
{
	public function index()
	{
		return $this->response->setJSON([
			'data'   => Authors::all(),
			'sample' => DB::table('authors')->skip(1)->take(100)->get(),
		]);
	}
}

```

## More info usefull link docs laravel
- [Database: Getting Started](https://laravel.com/docs/8.x/database)

- [Eloquent: Getting Started](https://laravel.com/docs/8.x/eloquent)

## Security

If you discover any security related issues, please email [nabcellent.dev@gmail.com](mailto:nabcellent.dev@gmail.com) instead of using the issue tracker.

## License

This package is free software distributed under the terms of the [MIT license](LICENSE.md).
