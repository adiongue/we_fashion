<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"><a href="{{url('/')}}">Aucceil</a></span>

                @if (isset($categories))
                    {{ print_r($categories) }}
                    @forelse($categories as $id => $name)
                    <span class="icon-bar"><a href="{{url('category', $id)}}">{{$name}}</a></span>
                    @empty 
                    <li>Aucune category pour l'instant</li>
                    @endforelse
                @endif
            </button>
            <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Aucceil</a></li>
                @if (isset($categories))
                    @forelse($categories as $id => $name)
                    <li ><a href="{{url('category', $id)}}">{{$name}}</a></li>
                    @empty 
                    <li>Aucun category pour l'instant</li>
                    @endforelse
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="{{ route('product.index') }}">Dashboard</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>