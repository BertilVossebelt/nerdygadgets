<?php

namespace Routes;

use Exception;

class router
{
    /*
     * Declare routes in the private route variable.
     * Assign a name and a view/file.
     */
    private $routes = [
        '' => "Views/Home.php",
        'bladeren' => "Views/Browse.php",
        'categorieen' => "Views/Categories.php",
        'winkelmandje' => "Views/Cart.php",
        'account' => "Views/Account.php",
        'login' => "Views/Login.php",
        'product' => "Views/ProductPage.php",
        'redirect' => "redirect.php",
        'betalen' => "Views/Payment.php",
        'betalen-gelukt' => "Views/PaymentSuccess.php",
        'verlanglijstje' => "Views/Wishlist.php",
        'wachtwoord-wijzigen' => "Views/ChangePassword.php",
    ];

    /**
     * @throws Exception
     */
    public function setup($variables)
    {
        $namespace = strtok($_SERVER['REQUEST_URI'], '/');
        if($namespace !== env("APP_FOLDER")) {
            throw new Exception("[/$namespace/] is incorrect: perhaps env.php is configured incorrectly");
        }

        $removedParamsUrl = strtok($_SERVER['REQUEST_URI'], "?");
        $needle = "/".env("APP_FOLDER")."/";
        $url = str_replace($needle, "", $removedParamsUrl);

        if(!isset($this->routes[$url])) {
            throw new Exception("The route [/$url] doesn't exist.");
        }

        return $this->includeFile($url, $variables);
    }

    function includeFile($url, $variables)
    {
        extract($variables);
        include($this->routes[$url]);
    }
}