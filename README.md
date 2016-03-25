# igdb-api-php
PHP Wrapper for IGDB.com API. Requires an API key. Request one from your user settings screen.

Set your API key in the igdb.php file

Example
```
<?php

require("igdb.php");

$igdb = new IGDB;

print($igdb->games(1979))

?>
```
