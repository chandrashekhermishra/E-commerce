<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>E -commerce</title>
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 --}}

{{-- JQUERY SCRIPTS --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

{{-- JAVASCRIPTS --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

{{-- STYLESHEETS --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   .hovereffect {
      width: 100%;
      
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
  }

  .hovereffect .overlay {
      width: 100%;
    
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
  }

  .hovereffect img {
      display: block;
      position: relative;
      -webkit-transition: all 0.4s ease-in;
      transition: all 0.4s ease-in;
  }

  .hovereffect:hover img {
      filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
      filter: grayscale(1) blur(3px);
      -webkit-filter: grayscale(1) blur(3px);
      -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
      transform: scale(1.2);
  }

  .hovereffect h6 {
      text-transform: uppercase;
      text-align: center;
      position: relative;
      font-size: 17px;
      padding: 10px;
      background: rgba(0, 0, 0, 0.6);
  }

  .hovereffect a.info {
      display: inline-block;
      text-decoration: none;
      padding: 7px 14px;
      border: 1px solid #fff;
      margin: 50px 0 0 0;
      background-color: transparent;
  }

  .hovereffect a.info:hover {
      box-shadow: 0 0 5px #fff;
  }

  .hovereffect a.info, .hovereffect h6 {
      -webkit-transform: scale(0.7);
      -ms-transform: scale(0.7);
      transform: scale(0.7);
      -webkit-transition: all 0.4s ease-in;
      transition: all 0.4s ease-in;
      opacity: 0;
      filter: alpha(opacity=0);
      color: #fff;
      text-transform: uppercase;
  }

  .hovereffect:hover a.info, .hovereffect:hover h6 {
      opacity: 1;
      filter: alpha(opacity=100);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
  }
 {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 30px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>




<body>
    <div id="topheader">

        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ganesh Handicraft</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{url('/index')}}">Home</a></li>
               


                </ul>
                <ul class="nav navbar-nav navbar-right">



                    @if (Route::has('login'))

                    @auth
                     <li><a href="{{url('addcategory')}}">Category</a></li>
                <li><a href="{{url('subcategory')}}">SubCategory</a></li>
                 <li><a href="{{url('additem')}}">Add Product</a></li>
                  <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @else
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span>Admin Login</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

                    @endif
                    @endauth

                    @endif
                </ul>
            </div>

        </nav>
        <main class="py-4">

            @yield('content')

        </main>

    </div>

</body>
</html>
<script type="text/javascript">
    function global(data1,type1,url1,a)
    {

      axios({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType:"json",
        url:url1,
        data:{data1:data1},
        method:type1,
        enctype: 'multipart/form-data',
    })
      .then(function(data){

       a(data);
       
   });

  }


</script>