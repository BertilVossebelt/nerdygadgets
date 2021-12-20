<!-- de inhoud van dit bestand wordt onderaan elke pagina geplaatst -->
<div style='left: 0; bottom: 0; width: 100%; color: black; text-align: center'>

    <?php

    if(!empty($_SESSION['ip'])){
        $ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['ip'] = $ip;

    ?>

    <body>
    <div>
        <h2>Met hoeveel sterren beoordeeld u ons?</h2>
        <form>
            <label>
                <input type="radio" id='1' name="rate">1 Ster
            </label>
            <label>
                <input type="radio" id='2' name="rate">2 Sterren
            </label>
            <label>
                <input type="radio" id='3' name="rate">3 Sterren
            </label>
            <label>
                <input type="radio" id='4' name="rate">4 Sterren
            </label>
            <label>
                <input type="radio" id='5' name="rate">5 Sterren
            </label>
            <input type="submit" name="send" value="Verstuur">
        </form>
    </div>
    </body>
        <?php
    }
            elseif (isset($_GET['send'])) {
                if (isset($_GET['rate'])) {
                    $_SESSION['rate'] = $_GET['rate'];
                }
            }
    var_dump($_SESSION['rate']);

/*

                $sql = "SELECT aantal FROM rating";

                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
                $ReturnableResult = mysqli_stmt_get_result($Statement);

                if (mysqli_num_rows($ReturnableResult) == 1) {
                    $record = mysqli_fetch_assoc($ReturnableResult);

                    $_SESSION['aantal'] = $record['aantal'];
                    $_SESSION['aantal'] = $_SESSION['aantal'] + 1;
                }
                $sql = "SELECT rating from rating";

                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
                $ReturnableResult = mysqli_stmt_get_result($Statement);

                if (mysqli_num_rows($ReturnableResult) == 1) {
                    $record = mysqli_fetch_assoc($ReturnableResult);

                    $_SESSION['rating'] = $record['rating'];
                    $_SESSION['rating'] = $_SESSION['rating'] + $_SESSION['rate'] / $_SESSION['aantal'];
            }
                $rating = $_SESSION['rating'];
                $aantal = $_SESSION['aantal'];

                $sql = "INSERT INTO rating VALUES('$rating', '$aantal')";
                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
            }
    $rating = $_SESSION['rating'];
    $aantal = $_SESSION['aantal'];
    $rate = $_SESSION['rate'];
    var_dump($rating, $aantal, $rate);
*/
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>