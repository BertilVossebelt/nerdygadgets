<?php
if(!isset($_SESSION)) session_start();          // altijd hiermee starten als je gebruik wilt maken van sessiegegevens

function getCart(){
    if(isset($_SESSION['cart'])){               //controleren of winkelmandje (=cart) al bestaat
        $cart = $_SESSION['cart'];                  //zo ja:  ophalen
    } else{
        $cart = [];                            //zo nee: dan een nieuwe (nog lege) array
    }
    return $cart;                               // resulterend winkelmandje terug naar aanroeper functie
}

function saveCart($cart){
    $_SESSION["cart"] = $cart;                  // werk de "gedeelde" $_SESSION["cart"] bij met de meegestuurde gegevens
}

function addProductToCart($stockItemID, $sellPrice, $StockItemName, $StockItemPath){
    $cart = getCart();                          // eerst de huidige cart ophalen
    if(array_key_exists($stockItemID, $cart)) {  //controleren of $stockItemID(=key!) al in array staat
        $cart[$stockItemID]['amount'] += 1;                   //zo ja:  aantal met 1 verhogen
    }else{
        $cart[$stockItemID]['amount'] = 1;                    //zo nee: key toevoegen en aantal op 1 zetten.
        $cart[$stockItemID]['price'] = $sellPrice;                    //zo nee: key toevoegen en aantal op 1 zetten.
        $cart[$stockItemID]['StockItemName'] = $StockItemName;//zo nee: key toevoegen en aantal op 1 zetten.
        $cart[$stockItemID]['StockItemPath'] = $StockItemPath;//zo nee: key toevoegen en aantal op 1 zetten.
    }

    saveCart($cart);                            // werk de "gedeelde" $_SESSION["cart"] bij met de bijgewerkte cart
}

function adjustCartAmount($amount, $stockItemID){
    $cart = getCart();
    $cart[$stockItemID]['amount'] = $amount;
    saveCart($cart);
}