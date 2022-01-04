<?php

namespace Routes;

include "routes.php";
use Exception;

class router extends routes
{
    /**
     * Set up the router.
     * It finds the current URL and finds the corresponding page
     * @throws Exception
     */
    public function router($variables)
    {
        // Get folder part from URL for error handling
        $namespace = strtok($_SERVER['REQUEST_URI'], '/');

        // Split location from folder and params
        $removedParamsUrl = strtok($_SERVER['REQUEST_URI'], "?");
        $needle = "/".env("APP_FOLDER")."/";
        $url = str_replace($needle, "", $removedParamsUrl);

        // Check for errors before returning file
        $this->errorHandling($namespace, $url);

        return $this->includeFile($url, $variables);
    }

    /**
     * Check for possible errors
     * @throws Exception
     */
    private function errorHandling($namespace, $url) {
        // Either APP_FOLDER or the URL is incorrect
        if($namespace !== env("APP_FOLDER")) {
            throw new Exception("[/$namespace/] is incorrect: perhaps env.php is configured incorrectly");
        }

        // The route was not defined in routes.php
        if(!isset($this->routes[$url])) {
            throw new Exception("The route [/$url] doesn't exist in routes.php");
        }
    }

    /**
     * Function is used to include a file with variables.
     * Is returned in setup to index.js
     */
    function includeFile($url, $variables)
    {
        extract($variables);
        include($this->routes[$url]);
    }
}