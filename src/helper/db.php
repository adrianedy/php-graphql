<?php

$_APP_db = false;

function db_collection($name) {
    global $_APP_db;
    if ($_APP_db === false) {
        $_APP_db = (new MongoDB\Client)->mflix;
    }

    return $_APP_db->{$name};
}