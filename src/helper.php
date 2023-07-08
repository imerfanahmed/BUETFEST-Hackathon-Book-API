<?php
require 'vendor/autoload.php';

function getAuthorKey(string $author_name) : string {
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'http://openlibrary.org/search/authors.json?q=' . $author_name);
    $json = $res->getBody();
    return json_decode($json)->docs[0]->key;
}

function getAuthorWorks(string $author_key, int $limit, int $offset ,string $author_name) : string {
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://openlibrary.org/authors/' . $author_key . '/works.json?offset=' . $offset . '&limit=' . $limit);
    $json = $res->getBody();
    $works = json_decode($json);
    $works = array_map(function ($works) {
        return [
            'title' => $works->title,
        ];
    }, $works->entries);

    $server_name = $_SERVER['HTTP_HOST'];

    $works['pagination'] = [
        'offset' => $offset,
        'limit' => $limit,
        'self' => $server_name.'/book.php?author_name=' . $author_name . '&limit=' . $limit . '&offset=' . $offset,
        'next' => $server_name.'/book.php?author_name=' . $author_name . '&limit=' . $limit . '&offset=' . ($offset + $limit),
        'previous' => $server_name.'/book.php?author_name=' . $author_name . '&limit=' . $limit . '&offset=' . ($offset - $limit),
    ];

    return json_encode($works);
}
