<?php

declare(strict_types=1);

namespace App\Http\Response;

use JsonSerializable;

class ApiResponse implements JsonSerializable
{
    public function __construct(
        public array $data = [],
        public int $code = 200,
        public bool $status = true
    ) {}

    public function jsonSerialize()
    {
        return json_encode((array) $this);
    }
}