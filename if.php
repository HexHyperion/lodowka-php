<html>
    <head>
        <title>GET, POST, if/else</title>
        <style>
            * {
                font-family: 'Courier', monospace;
                font-weight: 600;
            }
            body {
                background-color: black;
                color: white;
                height: 100vh;
            }
            input, select {
                background-color: black;
                color: white;
                border: 2px solid white;
                padding: 5px;
                border-radius: 5px;
            }
            h1 {
                text-align: center;
                margin-bottom: 10px;
                margin-top: 15px;
            }
            h2 {
                margin-top: 15px;
                margin-bottom: 5px;
            }
            p {
                margin-top: 0;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Formularze i instrukcja warunkowa</h1>
        <table width="100%">
            <tr>
                <td>
                    <h2>1</h2>
                    <form method="POST">
                        <input name="inp">
                        <input type="submit" value="OK">
                    </form>
                    Wpisano:
                    <?php
                        if (isset($_POST['inp'])) {
                            echo $_POST['inp'];
                        }
                    ?>
                </td>
                <td>
                    <h2>2</h2>
                    <form method="POST" action="if-wiek.php">
                        <p>Ile masz lat?</p>
                        <input name="wiek">
                        <input type="submit" value="OK">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>3</h2>
                    <form method="GET">
                        <p>Czy lubisz zimę?</p>
                        <select name="zima">
                            <option value="t">TAK
                            <option value="n">NIE
                        </select>
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_GET['zima'])) {
                            if ($_GET['zima'] == 't') {
                                echo "To tak jak ja!";
                            } elseif ($_GET['zima'] == 'n') {
                                echo "Szkoda :/";
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>4a</h2>
                    <form method="GET">
                        <input size="5" name="lGet">
                        <select name="znakGet">
                            <option value="<"><
                            <option value="<="><=
                            <option value="=">=
                            <option value=">">>
                            <option value=">=">>=
                        </select>
                        <input name="pGet" size="5">?
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_GET['lGet']) && isset($_GET['znakGet']) && isset($_GET['pGet'])) {
                            if ($_GET['znakGet'] == '<') {
                                echo ($_GET['lGet'] < $_GET['pGet']) ? "TAK" : "NIE";
                            }
                            elseif ($_GET['znakGet'] == '<=') {
                                echo ($_GET['lGet'] <= $_GET['pGet']) ? "TAK" : "NIE";
                            }
                            elseif ($_GET['znakGet'] == '=') {
                                echo ($_GET['lGet'] == $_GET['pGet']) ? "TAK" : "NIE";
                            }
                            elseif ($_GET['znakGet'] == '>') {
                                echo ($_GET['lGet'] > $_GET['pGet']) ? "TAK" : "NIE";
                            }
                            elseif ($_GET['znakGet'] == '>=') {
                                echo ($_GET['lGet'] >= $_GET['pGet']) ? "TAK" : "NIE";
                            }
                        }
                    ?>
                </td>
                <td>
                    <h2>4b</h2>
                    <form method="POST">
                        <input size="5" name="lPost">
                        <select name="znakPost">
                            <option value="<"><
                            <option value="<="><=
                            <option value="=">=
                            <option value=">">>
                            <option value=">=">>=
                        </select>
                        <input name="pPost" size="5">?
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['lPost']) && isset($_POST['znakPost']) && isset($_POST['pPost'])) {
                            switch ($_POST['znakPost']) {
                                case '<':
                                    echo ($_POST['lPost'] < $_POST['pPost']) ? "TAK" : "NIE";
                                    break;
                                case '<=':
                                    echo ($_POST['lPost'] <= $_POST['pPost']) ? "TAK" : "NIE";
                                    break;
                                case '=':
                                    echo ($_POST['lPost'] == $_POST['pPost']) ? "TAK" : "NIE";
                                    break;
                                case '>':
                                    echo ($_POST['lPost'] > $_POST['pPost']) ? "TAK" : "NIE";
                                    break;
                                case '>=':
                                    echo ($_POST['lPost'] >= $_POST['pPost']) ? "TAK" : "NIE";
                                    break;
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>5a</h2>
                    <p>Wpisz współczynniki równania kwadratowego:</p>
                    <form method="GET">
                        <input name="aGet" size="2">x<sup>2</sup>+<input name="bGet" size="2">x+<input name="cGet" size="2">=0
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_GET['aGet']) && isset($_GET['bGet']) && isset($_GET['cGet'])) {
                            $delta = $_GET['bGet'] * $_GET['bGet'] - 4 * $_GET['aGet'] * $_GET['cGet'];
                            if ($delta > 0) {
                                echo "Równanie ma dwa pierwiastki<br>";
                                echo "x1 = " . (-$_GET['bGet'] - sqrt($delta)) / (2 * $_GET['aGet'])."<br>";
                                echo "x2 = " . (-$_GET['bGet'] + sqrt($delta)) / (2 * $_GET['aGet']);
                            }
                            elseif ($delta == 0) {
                                echo "Równanie ma jeden pierwiastek";
                                echo "x0 = " . (-$_GET['bGet']) / (2 * $_GET['aGet']);
                            }
                            elseif ($delta < 0) {
                                echo "Równanie nie ma pierwiastków";
                            }
                        }
                    ?>
                </td>
                <td>
                    <h2>5b</h2>
                    <p>Wpisz współczynniki równania kwadratowego:</p>
                    <form method="POST">
                        <input name="aPost" size="2">x<sup>2</sup>+<input name="bPost" size="2">x+<input name="cPost" size="2">=0
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['aPost']) && isset($_POST['bPost']) && isset($_POST['cPost'])) {
                            $delta = $_POST['bPost'] * $_POST['bPost'] - 4 * $_POST['aPost'] * $_POST['cPost'];
                            if ($delta > 0) {
                                echo "∆=<input style='color: red; margin-bottom: 5px' value=$delta></input><br>";
                                echo "x1=<input style='color: lime; margin-bottom: 5px' value=" . (-$_POST['bPost'] - sqrt($delta)) / (2 * $_POST['aPost'])."></input><br>";
                                echo "x2=<input style='color: lime' value=" . (-$_POST['bPost'] + sqrt($delta)) / (2 * $_POST['aPost'])."></input>";
                            }
                            elseif ($delta == 0) {
                                echo "∆=<input style='color: red; margin-bottom: 5px' value=$delta></input><br>";
                                echo "x0=<input style='color: lime' value=" . (-$_POST['bPost']) / (2 * $_POST['aPost'])."></input>";
                            }
                            elseif ($delta < 0) {
                                echo "∆=<input style='color: red; margin-bottom: 5px' value=$delta></input><br>";
                                echo "Równanie nie ma pierwiastków";
                            }
                        }
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>
