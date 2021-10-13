<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$createCommentMutation = [
    'type' => $emptyType,
    'args' => [
        'name' => [
            'type' => Type::string(),
        ],
        'email' => [
            'type' => Type::string(),
        ],
        'movie_id' => [
            'type' => Type::string(),
        ],
        'text' => [
            'type' => Type::string(),
        ],
    ],
    'resolve' => function ($rootValue, $args) {
        db_collection("comments")->insertOne([
            'name' => get_array_value($args, 'name'),
            'email' => get_array_value($args, 'email'),
            'movie_id' => new MongoDB\BSON\ObjectID(get_array_value($args, 'movie_id')),
            'text' => get_array_value($args, 'text'),
            'created_at' => new MongoDB\BSON\UTCDateTime(time()*1000),
        ]);
        
        return true;
    }
];

$updateCommentMutation = [
    'type' => $emptyType,
    'args' => [
        '_id' => [
            'type' => Type::string(),
        ],
        'name' => [
            'type' => Type::string(),
        ],
        'email' => [
            'type' => Type::string(),
        ],
        'movie_id' => [
            'type' => Type::string(),
        ],
        'text' => [
            'type' => Type::string(),
        ],
    ],
    'resolve' => function ($rootValue, $args) {
        db_collection("comments")->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID(get_array_value($args, '_id'))],
            [
                '$set' => [
                    'name' => get_array_value($args, 'name'),
                    'email' => get_array_value($args, 'email'),
                    'movie_id' => new MongoDB\BSON\ObjectID(get_array_value($args, 'movie_id')),
                    'text' => get_array_value($args, 'text'),
                ],
            ]
        );
        
        return true;
    }
];

$deleteCommentMutation = [
    'type' => $emptyType,
    'args' => [
        '_id' => [
            'type' => Type::string(),
        ],
    ],
    'resolve' => function ($rootValue, $args) {
        db_collection("comments")->deleteOne([
            '_id' => new MongoDB\BSON\ObjectID(get_array_value($args, '_id'))
        ]);
        
        return true;
    }
];