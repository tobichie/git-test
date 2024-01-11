<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>






    <script>
        $(document).ready(function () {
            $("#reroll").click(function () {
                $("#loadALl").fadeIn(1000, function () {
                    $(this).load("randAds.php", function () {
                        $(this).fadeOut(1000)
                    })
                })
            })
        })
    </script>
</head>
<body>



<div name="cont" id="cont" >

    <button id="reroll">Wanna reroll your ads?</button>
    <!-- This is where everything is loaded once the button is pressed -->

    <div id="loadALl">

    </div>

</div>
</body>
</html>



