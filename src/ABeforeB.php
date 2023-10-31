<?php
declare(strict_types=1);

namespace App;

class ABeforeB
{
    public static function check(string $S): bool
    {
        $isBFound = false;
        for ($i = 0; $i < strlen($S); $i++) {
            if ($S[$i] === 'b') {
                $isBFound = true;
            }
            if ($isBFound && $S[$i] === 'a') {
                return false;
            }
        }
        return true;
    }
}
