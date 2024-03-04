<style>
    .container {
        width: 50px;
        height: 50px;
        position: absolute;
        background-color: black;
        perspective: 1000px;
    }

    .animate {
        width: 100%;
        height: 100%;
        position: absolute;
        background-color: red;
        transform-style: preserve-3d;
        transition: transform 1s;
    }

    .container:hover .animate {
        transform: rotateY(180deg);
        background-color: red;
    }

    button {
        width: 50px;
        height: 50px;
        position: absolute;
        background-color: black;
    }
</style>

<div class="container">
    <div class="animate">
        <button></button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            $(".container").css("background-color", "red");
            $(".animate").animate({
                left: '250px'
            }, {
                duration: 1000,
                step: function(now, fx) {
                    $(".animate").css("transform", "rotateY(180deg)");
                },
                complete: function() {
                    $(".animate").css("transform", "rotateY(180deg)");
                    $(".container").css("background-color", "red");
                }
            });
        });
    });
</script>
