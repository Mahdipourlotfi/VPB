<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />

</head>

<body dir="">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">

            <form id="langform" action="{{ route('user.lang') }}" method="get" class="d-flex align-items-center">

              <select class="form-select" name="lang" id="lang" onchange="this.form.submit()">

                <option disabled>Language</option>

                @foreach($lngs as $lng)
                @if($lng['Supported'] ==true )
                <option value="{{$lng['Code']}}" @if (Session::get('locale')==$lng['Code'] ) selected @endif>
                  <span>{{$lng['Flag']}}</span> {{$lng['NativeName']}}
                </option>
                @endif
                @endforeach

              </select>

            </form>

            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-15">
            <div class="card">
              <div class="card-body">

                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    {{-- <div id="draggable" class="ui-widget-content fs-1 bg-danger text-white">
      <p>{!! __('General.Drager') !!}</p>
    </div> --}}
    {{-- circle menu start
    https://codepen.io/logrithumn/pen/yMwYXX--}}
    <div id="draggable" class="ui-widget-content ">
      <div class="circle">
        <div class="ring">
          <a class="menuItem close fa fa-xmark fa-3x" data-icon="fa-xmark "></a>
          <a class="menuItem fa fa-home fa-2x" data-icon="fa fa-home "></a>
          <a class="menuItem fa fa-comment fa-2x" data-icon=" fa-comment "></a>
          <a class="menuItem fa fa-play fa-2x" data-icon=" fa-play "></a>
          <a class="menuItem fa fa-camera fa-2x" data-icon=" fa-camera "></a>
          <a class="menuItem fa fa-music fa-2x" data-icon=" fa-music "></a>
          <a class="menuItem fa fa-user fa-2x" data-icon=" fa-user "></a>
          <div class="menuItem fa fa-trash-o fa-2x" data-icon=" fa-trash-o ">
            <a class=" menuItem fa fa-trash-o fa-2x" data-icon=" fa-trash-o ">test1</a>
            <a class=" menuItem fa fa-trash-o fa-2x" data-icon=" fa-trash-o ">test2</a>           
          </div>
          <a class="menuItem fa fa-star fa-2x" data-icon=" fa-star "></a>
          <div class="menuItem fa fa-hippo fa-2x" data-icon=" fa-hippo ">
            <a class="menuItem close fa fa-xmark fa-3x" data-icon="fa-xmark "></a>
            <a class=" menuItem fa fa-hippo fa-2x" data-icon=" fa-hippo "></br>test3</a>
            <a class=" menuItem fa fa-hippo fa-2x" data-icon=" fa-hippo ">test4</a>
          </div>
        </div>
        <div class="center fa fa-th fa-2x" ></div>
      </div>
    </div>
    {{--circle menu end --}}

  </div>

  <script type="module">
    var dragging=false;
    const menus=[];
    $(function(){
     
    $('.flager').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var value = $option.val();//to get content of "value" attrib
    var text = $option.text();//to get <option>Text</option> content
    //alert(`route('change.lang', ['lang' => '${value}'])`);
    window.location.href =`/route('change.lang', ['lang' => '${value}'])`;
});
$( "#draggable" ).draggable({
  drag: function() {
    dragging=true;
      }});
})

var rex = new circlemenu();
rex.hide_items();
rex.arrangeitem();
$("div.menuItem").click(function(e) { 
  e.preventDefault(); 
  if(e.target !== e.currentTarget) return;
  //if (JSON.stringify(e.currentTarget)===JSON.stringify(rex.currentdiv)) return;
  let items = $(this).children ("a,div" );
  rex.change_center_icon($(this).attr("class"));
  rex.switchmenu($(this),items);
    });

$('div.center').click ( function(e) {
 e.preventDefault(); 
 e.stopPropagation();
  if( dragging==false)
{
 if(rex.currentdiv.hasClass("ring")==false)
 {
        rex.returnback();
        rex.change_center_icon();
 }

else
$("div.circle").toggleClass("open");
}else
dragging=false;
  
});

$('a.close').click ( function(e) {
  e.preventDefault(); 
  e.stopPropagation();
  if( dragging==false)
{
  $("div.circle").removeClass("open");
  rex.reset();

}else
dragging=false;
   
});

  </script>

</body>

</html>