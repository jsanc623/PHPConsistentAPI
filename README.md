# Consistent PHP Library

## Overview

The Consistent PHP Library is a collection of utility classes that provide a consistent interface for various PHP standard library functions. The library aims to enhance code readability and maintainability by using a fluent interface and standardized method names.

## Features

- **Fluent Interface**: Chain method calls for cleaner and more readable code.
- **Consistent Method Naming**: Intuitive method names that mirror PHP standard library functions.
- **Type Safety**: Built with PHP 8 type declarations for better code quality and error handling.

## Supported Classes

The following classes are included in the library, each corresponding to a specific set of PHP standard library functions:

- **ArrayUtils**: Provides utility methods for array manipulation.
- **Config**: Handles configuration loading and management.
- **Console**: Provides utility functions for console operations.
- **Cookie**: Manages cookies in a consistent manner.
- **Csv**: Handles CSV file operations.
- **Date**: Provides date and time utility functions.
- **Env**: Manages environment variables.
- **File**: Provides utility functions for file operations.
- **Hash**: Handles hashing operations.
- **Http**: Provides HTTP-related utility functions.
- **Image**: Manages image processing tasks.
- **Json**: Handles JSON encoding and decoding.
- **Locale**: Provides localization and internationalization utilities.
- **Mail**: Provides functionality for sending emails.
- **Math**: Contains mathematical utility functions.
- **Number**: Provides utility functions for number manipulation.
- **Path**: Handles path-related operations.
- **Regex**: Provides regular expression utilities.
- **Secure**: Handles security-related functions.
- **Session**: Manages session operations.
- **Str**: Provides string manipulation functions.
- **Type**: Contains type-checking utilities.
- **Url**: Provides URL manipulation and validation functions.
- **Xml**: Handles XML parsing and manipulation.

## Installation

You can install the library using Composer. Add the following line to your `composer.json` file:

```json
{
    "require": {
        "nsa-yoda/consistent-php": "^1.0"
    }
}
```

Then run:

```bash
composer install
```


## Usage

Here’s a quick example of how to use the library:

```php
use ConsistentPHP\ArrayUtils;

$array = new ArrayUtils([1, 2, 3]);
$result = $array->push(4)->unique()->values()->toArray();
print_r($result); // Outputs: [1, 2, 3, 4]
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.