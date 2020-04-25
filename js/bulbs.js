
                var ratedIndex = -1, uID = 0;

                $(document).ready(function () {
                    resetBulbColors();

                    $('.fa-lightbulb').on('click', function () {
                        ratedIndex = parseInt($(this).data('index'));
                        window.open("/quorating/control/rating-control.php?rating="+ (ratedIndex+1), '_self');
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