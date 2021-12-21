<?php
if (!isset($_SESSION)) session_start();
function getWishlist() {
    if (isset($_SESSION['wishlist'])) {
        $wishlist = $_SESSION['wishlist'];
    } else {
        $wishlist = [];
    }
    return $wishlist;
}

function saveWishlist($wishlist) {
    $_SESSION["wishlist"] = $wishlist;
}

function addProductToWishlist($stockItemID, $sellPrice, $StockItemName, $StockItemPath) {
    $wishlist = getWishlist();
    $wishlist[$stockItemID]['SellPrice'] = $sellPrice;
    $wishlist[$stockItemID]['StockItemName'] = $StockItemName;
    $wishlist[$stockItemID]['StockItemPath'] = $StockItemPath;
    saveWishlist($wishlist);
}

function deleteFromWishlist($stockItemID) {
    $wishlist = getWishlist();
    unset($wishlist[$stockItemID]);
    saveWishlist($wishlist);
}