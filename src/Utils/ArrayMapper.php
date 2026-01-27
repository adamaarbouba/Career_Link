<?php

namespace App\Utils;
use ReflectionClass;

class ArrayMapper
{
    public static function map(array $data, string $class): object
    {
        $ref = new ReflectionClass($class);
        $constructor = $ref->getConstructor();

        if (!$constructor) {
            return new $class();
        }

        $args = array_map(
            fn($p) => $data[$p->getName()] ?? null,
            $constructor->getParameters()
        );

        return $ref->newInstanceArgs($args);
    }
}
