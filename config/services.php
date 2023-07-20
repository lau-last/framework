<?php

use Core\Render\PHPRender;

return [
    PHPRender::class => function () {
        return new PHPRender();
    },
];

