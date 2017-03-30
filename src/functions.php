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

function convertCamelCase(string $str, string $separator = '_')
{
    return preg_replace_callback(
        '/[A-Z]/',
        function ($match) use ($separator) {
            return $separator.strtolower($match[0]);
        },
        $str
    );
}

function convertSnakeCase(string $str)
{
    return str_replace(' ','', ucwords(str_replace('_', ' ', $str)));
}
