# Ultra Fast API Based on PHP

<p align="center">
  <img src="https://gokhankorul.dev/images/upi-logo-22062024090201.png">
</p>

## Project Description

This project, based on RESTful API architecture, is a web service developed using the RESTful (Representational State Transfer) architecture. It enables users to perform specific operations through interactions over the HTTP protocol

Ultra Fast API(UPI or Ultrapi) is built for developing self-modularity applications based on PHP. UPI aims to develop multi purpose project and particular systems.

# Key Features

- JSON and XML Support: The API can send and receive data in both JSON and XML formats, enhancing compatibility with a wide range of applications.
- Security: API endpoints are protected with authentication and authorization mechanisms.
- File based Method Architecture: Promotes modularity and maintainability for individual functionalities.

# File based Method Architecture

In the context of this API, the "File based Method Architecture" refers to a design approach where API endpoints are directly mapped to specific PHP files containing the logic for processing requests. This method ensures that each endpoint's functionality is encapsulated within its corresponding PHP file, promoting modularity and maintainability in the application architecture.

## How It Works

**Endpoint Mapping**: Each API endpoint is associated with a specific PHP file that encapsulates the logic for handling requests to that endpoint.

**Execution Flow**: When a request is made to an API endpoint, the API server routes the request to the corresponding PHP file based on the endpoint configuration.

**Class Instantiation**: Within the PHP file, the endpoint's functionality is typically implemented by instantiating a specific class or executing predefined functions tailored to handle the request.

**Isolation and Security**: By isolating each endpoint's logic into separate PHP files, the architecture enhances security by limiting the scope of execution and minimizing the potential impact of errors or vulnerabilities.

## Benefits

**Modularity**: Each endpoint's logic is encapsulated in a single PHP file, facilitating easier maintenance and updates.

**Clear Separation**: Enhances code organization by separating concerns between different API endpoints.

**Flexibility**: Allows for customization and extension of endpoint functionality without impacting other parts of the application.

# Project Goals

- Flexibility: The project is designed to be flexible enough to integrate with various platforms.
- Performance: Achieving high performance and fast response times.
- User Experience: Providing a user-friendly experience and continuously improving based on user feedback.

# Conclusion

This project is developed to enhance modularity in the project development process and to ensure that distributed systems are more flexible and manageable by adopting a microservices architecture.

# Basic Documentation

## Request Handling

When making a request, the request must include the `requestMethod` field. This field references the file path of the corresponding method within the API. Example request content:

```json
// POST request
{
    "data": {
        "postId": 1,
        "requestMethod": "Blog/Posts/PostDetail"
    },
}
```

The API file system under the `methods/` directory appears as follows:

```bash
config/
bootstrap/
methods/
├── Blog/
│   ├── Posts/
│   │   ├── POST_PostDetail.php
│   │   └── POST_PostsList.php
│   └── ... 
└── ... 
index.php
```

An important aspect to note is that the target file is indicated based on the request method (POST, GET, DELETE, etc.). If the request had been made using GET, the file name would need to be `GET_PostDetail.php`. Typically, a method looks like this:

```php

return new class extends \UpiCore\Controller\UpiMethod
{

    public function _toResult(int $postId, string $anotherParam = '99'): \UpiCore\Router\RouterContext
    {
        if (!\in_array($postId, [1, 2, 3])) {
            throw new UpiException('POSTS_DETAIL_NOT_FOUND');
        }

        $postDetail = [...];

        return $this->routerContext
            ->withStatus(200)
            ->withData([
                'post' => $postDetail,
                'lastPosts' => $this->lastPosts
            ]);
    }
};

```

## Method Handling

When a request is made to a method, certain access parameters within the method first check for access permissions. Next, it checks whether the `_toResult` method is defined within the method.

```php
// Access control within methods

// makes the method accessible to everyone, no client authorization required
private $everyoneAccess;

// makes the method inaccessible to everyone even with authorization
private $inaccessible;
```

Finally, it verifies whether the request parameters match the parameters required by `_toResult`, and the method output is returned to the client.

```php
public function _toResult(int $postId, string $anotherParam = '99')
```

The parameters required by the method must be sent by the client in the specified types; otherwise, an error will be returned.

```json
// POST Request
{
	"data": {
		"postId": "1", // postId should be integer but sent as string
		"requestMethod": "Blog/Posts/PostDetail"
	},
	"language": "en-US"
}

// Output:
{
	"status": 500,
	"message": "Please provide parameters in the required type (postId:[int])",
	"data": null
}
```

## Configs

UPI provides configuration management. These files are located under the `config/` directory. With the configuration system, you can manage settings globally throughout the project.

```php
$info = Ultrapi\Config\Config::get('Info')
```

**Output:**
```php
// HTTP Response with Content-Type: JSON
Array ( 
    'API_NAME' => 'Ultra Fast API - RESTful API',
    'API_VERSION' => '1.0.3'
);
```

Additionally, it offers static storage that can be used across different files during runtime as needed.

```php
// set static configuration from anywhere
\UpiCore\Config\Config::set('requestedOnPosts', true);

// set static configuration as a callback from anywhere
\UpiCore\Config\Config::set('XYZMethodRequested', function() {
   /* ... */
});

// then use it in another method
...
    public function _toResult(...$args): \UpiCore\Router\RouterContext
    {
        if ($XYZMethodCallback = \UpiCore\Config\Config::get('XYZMethodRequested')) {
            $XYZMethodCallback();
            ...
        }
    }
```

## Localization

Manage text fields of the project from a single center using the localization management system.

```php
\UpiCore\Localization\Language::getText('TODOLIST_NEW_TASK_ADDED'); // A new task was added

// Using as HTTP Message
$msg = \UpiCore\Localization\Language::createHttpMessage('TODOLIST_NEW_TASK_ADDED');

$msg->getStatus(); // 200
$msg->getMessage(); // A new task was added
```

## Exceptions

UPI handles error management using PHP-based exception handling. If you want to output an error outside the API, you should throw the error directly without using any try-catch block.

```php
// an example usage
public function _toResult(...$args): \UpiCore\Router\RouterContext
{
    if (empty($itemList))
        throw new \UpiCore\Exception\UpiException('TODOLIST_ITEM_NOT_FOUND');

    return ...
}
```

**Output:**
```json
// HTTP Response with Content-Type: JSON
{
    "status": "404",
    "data": {
       "errMessage": "Item not found."
    }
}
```