<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require_once('../src/schema/types/others.php');
require_once('../src/schema/types/comments.php');
require_once('../src/schema/types/movies.php');

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'movies' => $moviesQuery,
    ]
]);

$mutationType = new ObjectType([
    'name' => 'Mutation',
    'fields' => [
        'createComment' => $createCommentMutation,
        'updateComment' => $updateCommentMutation,
        'deleteComment' => $deleteCommentMutation,
    ],
]);