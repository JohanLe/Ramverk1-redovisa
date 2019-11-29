<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "API for ip-verify v2",
            "mount" => "api-geo",
            "handler" => "\Anax\Verify_v2\ApiController",
        ],
    ]
];
