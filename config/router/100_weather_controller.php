<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Main weather-controller",
            "mount" => "weather",
            "handler" => "\Anax\Weather\MainController",
        ],
    ]
];
