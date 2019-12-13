<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Api weather-controller",
            "mount" => "api-weather",
            "handler" => "\Anax\Weather\ApiController",
        ],
    ]
];
