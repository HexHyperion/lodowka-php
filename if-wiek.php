<!DOCTYPE html>
<html>
    <head>
        <title>Wynik</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Courier', monospace;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: black;
                color: white;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <h1>
        <?php
            if ($_POST['wiek'] < 11) {
                echo "Ale skibidi!";
            }
            elseif ($_POST['wiek'] < 18) {
                echo "Samobójstwo kiedy?";
            }
            elseif ($_POST['wiek'] < 30) {
                echo "Najlepsze lata!";
            }
            elseif ($_POST['wiek'] < 100) {
                echo "Trzydziestka na karku!";
            }
            else {
                echo "Jakim cudem jeszcze żyjesz?";
            }
        ?>
        </h1>
    </body>
</html>