<?php
require 'src/helper.php';

if (!isset($_GET['author_name']) or $_GET['author_name']=='' ){
    //response invalid parameter
    $response = [
        'status' => '400',
        'message' => 'Invalid parameter, `author_name` is required',
    ];
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($response);
    exit();
}

$author_name =  $_GET['author_name'];
$limit =isset($_GET['limit']) ? $_GET['limit'] : '10';
$offset = isset($_GET['offset']) ? $_GET['offset'] : '1' ;


$author_key = getAuthorKey($author_name);
$works  = getAuthorWorks($author_key, $limit, $offset, $author_name);


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('HTTP/1.1 200 OK');

echo $works;


