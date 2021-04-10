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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
  <a class="navbar-brand" href="/admin/dashboard" style="font-size:28px">Kaprodi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link"  href="/admin/dashboard">User Test Kepribadian</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Kaprodi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
@php
      $pertanyaandominana = [
          ['1. dominan a','groupa1'],
          ['2. dominan a' , 'groupa2'],
          ['3. dominan a' , 'groupa3'],
      ];
    @endphp
    @php
      $pertanyaandominanb = [
          ['1. dominan b', 'group'],
          ['2. dominan b' ,'group2'],
          ['3. dominan b' , 'group3'],
      ];
    @endphp

    @php
    $pertanyaan = [
        ['1. Saya adalah seorang yang sanggup membuat rencana yang baik di dalam sekolah dan di luar sekolah, dalam permainan / tugas',
        '3', '2', '1','group1'],
        ['2. Saya adalah seorang pemimpin yang baik. Saya adalah pemimpin dalam beberapa bidang',
        '3', '2', '1','group2'],
        ['3. Saya adalah orang yang malas bermain-main bersama dengan teman-teman sekelompok',
        '1', '2', '3','group3'],
        ['4. Saya adalah seorang yang selalu merusak dan melanggar peraturan-peraturan sekolah maupun pergaulan',
        '1', '2', '3','group4'],
        ['5. Saya adalah seorang yang mudah mengerti sesuatu (sesuatu yang berhubungan dengan persoalan di sekolah, maupun sesuatu yang berhubungan dengan persoalan di luar sekolah)',
        '3', '2', '1','group5'],
        ['6. Saya adalah seorang yang selalu bekerja untuk kepentingan kelas atau kelompok saya / teman saya',
        '1.5', '3', '1.5','group6'],
        ['7. Untuk mendapatkan kawan, saya sukar untuk bergaul dengan mereka',
        '1', '2', '3','group7'],
        ['8. Saya adalah seorang yang tidak bahagia, tidak ada seorangpun dapat membuat saya gembira',
        '1', '2', '3','group8'],
        ['9. Saya adalah seorang yang sukar mengemukakan pendapat, sehingga tidak seorangpun dapat mengerti pendapat saya',
        '1', '2', '3','group9'],
        ['10. Saya adalah seorang yang sangat popular dikelompok saya',
        '1.5', '3', '1.5','group10'],
        ['11. Saya adalah seorang yang paling menurut dikelompok saya',
        '1.5', '3', '1.5','group11'],
        ['12. Saya adalah seorang yang mudah marah, mudah memulai pertengkaran',
        '1', '2', '3','group12'],
        ['13. Saya adalah seorang yang selalu mempunyai ide-ide baik yang menyenangkan dalam aktifitas pergaulan maupun pelajaran',
        '3', '2', '1','group13'],
        ['14. Saya adalah seorang yang kejam terhadap teman-teman lain terutama teman yang kecil',
        '1', '2', '3','group14'],
        ['15. Saya adalah seorang yang banyak mempunyai teman',
        '3', '2', '1','group15']
    ]
@endphp
    <div class="container">
   <div class="row mt-5">
   <form action="{{ route('user.test') }}" method="post" class="col-12">
   @csrf
@foreach($pertanyaan as $item => $value)
        <p>{{$value[0]}}
        </p>
  <div class="d-flex justify-content-between px-5 pb-2">
    <span class="d-flex flex-column align-items-center">
      <input type="radio"  name="{{$value[4]}}" value="{{$value[1]}}">
      <label for="female">cocok dengan saya</label>
    </span>
    <span class="d-flex flex-column align-items-center">
      <input type="radio" name="{{$value[4]}}" value="{{$value[2]}}">
      <label for="male">agak cocok dengan saya</label>
    </span>
    <span class="d-flex flex-column align-items-center">
      <input type="radio" name="{{$value[4]}}" value="{{$value[3]}}">
      <label for="male">tidak cocok dengan saya</label>
    </span>
  </div>
  <hr>
    @endforeach
    <div class="d-flex justify-content-center">
    <button style="width:40%"  type="submit" class="btn btn-block btn-dark mt-5 py-3">Submit test</button>
    </div>
    
    
</form>

      <div>
      @php
        $tempscore = $score ?? 0;
      @endphp
      Score : {{ $tempscore}}
      @if($tempscore>=37.5 && $tempscore <= 45)
        <div>
        Memiliki kepribadian optimis sekali, sangat menyenangkan dan sangat percaya diri sendiri
        <div>
      @elseif($tempscore>=30.5 && $tempscore <= 37)
      <div>
      berkepribadian optimis, menyenangkan dalam bergaul dan percaya padaa diri sendiri
      <div>
      @elseif($tempscore>=23.5 && $tempscore <= 30)
      <div>
      cukup optimis, agak menyenangkan dan cukup percaya padaa diri sendiri
      <div>
      @elseif($tempscore>=16.5 && $tempscore <=23)
      <div>
      kurang optimis, kurang menyenangkan dan kurang percaya padaa diri sendiri
      <div>
      @else
      <div>
        belum ada score
        <div>
      </div>
      @endif
<!-- <div class="col-12 mt-5">dominan question</div>
      <form action="{{ route('user.test.dominan') }}" method="post" class="col-12 mt-5">
   @csrf
@foreach($pertanyaandominanb as $item => $value)
        
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" name="{{$value[1]}}" aria-label="Checkbox for following text input" value="b">
    </div>
  </div>
  <p class="ml-3 d-flex align-self-center">{{$value[0]}}
        </p>
</div>
    @endforeach
    @foreach($pertanyaandominana as $item => $value)
        
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" name="{{$value[1]}}" aria-label="Checkbox for following text input" value="a">
    </div>
  </div>
  <p class="ml-3">{{$value[0]}}
        </p>
</div>
    @endforeach
    <div class="d-flex justify-content-center">
    <button   type="submit" class="btn btn-block btn-dark ">Submit test</button>
    </div>
    
    
</form>


      <div>
      Score dominan : {{ $scoreDominan ?? "belum ada"}}
      </div>
   </div>
   </div> -->


</body>
</html>
  
    
  