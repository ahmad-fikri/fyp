<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::check())
                <a class="navbar-brand" href="/">Hi, {{ Auth::user()->name }} (RM {{ Auth::user()->credit }} )</a>
            @else
                <a class="navbar-brand" href="/">Hi, Guest</a>
            @endif
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>

                @if(Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                    <li><a href="/order/create">Print <i class="fa fa-print" aria-hidden="true"></i></a></li>
                    

                    @if(Auth::user()->role_id === 1)
                        <li><a href="/allorder">List Order <i class="fa fa-history" aria-hidden="true"></i></a></li>
                        <li><a href="/completed">Completed Order <i class="fa fa-check-square-o" aria-hidden="true"></i></a></li>
                    @else
                        <li><a href="/order">Order History <i class="fa fa-history" aria-hidden="true"></i></a></li>
                    @endif
                    
                    <li><a href="/pay">Topup <i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
                  
                  
                  </ul>
                </li>
                @endif
                

                @if(Auth::check())
                     @if(Auth::user()->role_id === 1)
                        <li><a href="/admin">Admin Login</a></li>
                        <li><a href="/report">Report</a></li>
                        <li><a href="/kpi">KPI</a></li>
                    @endif
                @endif

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Member <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                    @if(Auth::check())
                        <li><a href="/users/logout">Logout</a></li>
                    @else
                        <li><a href="/users/register">Register</a></li>
                        <li><a href="/users/login">Login</a></li>
                    @endif
                  
                  </ul>
                </li>
            
            </ul>
                                    
        </div>
    </div>
</nav>