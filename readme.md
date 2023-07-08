# API Endpoint Documentation

## Introduction
This documentation provides an overview of the API endpoint located at `http://127.0.0.1:5000/`. The endpoint accepts query parameters to filter and paginate data. The supported query parameters are `author_name`, `limit`, and `offset`.

## Starting the PHP Server

To use this API endpoint, you can start a PHP server locally by following these steps:

1. Open a terminal or command prompt.
2. Navigate to the directory where your PHP files are located.
3. Run the following command to start the PHP server:
   ```
   php -S 127.0.0.1:5000
   ```
4. The PHP server will start, and you can now make requests to `http://127.0.0.1:5000/` using the provided query parameters.

Ensure that you have PHP installed on your machine and the `php` command is accessible from the command line.

## Endpoint Information

- **Endpoint URL:** `http://127.0.0.1:5000/`
- **Supported HTTP Methods:** GET

## Query Parameters

The API endpoint supports the following query parameters:

### `author_name`
- **Type:** String
- **Description:** Specifies the name of the author to filter the data.
- **Example:** `author_name=D.%20D.%20Angeles`

### `limit`
- **Type:** Integer
- **Description:** Specifies the maximum number of results to return.
- **Example:** `limit=5`

### `offset`
- **Type:** Integer
- **Description:** Specifies the number of results to skip before starting to return data.
- **Example:** `offset=2`

## Response

The API endpoint returns a JSON response containing the requested data based on the provided query parameters. The structure of the response may vary depending on the specific implementation of the API. However, the response should adhere to the following guidelines:

### Success Response
- **HTTP Status Code:** 200 OK
- **Example Response Body:**
```
{
    {
    "0": {
    "title": "Manalive"
    },
    "1": {
    "title": "ORLANDO a Biography"
    },
    "2": {
    "title": "Trumpet-Major"
    },
    "3": {
    "title": "Under the Greenwood Tree"
    },
    "4": {
    "title": "Well-Beloved"
    },
    "5": {
    "title": "When the Sleeper Awakes"
    },
    "6": {
    "title": "Passionate Friends"
    },
    "7": {
    "title": "Jill the Reckless"
    },
    "8": {
    "title": "Brothers Karamazov"
    },
    "9": {
    "title": "Old Curiosity Shop"
    },
    "pagination": {
    "offset": 1,
    "limit": 10,
    "self": "127.0.0.1:5000/book.php?author_name=D. D. Angeles&limit=10&offset=1",
    "next": "127.0.0.1:5000/book.php?author_name=D. D. Angeles&limit=10&offset=11",
    "previous": "127.0.0.1:5000/book.php?author_name=D. D. Angeles&limit=10&offset=-9"
    }
}
```

- **Explanation:**
    - The `data` field contains an array of articles that match the provided `author_name` parameter. The number of articles returned depends on the `limit` parameter, and the starting point is determined by the `offset` parameter.
    - Each article object within the `data` array includes an `id`, `title`, and `author` field.
    - The `total_count` field represents the total number of articles available that match the provided `author_name` parameter.

### Error Response
- **HTTP Status Code:** 400 Bad Request
- **Example Response Body:**
```
{
    "error": "Invalid parameters"
}
```
- **Explanation:** This response indicates that the provided query parameters are invalid or missing. The specific error message may vary depending on the API implementation.

## Usage Example

To retrieve a list of articles by author name "D. D. Angeles," limiting the response to 5 articles and starting from the third article, you can make a GET request to the following URL:
```
http://127.0.0.1:5000/?author_name=D.%20D.%20Angeles&limit=5&offset=2
```
Ensure to properly URL encode the author name value to `%20` for spaces.

The server will respond with a JSON object containing the requested articles, as explained in the success response example.



## Conclusion

This API endpoint allows you to retrieve a paginated list of articles by author name, providing flexibility in filtering and pagination using the `author_name`, `limit`, and `offset` query parameters. Ensure to refer to this documentation to correctly interact with the API endpoint and handle the responses accordingly.
