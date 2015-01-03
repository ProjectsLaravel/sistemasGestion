<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AuthLaravelSimple</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
  <style>
  @import url(//fonts.googleapis.com/css?family=Lato:700);
  </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li>
              <div class="navbar-collapse collapse">
                @if (Auth::check())
                <ul class="nav navbar-nav pull-right">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="icon icon-wh i-profile"></span> {{ Auth::user()->username }}  <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                      <li><div onclick="showView('updateUser','ocultar')">Editar usuario</li>
                      <li><a href="{{ action('AuthController@logout') }}">Salir</a></li>
                    </ul>
                  </li>
                </ul>
                @endif
              <div>
            </li>

          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>

        <div id="main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ocultar">
          <h1 class="page-header">Dashboard</h1>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">

          </div>
        </div>

        <div id="updateUser" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ocultar" style="display:none" >
          {{ Form::open(['route' => 'updateUser', 'method' => 'POST', 'role' => 'form']) }}

            {{ Form::hidden('id', Auth::user()->id ) }}

            {{ Form::label('first_name', 'FirtsName', ['class' => 'sr-only']) }}
            {{ Form::text('first_name', Auth::user()->first_name , ['class' => 'form-control', 'placeholder' => 'Firstname', 'autofocus' => '']) }}


            {{ Form::label('last_name', 'Last Name', ['class' => 'sr-only']) }}
            {{ Form::text('last_name', Auth::user()->last_name , ['class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus' => '']) }}

            {{Form::text('email', Auth::user()->email ,['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => ''])}}

            {{ Form::label('password', 'Password', ['class' => 'sr-only']) }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

          <p>
            <input type="submit" value="Actualizar" class="btn btn-success">
          </p>
          {{ Form::close() }}
        </div>

      </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('bootstrap-3.2.0/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.2.0/js/docs.min.js') }}"></script>
<script src="{{ asset('js/dash.js') }}"></script>

</html>
