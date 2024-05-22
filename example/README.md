# Run The Server
>php -S localhost:4000 index.php

# Notes
The example server pegs SimpleCache to version 2.* as the default cache used by `eppo/php-sdk` is
`sarahman/simple-filesystem-cache` which, at the time of writing is not compatible with
`opsr/simple-cache@3.*`. This workaround is not necessary with `eppo/php-sdk` version 3 or greater
as this pinning is done in the `eppo/php-sdk` package.
