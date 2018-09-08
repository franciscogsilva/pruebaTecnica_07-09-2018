@extends('layouts.template')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($lanzamientos->albums->items as $lanzamiento)
				<div class="col s12 m4 l4">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator responsive-img" src="{{ $lanzamiento->images[1]->url }}" alt="{{ $lanzamiento->name }}">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4"><b>{{ $lanzamiento->name }}</b></span>
							@foreach($lanzamiento->artists as $artist)
								<a href="{{ url('/artista/'.$artist->id.'?token='.$token) }}"><p>{{$artist->name}}</p></a>
							@endforeach()
						</div>
					</div>
				</div>
			@endforeach()
		</div>
	</div>
@endsection()


