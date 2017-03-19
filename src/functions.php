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
