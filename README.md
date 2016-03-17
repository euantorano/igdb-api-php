# igdb-api-php
PHP Wrapper for IGDB.com API. Requires an API key. Request one from your user settings screen.

Example
```
<?php

require("igdb.php");

$igdb = new IGDB;

print($igdb->games(1979))

?>
```
