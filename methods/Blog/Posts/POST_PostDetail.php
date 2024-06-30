<?php

use UpiCore\Controller\MethodManager;
use UpiCore\Exception\UpiException;

return new class extends \UpiCore\Controller\UpiMethod
{

    private $everyoneAccess;

    // private $inaccessible;

    public $lastPosts = null;

    public function _register(#[MethodManager('Blog/Posts/POST_PostsList')] $lastPosts)
    {
        $this->lastPosts = $lastPosts->lastPosts();
    }

    public function _beforeResult(/* \UpiCore\Router\Http\Client $client, \UpiCore\Router\RouterContext $routerContext */)
    {
    }

    public function _toResult(int $postId, string $anotherParam = '99'): \UpiCore\Router\RouterContext
    {
        if (!\in_array($postId, [1, 2, 3])) {
            throw new UpiException('POSTS_DETAIL_NOT_FOUND');
        }

        $postDetail = [
            'title' => 'Understanding PHP Arrays',
            'author' => 'John Doe',
            'date' => '2024-06-01',
            'content' => 'PHP arrays are one of the most powerful data types in PHP. They allow you to store multiple values in a single variable.',
        ];

        return $this->routerContext
            ->withStatus(200)
            ->withData([
                'post' => $postDetail,
                'lastPosts' => $this->lastPosts
            ]);
    }

    public function _afterResult(/* \UpiCore\Router\Http\Client $client, \UpiCore\Router\RouterContext $routerContext */)
    {
    }
};
