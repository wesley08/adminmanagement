<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}"> -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-dashboard.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
  <a class="navbar-brand" href="/admin/dashboard" style="font-size:28px">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link"  href="/admin/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="/admin/kurikulumn">Kurikulumn</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $admin['LoggedUserInfo']['name'] }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
   <div class="row mt-5">
      <div class="col-12">
         <div class="d-flex align-items-center justify-content-between mb-4">
            <span style="font-size:30px"> All user Information</span> 
         <!-- onclick="$('.form-hidden').slideToggle(function(){$('#buttonadduser').html($('.form-hidden').is(':visible')?'Close':'+ Add User Dosen/Kaprodi');});" -->
            <a type="button" class="btn btn-warning" id="buttonadduser" href="/admin/dashboard/adduser"> + Add User Kaprodi/Dosen</a> 
         </div>
         <table class="table">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
               @csrf
                  <tr>
                     <td>{{ $loop->iteration}}</td>
                     <td>
                     {{ $user->name }}
                     </td>
                     <td>
                     {{ $user->email }}
                     </td>
                     <td>{{ $user->role }}</td>
                     <td class="d-flex justify-content-end">
                     <a class="btn btn-dark px-5 mr-3"
                     href="{{ route('admin.user.updatepage',[$user->id]) }}"
                     > Edit</a> 
                     <a class="btn btn-danger px-5" href="{{ route('admin.user.delete',[$user->id]) }}"> Delete</a></td>
                  </tr>
               @endforeach
         </table>
         <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
      </div>
   </div>
</div>
</body>
</html>