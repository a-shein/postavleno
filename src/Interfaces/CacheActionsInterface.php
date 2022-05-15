<?php

declare(strict_types=1);

namespace App\Interfaces;

interface CacheActionsInterface
{
    public const ADD = 'add';
    public const DELETE = 'delete';

    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function add(string $key, string $value): string;

    /**
     * @param string $key
     * @return string
     */
    public function delete(string $key): string;
}