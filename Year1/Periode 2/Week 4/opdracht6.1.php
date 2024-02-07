<html>
    <body>
        <?php
        session_start();

        $_SESSION["here"] = true;
        $_SESSION["times"] += 1;

        if ($_SESSION["here"] == true) {
            echo "Deze pagina heb je al: " . $_SESSION["times"] . " keer bekeken voordat je de internet browser hebt afgesloten.";
            $_SESSION["here"] = false;
        }
        ?>
    </body>
</html>