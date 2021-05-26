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
                @else
                    <span class="icon-bar">Aucune</span>
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
                @else
                    <span class="icon-bar">Aucune</span>
                @endif
            </ul>
        </div>
    </div>
</nav>