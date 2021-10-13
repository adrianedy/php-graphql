<?php

use GraphQL\Type\Definition\CustomScalarType;

$dynamicType = new CustomScalarType([
    'name' => 'Dynamic',
    'serialize' => static function($value) {
        return $value;
    },
    'parseValue' => static function($value) {
        return $value;
    },
    'parseLiteral' => static function(Node $valueNode, ?array $variables = null) {
        return $valueNode->value;
    },
]);

$emptyType = new CustomScalarType([
    'name' => 'Empty',
    'serialize' => static function($value) {
        return new stdClass;
    },
    'parseValue' => static function($value) {
        return new stdClass;
    },
    'parseLiteral' => static function(Node $valueNode, ?array $variables = null) {
        return new stdClass;
    },
]);