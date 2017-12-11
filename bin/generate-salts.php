<?php

chdir(__DIR__);

if (!file_exists('../salts.php')) {
    $salts = file_get_contents('http://api.wordpress.org/secret-key/1.1/salt/');
    file_put_contents('../salts.php', "<?php" . PHP_EOL . PHP_EOL . $salts);
}
