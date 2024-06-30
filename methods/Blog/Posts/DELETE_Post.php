<?php

use UpiCore\Exception\UpiException;

return new class extends \UpiCore\Controller\UpiMethod
{

    public function _toResult(int $postId): \UpiCore\Router\RouterContext
    {
        if (!\in_array($postId, [1, 2, 3])) {
            throw new UpiException('POSTS_DETAIL_NOT_FOUND');
        }

        $msg = \UpiCore\Localization\Language::createHttpMessage('POSTS_DETAIL_DELETED');

        return $this->routerContext
            ->withStatus($msg->getStatus())
            ->withMessage($msg->getMessage());
    }
};
