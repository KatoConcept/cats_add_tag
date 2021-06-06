<div class="card shadow-sm">
    <h5 class="card-header">
        {{$cat->name}} <br/>
    </h5>
    @if($cat->images->count() === 1)
        <img class="card-img-top" width="100%" height="200" src="{{$cat->images[0]->fullPath}}"/>
    @elseif($cat->images->count() > 1)
        <div id="carouselExampleControls-{{$cat->id}}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($cat->images as $key => $image)
                    <div class="carousel-item {{$key===0 ? 'active' : ''}}">
                        <img class="d-block w-100" src="{{$image->fullPath}}" alt="First slide">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls-{{$cat->id}}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls-{{$cat->id}}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <b>{{__('Breed')}}:</b>
            <a href="{{route('breed', ['breed' => $cat->breed->id])}}">
                {{$cat->breed->name}}
            </a>
        </li>
        <li class="list-group-item"><b>{{__('Age')}}:</b> {{ $cat->age }}</li>
        <li class="list-group-item"><b>{{__('Gender')}}:</b> {{ __(ucfirst(strtolower($cat->gender))) }}</li>
    </ul>
    <div class="card-body">
        <div>
            @foreach($cat->tags as $tag)
                <span class="text-white bg-dark p-2 mb-3 rounded">{{ $tag->tag }}</span>
            @endforeach
        </div>
        <p class="card-text mt-3">{{$cat->description}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                @unless(request()->route()->named('single'))
                    <a href="{{route('single', ['cat' => $cat->id])}}" class="btn btn-sm btn-outline-secondary">{{__('album-card.View')}}</a>
                @endunless
                @auth
                    <a href="{{route('cats.edit', ['cat' => $cat->id])}}" class="btn btn-sm btn-outline-secondary">{{__('album-card.Edit')}}</a>
                @endauth
            </div>
            <small class="text-muted">{{$cat->created_at->diffForHumans()}}</small>
        </div>
    </div>
</div>
