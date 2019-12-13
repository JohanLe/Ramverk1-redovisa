<?php
/**
 * Configuration file for validate service.
 */
return [
    // Services to add to the container.
    "services" => [
        "validate" => [
            "shared" => true,
            "callback" => function () {
                $val = new \Anax\Validate\Validate();
                return $val;
            }
        ],
    ],
];
