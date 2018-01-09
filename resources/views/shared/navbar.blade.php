









                        
                        
                        
                            
                                    
                                    
                                            <li><a href="/order">List Order</a></li>
                                            <li><a href="/order/create">Add New Order</a></li>
                                        <span class="caret"></span></a>
                                        @endif
                                        @if (Auth::check())
                                    </ul>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Menu 
                                    <ul class="dropdown-menu" role="menu">
                                </li>
                                <li class="dropdown">
                            <li><a href="/about">About</a></li>
                            <li><a href="/admin">Admin Login</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/users/login">Login</a></li>
                            <li><a href="/users/logout">Logout</a></li>
                            <li><a href="/users/register">Register</a></li>
                            @endif
                            @if (Auth::user()->is_admin === 1)
                           <p class="nav navbar-nav navbar-left"><a> Welcome {{ Auth::user()->name }}</a></p>
                           @endif
                           @if(Auth::user()->role_id === 1)
                        @else
                        @else
                        @endif
                        @endif
                        @if (Auth::check())
                        @if (Auth::check())
                    </ul>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member 
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                </li>
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="sr-only">Toggle navigation</span>
            </button>
            </ul>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Navbar Right -->
        </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="navbar-header">
    </div>
    <div class="container-fluid">
</nav>
<nav class="navbar navbar-default">