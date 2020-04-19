<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div align="center" style="background: grey; padding: 50px;color:white;">
        <i class="far fa-lightbulb" data-index="0"></i>
        <i class="far fa-lightbulb" data-index="1"></i>
        <i class="far fa-lightbulb" data-index="2"></i>
        <i class="far fa-lightbulb" data-index="3"></i>
        <i class="far fa-lightbulb" data-index="4"></i>
        <br><br>
    </div>

    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
        var ratedIndex = -1, uID = 0;

        $(document).ready(function () {
            resetBulbColors();

            if (localStorage.getItem('ratedIndex') != null) {
                setBulbs(parseInt(localStorage.getItem('ratedIndex')));
                uID = localStorage.getItem('uID');
            }

            $('.fa-lightbulb').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               saveToTheDB();
            });

            $('.fa-lightbulb').mouseover(function () {
                resetBulbColors();
                var currentIndex = parseInt($(this).data('index'));
                setBulbs(currentIndex);
            });

            $('.fa-lightbulb').mouseleave(function () {
                resetBulbColors();

                if (ratedIndex != -1)
                    setBulbs(ratedIndex);
            });
        });



        function setBulbs(max) {
            for (var i=0; i <= max; i++)
                $('.fa-lightbulb:eq('+i+')').css('color', 'yellow');
        }

        function resetBulbColors() {
            $('.fa-lightbulb').css('color', 'white');
        }
    </script>
</body>
</html>