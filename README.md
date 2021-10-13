# PHP GraphQL

Simple vanilla [PHP](https://www.php.net/) CRUD application with [mongoDB](https://www.mongodb.com/) database with its [mflix](https://github.com/neelabalan/mongodb-sample-dataset/tree/main/sample_mflix) dataset that I use for my thesis about benchmarking [REST API](https://restfulapi.net/) and [GraphQL](https://graphql.org/).

## Installation

Use the package manager [composer](https://getcomposer.org/) to install the required package.

```bash
composer install
```

## Usage

To run the query and mutation send a JSON POST request to the server. Below are sample queries for existing GraphQL query and mutation in this application.

### Movies Query

```json
{
	"query": "{ movies (limit: 1) { _id, plot, genres, runtime, casts, num_mflix_comments, title, fullplot, countries, released, directors, writers, rated, awards { wins, nominations, text }, lastupdated, year, imdb { rating, votes, id }, type, tomatoes { viewer { rating, numReviews, meter }, dvd, critic { rating, numReviews, meter } lastUpdated, rotten, production, fresh } } }" 
}
```

### Create Comment Mutation

```json
{
	"query": "mutation { createComment (name: \"John Doe\", email: \"johndoe@gmail.com\", movie_id: \"573a1390f29313caabcd418c\", text: \"Test\") }" 
}
```

### Update Comment Mutation

```json
{
	"query": "mutation { updateComment (_id: \"61587274f17300008f003857\", name: \"John Doe 2\", email: \"johndoe2@gmail.com\", movie_id: \"573a1390f29313caabcd418c\", text: \"Test 2\") }" 
}
```

### Delete Comment Mutation

```json
{
	"query": "mutation { deleteComment (_id: \"615872288270000002002917\") }" 
}
```

## Related Repository

Below is another repository used for my thesis.

* [PHP REST](https://github.com/adrianedy/php-rest)
* [Go REST](https://github.com/adrianedy/go-rest)
* [Go GraphQL](https://github.com/adrianedy/go-graphql)