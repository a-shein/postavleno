<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Http\Response\ApiResponse;
use App\Services\RedisService;
use Predis\Client;

class RedisController
{
    protected RedisService $redisService;

    public function __construct()
    {
        $this->redisService = new RedisService(new Client());
    }

    public function get(): ApiResponse
    {
        $keys = $this->redisService->getKeys();
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->redisService->getByKey($key);
        }

        return new ApiResponse($data);
    }

    public function delete(string $key): ApiResponse
    {
        $this->redisService->delete($key);
        return new ApiResponse();
    }
}