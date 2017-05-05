<?php
declare(strict_types=1);

namespace MerchantSafeUnipay;

function filter(array $filterKeys, array $arrayData)
{
    $filteredData = [];
    foreach ($arrayData as $key => $value) {
        if (in_array($key, $filterKeys, true)) {
            $filteredData[$key] = $value;
        }
    }
    return $filteredData;
}

function convertCamelCase(string $str, string $separator = '_') : string
{
    return trim(preg_replace_callback(
        '/[A-Z]/',
        function ($match) use ($separator) {
            return $separator.strtolower($match[0]);
        },
        $str
    ), $separator);
}

function convertSnakeCase(string $str, $type = 'ucwords') :string
{
    if ($type === 'ucwords') {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $str))));
}
