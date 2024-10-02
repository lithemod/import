# Import

Lithe Import is a PHP library designed to facilitate the dynamic inclusion of PHP files and the management of external variables.

## Installation

You can install `Import` using Composer. Run the following command in your terminal:

```bash
composer require lithemod/import
```

## Usage

### Including a Single File

To include a single PHP file, use the `file` method:

```php
use Lithe\Support\import;

$result = import::file('path/to/your/testfile.php');
```

### Including All Files from a Directory

To include all PHP files from a specified directory (and its subdirectories), you can set the directory and call the `get` method:

```php
use Lithe\Support\import;

$importer = import::dir('path/to/directory')->exceptions(['exclude.php']);
$importer->get();
```

### Using External Variables

You can specify external variables that should be available in the included files:

```php
use Lithe\Support\import;

$vars = ['var1' => 'value1'];
import::with($vars)->dir('path/to/directory')->get();
```

### Excluding Files

To exclude specific files from being included, use the `exceptions` method:

```php
$importer = import::dir('path/to/directory')->exceptions(['exclude.php']);
$importer->get();
```

## Methods Overview

- `with(array $vars)`: Sets external variables to be available in the included files.
- `dir(string $directory)`: Sets the directory for file inclusion.
- `exceptions(array $exceptions)`: Specifies files to be excluded from inclusion.
- `file(string $file)`: Includes a single PHP file and returns its result.
- `get()`: Includes all PHP files from the specified directory, excluding specified exceptions.

## License

This project is licensed under the MIT License. See the LICENSE file for details.