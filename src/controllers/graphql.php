<?php

use GraphQL\GraphQL;
use GraphQL\Type\Schema;

require_once('../src/schema/graphql.php');

$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType,
]);

$query = json_request('query');

$result = GraphQL::executeQuery($schema, $query);
$output = $result->toArray();

header('Content-Type: application/json');
echo json_encode($output);
