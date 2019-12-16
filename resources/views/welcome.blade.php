<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <title>MEET Up</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Cairo&display=swap');
    body {
        font-family: 'Cairo', sans-serif;
    }
    .jumbotron {
        margin: 0px !important;
    }
    .background {
        background-image: url("{{ asset('images/2.jpg') }}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    #msform {
        width: 100%;
        text-align: center;
        position: relative;
    }
    #msform fieldset {
        background: #e2e2e2;
        border: 0 none;
        border-radius: 3px;
        padding: 20px 30px;
        box-sizing: border-box;
        width: 100%;
        position: relative;
    }
    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }
    /*inputs*/
    #msform input, #msform textarea {
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 13px;
    }
    /*buttons*/
    #msform .action-button {
        width: 100px;
        background: #4267B2;
        font-weight: bold;
        color: #fff;
        border: 0 none;
        border-radius: 1px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }
    .container{
        background: #e2e2e2;
        min-height: 100vh;
    }
    #msform .action-button:hover, #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
    }
    /*headings*/
    .fs-title {
        font-size: 28px;
        /*text-transform: uppercase;*/
        color: #4267B2;
        margin-bottom: 10px;
        padding-bottom: 15px;
        font-weight: bold;
    }
    .fs-subtitle {
        font-weight: normal;
        font-size: 13px;
        color: #666;
        margin-bottom: 20px;
    }

    .inputGroup {
        background-color: #d6d6d6;
        display: block;
        margin: 10px 0;
        position: relative;
        direction: ltr;
    }
    .inputGroup label {
        padding: 12px 30px;
        width: 100%;
        font-size: 26px;
        display: block;
        text-align: left;
        color: #000;
        cursor: pointer;
        position: relative;
        z-index: 2;
        transition: color 200ms ease-in;
        overflow: hidden;
        direction: ltr;

    }
    .inputGroup label:before {
        width: 22px;
        height: 10px;
        border-radius: 50%;
        content: '';
        background-color: #4267B2;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        z-index: -1;
    }
    .b-0{
        bottom: 0;
        color: #9e9e9e;
        margin: 0 !important;
    }
    .inputGroup label:after {
        width: 32px;
        height: 32px;
        content: '';
        border: 2px solid #4267B2;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
        background-repeat: no-repeat;
        background-position: 2px 3px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        cursor: pointer;
        transition: all 200ms ease-in;
    }
    .inputGroup input:checked ~ label {
        color: #fff;
    }
    .inputGroup input:checked ~ label:before {
        -webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
        transform: translate(-50%, -50%) scale3d(56, 56, 1);
        opacity: 1;
    }
    .inputGroup input:checked ~ label:after {
        background-color: #1b9ec7;
        border-color: #005873;
    }
    .inputGroup input {
        width: 32px;
        height: 32px;
        order: 1;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        cursor: pointer;
        visibility: hidden;
    }
</style>
<div class="container p-0">
    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark background">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
                    <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <form id="msform" method="post">
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">
                        Welcome to our Event
                    </h2>

                        <div class="inputGroup">
                            please make sure to answer all Questions and enter your full information.. thanks for your precious time
                        </div>


                    <input type="button" name="previous" class="previous action-button" value="Previous" style="display: none;">
                    <input type="button" name="next" class="countinue action-button" value="Countinue">
                </fieldset>
                @php $x = 1; @endphp
                @foreach($questions as $question)
                <fieldset>
                    <h2 class="fs-title">
                        {{ $x }} - {{$question->title }}
                    </h2>
                    @php $v = 1; @endphp
                    @foreach($question->answers as $answer)
                    <div class="inputGroup">
                        <input id="{{$x}}{{ $v }}" name="{{ $question->id }}" class="choose 1" value="{{ $answer->id }}" type="radio">
                        <label for="{{$x}}{{ $v }}">{{ $answer->answer }}</label>
                    </div>
                        @php $v++; @endphp
                    @endforeach

                    <input type="button" name="previous" class="previous action-button" value="Previous" style="display: none;">
                    <input type="button" name="next" class="next action-button" value="Next">
                </fieldset>
                    @php $x++; @endphp
                @endforeach


                <fieldset>
                    <h2 class="fs-title">Personal Details</h2>
                    <h3 class="fs-subtitle">We will never sell it</h3>
                    <input type="text" id="fname" name="fname" placeholder="Full Name" />
                    <input type="text" id="phone" name="phone" placeholder="Phone" />
                    <input type="text" id="designation" name="designation" placeholder="Your Designation" />
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />
                </fieldset>
            </form>



        </div>
    </div>
    <p class="text-center text-semibold b-0">All Rights Reserved to CATSW 2019</p>
</div>

<!-- Optional JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.js"></script>

<script type="text/javascript">

    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    var result = [];

    $(".next").click(function(){
        var question = $(this).parent().find('input:radio:checked').attr('name');
        var answer = $(this).parent().find('input:radio:checked').val();
        var choose = $(this).parent().find('input:radio:checked').val();
        if (choose === undefined){
            swal({
                position: 'top-end',
                type: 'info',
                title: 'Please Choose Answer Before Going to Next Step',
                showConfirmButton: false,
                timer: 1000,
            });
            return false;
        }
            result.push({'question':question, 'answer':answer});
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale('+scale+')',
                    'position': 'absolute'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".countinue").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale('+scale+')',
                    'position': 'absolute'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function(){
            var name = $('#fname').val(),
                phone = $('#phone').val(),
                designation = $('#designation').val();
        if (name === ''){
            swal({
                position: 'top-end',
                type: 'info',
                title: 'Please Enter Your Full Name and Re-Submit',
                showConfirmButton: false,
                timer: 1000,
            });
            return false;
        }
            $.post('/api/v1/answer', {result:result, name:name, phone:phone, designation:designation}, function (data) {
                if(data == 1)
                {
                    swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Thanks for submit survey :)',
                            showConfirmButton: false,
                            timer: 2000,
                        }
                    ).then(function(){
                            location.reload();
                        }
                    );
                }
            });
            return false;

    })



</script>
</body>
</html>
