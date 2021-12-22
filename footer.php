<!-- de inhoud van dit bestand wordt onderaan elke pagina geplaatst -->

<?php
if ($_SESSION['ip']) {
?>

<div class="footer">

    <body>
    <div>
        <h2>Met hoeveel sterren beoordeeld u ons?</h2>
        <form>
            <label>
                <input type="radio" value="1" name="rate">1 Ster
            </label>
            <label>
                <input type="radio" value="2" name="rate">2 Sterren
            </label>
            <label>
                <input type="radio" value="3" name="rate">3 Sterren
            </label>
            <label>
                <input type="radio" value="4" name="rate">4 Sterren
            </label>
            <label>
                <input type="radio" value="5" name="rate">5 Sterren
            </label>
            <input type="submit" name="send" value="Verstuur">
        </form>
    </div>
    </body>
        <?php
            if (isset($_GET['send'])) {
                    $_SESSION['rate'] = $_GET['rate'];

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
                        $_SESSION['rating'] = $_SESSION['rating'] + $_SESSION['rate'];
                    }
                    $rating = $_SESSION['rating'];
                    $aantal = $_SESSION['aantal'];

                    $sql = "UPDATE rating SET rating='$rating', aantal='$aantal'";
                    $Statement = mysqli_prepare($databaseConnection, $sql);
                    mysqli_stmt_execute($Statement);

                    $ip = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['ip'] = $ip;
                }
            }
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>