# Mollie instructies

Om de mollie integratie werkend te maken moeten er een aantal stappen doorlopen worden:

1. [Installeer composer](https://getcomposer.org/download/)
2. Installeer de [Mollie API client](https://github.com/mollie/mollie-api-php) voor php met `composer require mollie/mollie-api-php:^2.0`
in de terminal (in phpstorm het in nerdygadgets project).
3. [Installeer Chocolatey](https://chocolatey.org/install) met powershell.
4. Installeer ngrok met `choco install ngrok`.
5. Maak een account aan op [ngrok.com](https://ngrok.com/).
6. Zoek je auth-token op van je ngrok account en voeg het toe 
met `ngrok authtoken <token>` (in windows CMD).
7. Start ngrok op met `ngrok http 80` (in windows CMD).

Enviroment configuratie (zie env.example.php voor extra toevoegingen):
8. Zet `APP_DOMAIN` (uit env.php) op de url die door ngrok gegenereerd is.
9. Zet `APP_FOLDER` op de naam van je project folder.
10. Voeg een `MOLLIE_TEST_KEY` toe.