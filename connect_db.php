<?php

try {
    $konek= pg_connect("host=localhost user=postgres dbname=paud password=admin");
} Catch (Exception $e) {
    Echo $e->getMessage();
}
?>

