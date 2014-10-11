<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
	  <div class="navbar-header">
	     	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
      	<a class="navbar-brand" href="#">Larabook</a>
    </div> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	<ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link</a></li>
	        <li><a href="#">Link</a></li>
      	</ul>

        <ul class="nav navbar-nav navbar-right">
            @if ($currentUser)
            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="nav-gravatar" src="{{ $currentUser->presents()->gravatar() }}" alt="{{ $currentUser->username }}"/>
                    {{ $currentUser->username }}  <span class="caret"></span>

                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li>
                        {{ link_to_route('logout_path','Logout',[]) }}
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            One more separated link
                        </a>
                    </li>
                </ul>
            </li>
            @else

                <li {{ (Request::is('register')) ? ' class = "active"' : '' }}  >
                    {{ link_to_route('register_path','Register') }}
                </li>

                <li {{ (Request::is('login')) ? ' class = "active"' : '' }} >
                    {{ link_to_route('login_path','Login') }}
                </li>

            @endif
        </ul>

     </div>   
  </div>
</nav>