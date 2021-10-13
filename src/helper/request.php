<?php

$_APP_json_requests = false;

function json_request($name) {
    global $_APP_json_requests;
    if ($_APP_json_requests === false) {
        $_APP_json_requests = json_decode(file_get_contents('php://input'), true);
    }
    if (is_null($_APP_json_requests)) {
        return null;
    }
    return isset($_APP_json_requests[$name]) ? $_APP_json_requests[$name] : null;
}

