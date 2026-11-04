# php-secure-headers

Apply production-grade security headers with one line. Zero dependencies, works on any PHP 8+ shared host.

## Features
- Sensible default CSP, HSTS, X-Frame-Options, Referrer-Policy, Permissions-Policy
- Easy per-route overrides
- Supports nonce generation for inline scripts
- Tested on Apache, Nginx, LiteSpeed

## Install
```bash
composer require yourname/php-secure-headers
```
Or drop `SecureHeaders.php` into your project.

## Usage
```php
require 'SecureHeaders.php';

$headers = new SecureHeaders();
$headers->send();           // default secure set

// With nonce for a script
$nonce = $headers->nonce();
$headers->send();
```

## Example output
```
Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-abc123'
Strict-Transport-Security: max-age=31536000; includeSubDomains
...
```

## Roadmap
- Add reporting endpoint helper
- CLI validator for header syntax

## Contributing
PRs welcome. Keep changes under 100 lines.