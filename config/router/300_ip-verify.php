<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Style chooser.",
            "mount" => "verify",
            "handler" => "\Anax\IpVerify\IpVerifyController",
        ],
    ]
];
