<?php

declare(strict_types=1);

namespace App\Foundation\Secrets;

use SensitiveParameterValue;

use function env;
use function file_exists;
use function file_get_contents;
use function is_string;
use function str_starts_with;

class DockerSecret
{
    private const PREFIX = '/run/secrets/';

    public static function fromEnv(string $env): SensitiveParameterValue
    {
        $value = env($env);

        if (is_string($value) && str_starts_with($value, self::PREFIX) && file_exists($value)) {
            return new SensitiveParameterValue(
                file_get_contents($value)
            );
        }

        return new SensitiveParameterValue($value);
    }
}
