<!-- de inhoud van dit bestand wordt onderaan elke pagina geplaatst -->

</div>
</div>
<div class="footer">
    <div>
        <?php
        if (empty($_SESSION['ip'])) {
        ?>
        <h3>Met hoeveel sterren beoordeeld u ons?</h3>
        <form class="rating">
            <input type="radio" id="star5" name="rate" value="5" onchange="this.form.submit()"/>
            <label for="star5" title="text">5 ster</label>
            <input type="radio" id="star4" name="rate" value="4" onchange="this.form.submit()"/>
            <label for="star4" title="text">4 ster</label>
            <input type="radio" id="star3" name="rate" value="3" onchange="this.form.submit()"/>
            <label for="star3" title="text">3 ster</label>
            <input type="radio" id="star2" name="rate" value="2" onchange="this.form.submit()"/>
            <label for="star2" title="text">2 ster</label>
            <input type="radio" id="star1" name="rate" value="1" onchange="this.form.submit()"/>
            <label for="star1" title="text">1 ster</label>
        </form>
    </div>
    <?php
    if (isset($_GET['rate'])) {
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
</body>
</html>