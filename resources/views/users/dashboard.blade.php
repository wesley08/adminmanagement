<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-dashboard.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center align-items-center" style="height:100vh" >
            <img  class="box bounce-7" src="{{ asset('image/trophy.png') }}" alt="Italian Trulli">
            <h1 style="font-size:55px" class="mt-3">Result of Who Am I test</h1>
            <div class="score-container">
                Score {{$score ?? 0}}
            </div>
            <div class="mt-3 d-flex justify-content-center text-justify" style="font-size:30px">
                @php
                    $tempscore = $score ?? 0;
                @endphp
                @if($tempscore>=37.5 && $tempscore <= 45)
                    <p>
                        "Memiliki kepribadian optimis sekali, sangat menyenangkan dan sangat percaya diri sendiri"
                    </p>
                @elseif($tempscore>=30.5 && $tempscore <= 37)
                    <p>
                        "berkepribadian optimis, menyenangkan dalam bergaul dan percaya padaa diri sendiri"
                    </p>
                @elseif($tempscore>=23.5 && $tempscore <= 30)
                    <p>
                        "cukup optimis, agak menyenangkan dan cukup percaya padaa diri sendiri"
                    </p>
                @elseif($tempscore>=16.5 && $tempscore <=23)
                    <p>
                        "kurang optimis, kurang menyenangkan dan kurang percaya padaa diri sendiri"
                    </p>
                @else
                    <p>
                        belum ada score
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>