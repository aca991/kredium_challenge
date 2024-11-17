<?php

namespace App\Services;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class FlashMessageService
{
    /**
     * @return string
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getMessage(): string
    {
        if ($this->isError()) {
            return session()->get('error');
        }

        if ($this->isSuccess()) {
            return session()->get('success');
        }

        return '';
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        return $this->isError() || $this->isSuccess();
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return session()->has('error');
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return session()->has('success');
    }
}
