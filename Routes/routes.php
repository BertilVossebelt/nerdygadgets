<?php

namespace Routes;

class routes
{
    /*
     * Declare routes in the route variable.
     * Assign a name and a view/file.
     */
    public $routes = [
        '' => "Views/Home.php",
        'bladeren' => "Views/Browse.php",
        'categorieen' => "Views/Categories.php",
        'winkelmandje' => "Views/Cart.php",
        'account' => "Views/Account.php",
        'login' => "Views/Login.php",
        'log-uit' => "Helpers/Logout.php",
        'product' => "Views/ProductPage.php",
        'redirect' => "Interstitial/redirect.php",
        'betalen' => "Views/Payment.php",
        'betalen-gelukt' => "Views/PaymentSuccess.php",
        'verlanglijstje' => "Views/Wishlist.php",
        'wachtwoord-wijzigen' => "Views/ChangePassword.php",
        'registreer' => "Views/Register.php",
        'gegevens-wijzigen' => "Views/ChangeAccountData.php",
    ];
}