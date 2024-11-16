<?php

namespace App\Services;

class FlashMessageService
{
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

    public function hasMessage(): bool
    {
        return $this->isError() || $this->isSuccess();
    }

    public function isError(): bool
    {
        return session()->has('error');
    }

    public function isSuccess(): bool
    {
        return session()->has('success');
    }
}
