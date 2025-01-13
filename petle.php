<html>
    <head>
        <title>Pętle</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            * {
                font-family: 'Courier', monospace;
                font-weight: 600;
            }
            body {
                background-color: black;
                color: white;
                height: 100vh;
                overflow: auto;
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
            .mb5 {
                margin-bottom: 5px;
            }
            .gen-tab {
                margin: 0;
                padding: 0;
            }
            .gen-tab td {
                border: 1px solid white;
                padding: 5px;
                border-radius: 5px;
                text-align: center;
            }
            .gen-tab th {
                border: 2px solid red;
                padding: 5px;
                border-radius: 5px;
                background-color: #ff00004a;
            }
        </style>
    </head>
    <body>
        <h1>Pętle i dynamiczna generacja elementów</h1>
        <table width="100%">
            <tr>
                <td width="50%">
                    <h2>1a</h2>
                    <form method="POST">
                        Ile cyfr wypisać: <input name="wypisz1" size="10">
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['wypisz1'])) {
                            $a = $_POST['wypisz1'];
                            for ($i = 1; $i <= $a; $i++) {
                                echo "$i ";
                            }
                        }
                    ?>
                </td>
                <td width="50%">
                    <h2>1b</h2>
                    <form method="POST">
                        Ile cyfr wypisać: <input name="wypisz2" size="10">
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['wypisz2'])) {
                            $b = $_POST['wypisz2'];
                            for ($i = 1; $i <= $b; $i++) {
                                echo "$i<br>";
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>1c</h2>
                    <form method="post">
                        Od ilu maleć: <input name="desc" size="5">
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['desc'])) {
                            $c = $_POST['desc'];
                            for ($i = $c; $i > 0; $i--) {
                                echo "$i ";
                            }
                        }
                    ?>
                </td>
                <td>
                    <h2>1d</h2>
                    <form method="post">
                        <p>Start: <input name="start" size="5"></p>
                        <p>Krok: <input name="krok" size="5"></p>
                        Koniec: <input name="meta" size="5">
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['start']) && isset($_POST['krok']) && isset($_POST['meta'])) {
                            $start = $_POST['start'];
                            $krok = $_POST['krok'];
                            $meta = $_POST['meta'];
                            for ($i = $start; $i <= $meta; $i += $krok) {
                                echo "$i ";
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <h2>2</h2>
                    <form method="POST">
                        Ile masz lat:
                        <select name="wiek">
                            <!-- Kinda easier than handwriting all of those, PHP for the win! -->
                            <?php
                                for ($i = 1; $i <= 120; $i++) {
                                    echo "<option value='$i'>$i";
                                }
                            ?>
                        </select>
                        <input type="submit" value="OK">
                    </form>
                    <?php
                        if (isset($_POST['wiek'])) {
                            $age = $_POST['wiek'];
                            if ($age < 11) {
                                echo "Ale skibidi!";
                            }
                            elseif ($age < 18) {
                                echo "Samobójstwo kiedy?";
                            }
                            elseif ($age < 30) {
                                echo "Najlepsze lata!";
                            }
                            elseif ($age < 100) {
                                echo "Trzydziestka na karku!";
                            }
                            else {
                                echo "Jakim cudem jeszcze żyjesz?";
                            }
                        }
                    ?>
                </td>
                <td width="50%">
                    <h2>3</h2>
                    <form method="GET">
                        Ile cyfr: <input class="mb5" name="tabIle1" size="10"><br>
                        Pion/poziom: <select class="mb5" name="orient">
                            <option value="poz">poziom
                            <option value="pio">pion
                        </select>
                        <br>Krok: <input name="tabKrok1" size="10">
                        <input class="mb5" type="submit" value="OK">
                    </form>
                    <table class="gen-tab">
                        <?php
                            if (isset($_GET['tabIle1']) && isset($_GET['orient']) && isset($_GET['tabKrok1'])) {
                                $ile = $_GET['tabIle1'];
                                $orient = $_GET['orient'];
                                $krok = $_GET['tabKrok1'];
                                $count = 0;
                                if ($orient == 'poz') {
                                    echo "<tr>";
                                    for ($i = 1; $count <= $ile; $i += $krok) {
                                        echo "<td>$i</td>";
                                        $count++;
                                    }
                                    echo "</tr>";
                                }
                                elseif ($orient == 'pio') {
                                    for ($i = 1; $count <= $ile; $i += $krok) {
                                        echo "<tr><td>$i</td></tr>";
                                        $count++;
                                    }
                                }
                            }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>4</h2>
                    <form method="POST">
                        <p>Wierszy: <input size="5" name="wier1"></p>
                        Kolumn: <input size="5" name="kol1">
                        <input type="submit" value="OK">
                    </form>
                    <table class="gen-tab">
                        <?php
                            if (isset($_POST['wier1']) && isset($_POST['kol1'])) {
                                $wiersze = $_POST['wier1'];
                                $kolumny = $_POST['kol1'];
                                $count = 1;
                                for ($i = 1; $i <= $wiersze; $i++) {
                                    echo "<tr>";
                                    for ($j = 1; $j <= $kolumny; $j++) {
                                        echo "<td>". $count ."</td>";
                                        $count++;
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                </td>
                <td>
                    <h2>5</h2>
                    <form method="POST">
                        <p>SZACHOWNICA:</p>
                        <p>Wierszy: <input size="5" name="wier2"></p>
                        Kolumn: <input size="5" name="kol2">
                        <input type="submit" value="OK">
                    </form>
                    <table class="gen-tab">
                        <?php
                            if (isset($_POST['wier2']) && isset($_POST['kol2'])) {
                                $wiersze = $_POST['wier2'];
                                $kolumny = $_POST['kol2'];
                                for ($i = 1; $i <= $wiersze; $i++) {
                                    echo "<tr>";
                                    for ($j = 1; $j <= $kolumny; $j++) {
                                        if (($i + $j) % 2 == 0) {
                                            echo "<td style='background-color: white;'></td>";
                                        }
                                        else {
                                            echo "<td style='background-color: black;'></td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <h2>6a</h2>
                    <form method="GET">
                        Rozmiar: <input name="ile3" size="5">
                        <input type="submit" value="OK">
                    </form>
                    <table class="gen-tab">
                        <!-- multiplication table -->
                        <?php
                            if (isset($_GET['ile3'])) {
                                $rozmiar = $_GET['ile3'];
                                for ($i = 1; $i <= $rozmiar; $i++) {
                                    echo "<tr>";
                                    for ($j = 1; $j <= $rozmiar; $j++) {
                                        echo "<td>". $i * $j ."</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                </td>
                <td valign="top">
                    <h2>6b</h2>
                    <form method="POST">
                        Rozmiar: <input name="ile4" size="5">
                        <input type="submit" value="OK">
                    </form>
                    <table class="gen-tab">
                        <?php
                            if (isset($_POST['ile4'])) {
                                $rozmiar = $_POST['ile4'];
                                echo "<tr><td style='border: none'></td>";
                                for ($i = 1; $i <= $rozmiar; $i++) {
                                    echo "<th>". $i ."</th>";
                                }
                                echo "</tr>";
                                for ($i = 1; $i <= $rozmiar; $i++) {
                                    echo "<tr><th>". $i ."</th>";
                                    for ($j = 1; $j <= $rozmiar; $j++) {
                                        echo "<td>". $i * $j ."</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
