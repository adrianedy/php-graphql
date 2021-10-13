<?php

post('/' , 'src/controllers/graphql.php');

http_response_code(404);
echo json_encode(['message' => 'Not Found!']);