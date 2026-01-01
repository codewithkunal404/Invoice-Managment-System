<?php

namespace App\Helpers;

use App\Models\SquareConfiguration;

class SquareHelper
{
    /**
     * Set or update Square configuration
     *
     * @param array $data
     * @return SquareConfiguration
     */
    public static function set(array $data)
    {
        $config = SquareConfiguration::updateOrCreate(
            ['merchant_name' => 'square'],
            ['config' => $data]
        );

        return $config;
    }

    /**
     * Get configuration value by key
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key = null, $default = null)
    {
        $config = SquareConfiguration::where('merchant_name', 'square')->first();

        if (!$config) return $default;

        if ($key) {
            return $config->config[$key] ?? $default;
        }

        return $config->config;
    }
}
