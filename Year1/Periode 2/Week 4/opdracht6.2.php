<html>
    <body>
        <?php
        session_start();

        $_SESSION["here"] = true;
        $_SESSION["times"] += 1;
        setcookie("times", 0, time() + 3600);

        if ($_SESSION["here"] == true) {
            echo "Deze pagina heb je al: " . $_SESSION["times"] . " keer bekeken voordat de internet browser is afgesloten.";
            echo "<br>";

            setcookie("times", $_COOKIE["times"] + 1, time() + 3600);
            echo "In totaal heb je deze pagina al: " . $_COOKIE["times"] . " keer bekeken."; 
            $_SESSION["here"] = false;
        }
        ?>
    </body>
</html>