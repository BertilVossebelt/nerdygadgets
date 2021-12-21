<?php

/**
 * @param $record
 */
function extractedAccountData($record)
{
    $_SESSION['email'] = $record['email'];
    $_SESSION['klantnummer'] = $record['klantnummer'];
    $_SESSION['voornaam'] = $record['voornaam'];
    $_SESSION['tussenvoegsel'] = $record['tussenvoegsel'];
    $_SESSION['achternaam'] = $record['achternaam'];
    $_SESSION['postcode'] = $record['postcode'];
    $_SESSION['huisnummer'] = $record['huisnummer'];
    $_SESSION['toevoeging'] = $record['toevoeging'];
    $_SESSION['woonplaats'] = $record['woonplaats'];
}