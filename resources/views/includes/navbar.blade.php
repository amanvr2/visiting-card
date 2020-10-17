

<nav class="navbar navbar-default">
    <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/images/latlogo1.png"></a>
                </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class=""><a href="/demo"><i class="fa fa-desktop" aria-hidden="true"></i>Demo</a></li> 
                  <li><a href="/howitWorks" > <i class="fa fa-question-circle" aria-hidden="true"></i>How it Works </a></li>
                  <li><a href="/pricing" > <i class="fa fa-inr" aria-hidden="true"></i>Pricing </a></li>
                  <div id="google_translate_element"></div>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                  

                    @if(Auth::guest())
                      <li><a href="{{ route('login') }}" id=""><i class="fa fa-sign-in" aria-hidden="true"></i> Log In |</a></li>
                      <li><a href="{{ route('register') }}" id="signupBtn"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    @else 

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                                <li><a href="/add"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add details</a></li>
                                <li><a href="/my-details"><i class="fa fa-pencil" aria-hidden="true"></i>My Details</a></li>
                                <li><a href="https://shoperkart-rel.herokuapp.com/payments?userId={{auth()->user()->id}}"><i class="fa fa-credit-card" aria-hidden="true"></i>Upgrade Now</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>LogOut</a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        </li>


                    @endif
                </ul>
            </div>
    </div>
</nav>
