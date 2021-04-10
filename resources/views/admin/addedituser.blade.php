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
        {{ $admin['LoggedUserInfo']['name'] ??''}}
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
      <div class="col-8 mt-4 mb-5" styles="margin-right:30%" >
      
      @if(!$users)
        <div class="mb-3" style="font-size:30px"> 
        Add User
        </div> 
        <form action="{{ route('admin.register.user') }}" method="post">
            @if(Session::get('success')) 
            <div class="alert alert-success">
               {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
               {{ Session::get('fail') }}
            </div>
            @endif
            <hr>
            @csrf
            <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{old('name')}}">
               <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
               <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password" placeholder="Enter password">
               <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <label class="mr-3">
                  Role user  
            </label>
            <div class="form-group">
               <div class="btn-group btn-group-toggle" data-toggle="buttons">  
                  <label class="btn btn-secondary active">
                     <input type="radio" name="role" value="dosen" autocomplete="off" checked> Dosen
                  </label>
                  <label class="btn btn-secondary">
                     <input type="radio" name="role" value="kaprodi" autocomplete="off"> Kaprodi
                  </label>
               </div>
               <span class="text-danger">@error('role'){{ $message }} @enderror</span>
            </div>    
            <div>
               <button type="submit" class="btn btn-block btn-dark ">Add user</button>
            </div>  
         </form>
      @else
        <div class="mb-3" style="font-size:30px"> 
        Edit User
        </div> 
        <form action="{{ route('admin.user.update',[$users->id]) }}" method="post">
            @if(Session::get('success')) 
            <div class="alert alert-success">
               {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
               {{ Session::get('fail') }}
            </div>
            @endif
            <hr>
            @csrf
            <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name="nameEdit" placeholder="Enter full name" value="{{$users->name}}">
               <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" name="emailEdit" placeholder="Enter email address" value="{{ $users->email }}">
               <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <label class="mr-3">
                  Role user  
            </label>
            <div class="form-group">
               <div class="btn-group btn-group-toggle" data-toggle="buttons">  
                  <label class="btn btn-secondary" >
                     <input type="radio" name="roleEdit" value="dosen" autocomplete="off" {{ ($users->role=="dosen")? "checked" : "" }}> Dosen
                  </label>
                  <label class="btn btn-secondary" >
                     <input type="radio" name="roleEdit" value="kaprodi" autocomplete="off" {{ ($users->role=="kaprodi")? "checked" : "" }}> Kaprodi
                  </label>
               </div>
               <span class="text-danger">@error('role'){{ $message }} @enderror</span>
            </div>    
            <div>
               <button type="submit" class="btn btn-block btn-dark " >Edit user</button>
            </div>  
         </form>
      @endif
         
      </div>
   </div>
</div>
</body>
</html>