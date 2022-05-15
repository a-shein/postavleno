<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\CacheActionsInterface;
use Predis\Client;

class RedisService implements CacheActionsInterface
{
    public function __construct(private Client $redis)
    {
    }

    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function add(string $key, string $value): string
    {
        if ($this->redis->get($key)) {
            return "Переданный ключ: $key уже есть в хранилище, его значение будет изменено на: $value\n";
        }

        $this->redis->set($key, $value);
        $this->redis->expire($key, 3600);
        return "Добавлен ключ: $key со значением $value\n";
    }

    /**
     * @param string $key
     * @return string
     */
    public function delete(string $key): string
    {
        if (!$this->redis->get($key)) {
            return "Переданный ключ: $key отсутсвует в кэше\n";
        }

        $this->redis->del($key);
        return "Удален ключ $key\n";
    }

    /**
     * @return array
     */
    public function getKeys(): array
    {
        return $this->redis->keys('*');
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getByKey(string $key): ?string
    {
        return $this->redis->get($key);
    }
}