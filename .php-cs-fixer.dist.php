<?php

declare(strict_types=1);

use function Bytic\Phpqa\PhpCsFixer\config;
use function Bytic\Phpqa\PhpCsFixer\finder;

return config(
    finder([
        __DIR__ . '/examples',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
);
