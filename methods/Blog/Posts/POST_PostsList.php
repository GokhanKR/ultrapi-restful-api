<?php

return new class extends \UpiCore\Controller\UpiMethod
{

    private $everyoneAccess;

    // private $inaccessible;

    public $posts = [
        [
            'title' => 'Understanding PHP Arrays',
            'author' => 'John Doe',
            'date' => '2024-06-01',
            'content' => 'PHP arrays are one of the most powerful data types in PHP. They allow you to store multiple values in a single variable.',
        ],
        [
            'title' => 'Getting Started with DirectX in C++',
            'author' => 'Jane Smith',
            'date' => '2024-06-05',
            'content' => 'DirectX is a powerful API for developing multimedia applications in C++. This guide will help you get started with setting up your development environment and creating your first project.',
        ],
        [
            'title' => 'Tips for Securing Your API Endpoints',
            'author' => 'Alice Johnson',
            'date' => '2024-06-10',
            'content' => 'Securing your API endpoints is crucial for protecting your application from malicious attacks. This post covers best practices for sanitizing inputs and preventing common vulnerabilities.',
        ],
        [
            'title' => 'Introduction to Machine Learning with Python',
            'author' => 'Robert Brown',
            'date' => '2024-06-15',
            'content' => 'Machine learning is transforming industries across the globe. This introduction covers the basics of machine learning and how to get started with Python.',
        ],
        [
            'title' => 'Creating RESTful APIs with PHP',
            'author' => 'Emily Davis',
            'date' => '2024-06-20',
            'content' => 'RESTful APIs are a popular way to design web services. This post explains how to create and manage RESTful APIs using PHP.',
        ],
    ];

    public function _beforeResult(/* \UpiCore\Router\Http\Client $client, \UpiCore\Router\RouterContext $routerContext */)
    {
    }

    public function lastPosts()
    {
        return \array_slice($this->posts, 2);
    }

    public function _toResult($limit = 10, $perPage = 10, $order = 'desc'): \UpiCore\Router\RouterContext
    {
        $posts = $this->posts;

        return $this->routerContext
            ->withStatus(200)
            ->withData($posts);
    }

    public function _afterResult(/* \UpiCore\Router\Http\Client $client, \UpiCore\Router\RouterContext $routerContext */)
    {
    }
};
