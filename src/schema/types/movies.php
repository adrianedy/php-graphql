<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$awardsType = new ObjectType([
    'name' => 'Awards',
    'fields' => [
        'wins' => [
            'type' => Type::int(),
        ],
        'nominations' => [
            'type' => Type::int(),
        ],
        'text' => [
            'type' => Type::string(),
        ],
    ],
]);

$imdbType = new ObjectType([
    'name' => 'IMDB',
    'fields' => [
        'rating' => [
            'type' => Type::float(),
        ],
        'votes' => [
            'type' => Type::int(),
        ],
        'id' => [
            'type' => Type::int(),
        ],
    ],
]);

$viewerType = new ObjectType([
    'name' => 'Viewer',
    'fields' => [
        'rating' => [
            'type' => Type::float(),
        ],
        'numReviews' => [
            'type' => Type::int(),
        ],
        'meter' => [
            'type' => Type::int(),
        ],
    ],
]);

$criticType = new ObjectType([
    'name' => 'Critic',
    'fields' => [
        'rating' => [
            'type' => Type::float(),
        ],
        'numReviews' => [
            'type' => Type::int(),
        ],
        'meter' => [
            'type' => Type::int(),
        ],
    ],
]);

$tomatoesType = new ObjectType([
    'name' => 'Tomatoes',
    'fields' => [
        'viewer' => [
            'type' => $viewerType,
        ],
        'dvd' => [
            'type' => $dynamicType,
        ],
        'critic' => [
            'type' => $criticType,
        ],
        'lastUpdated' => [
            'type' => $dynamicType,
        ],
        'consensus' => [
            'type' => Type::string(),
        ],
        'rotten' => [
            'type' => Type::int(),
        ],
        'production' => [
            'type' => Type::string(),
        ],
        'fresh' => [
            'type' => Type::int(),
        ],
    ],
]);

$movieType = new ObjectType([
    'name' => 'Movie',
    'fields' => [
        '_id' => [
            'type' => $dynamicType,
        ],
        'plot' => [
            'type' => Type::string(),
        ],
        'genres' => [
            'type' => Type::listOf(Type::string()),
        ],
        'runtime' => [
            'type' => Type::int(),
        ],
        'casts' => [
            'type' => Type::listOf(Type::string()),
        ],
        'num_mflix_comments' => [
            'type' => Type::int(),
        ],
        'poster' => [
            'type' => Type::string(),
        ],
        'title' => [
            'type' => Type::string(),
        ],
        'fullplot' => [
            'type' => Type::string(),
        ],
        'countries' => [
            'type' => Type::listOf(Type::string()),
        ],
        'released' => [
            'type' => $dynamicType,
        ],
        'directors' => [
            'type' => Type::listOf(Type::string()),
        ],
        'writers' => [
            'type' => Type::listOf(Type::string()),
        ],
        'rated' => [
            'type' => Type::string(),
        ],
        'awards' => [
            'type' => $awardsType,
        ],
        'lastupdated' => [
            'type' => Type::string(),
        ],
        'year' => [
            'type' => Type::int(),
        ],
        'imdb' => [
            'type' => $imdbType,
        ],
        'type' => [
            'type' => Type::string(),
        ],
        'tomatoes' => [
            'type' => $tomatoesType,
        ],
    ],
]);

$moviesQuery = [
    'type' => Type::listOf($movieType),
    'args' => [
        'limit' => [
            'type' => Type::int(),
            'defaultValue' => 10
        ]
    ],
    'resolve' => function ($rootValue, $args) {
        return db_collection("movies")->find(
            [],
            [
                'limit' => $args['limit'],
            ]
        );
    }
];