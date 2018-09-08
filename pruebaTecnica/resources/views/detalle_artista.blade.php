@extends('layouts.template')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col s4 m2 l2">
				<img class="activator responsive-img circle" src="{{ $artist->images[2]->url }}" alt="{{ $artist->name }}">				
			</div>
			<div class="col s8 m10 l10">
				<h1 style="color: #FFF;">{{ $artist->name }}</h1>
				<p><a href="{{ $artist->external_urls->spotify }}" style="color: BLUE;">Ir a la pagina del Artista</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<table class="responsive-table" style="color: #FFF;">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Album</th>
							<th>Canción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($artist_tracks->tracks as $track)
							<tr>
								<td>
									<img src="{{ $track->album->images[1]->url }}" alt="{{ $track->album->name }}" class="activator responsive-img" style="width: 70px;">
								</td>
								<td>{{ $track->album->name }}</td>
								<td>{{ $track->name }}</td>
							</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection()


