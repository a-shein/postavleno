<?php

declare(strict_types=1);

namespace App;

use App\Services\RedisService;
use Exception;
use Predis\Client;

class CacheDataProvider
{
    protected const REDIS = 'redis';
    protected const MEMCACHE = 'memcache';

    /**
     * @throws Exception
     */
    public function getService(string $serviceName): RedisService
    {
        $client = match (strtolower($serviceName)) {
            self::REDIS => new Client(),
//            self::MEMCACHE => //todo реализовать подключение memcache клиента,
            default => throw new \Exception("$serviceName is not available\n"),
        };

        $redisService = 'App\\Services\\' . ucfirst($serviceName) . 'Service';
        return new $redisService($client);
    }
}