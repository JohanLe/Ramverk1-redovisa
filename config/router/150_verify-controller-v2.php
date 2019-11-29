<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "VerifyController v2",
            "mount" => "verify_geo",
            "handler" => "\Anax\Verify_v2\VerifyController",
        ],
    ]
];
