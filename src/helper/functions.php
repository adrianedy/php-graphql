<?php

function get_array_value($array, $key) {
    return isset($array[$key]) ? $array[$key] : null;
}