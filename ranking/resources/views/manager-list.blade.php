@extends('layouts.app')

@section('content')



<div class="inner">
	<div class="top">
		<figure>
			<img src="{{ URL::asset('assets/img/logo.svg') }}" alt="Topway Logo">
		</figure>
	</div>

	<div class="list">
		@foreach($characters as $character)
		
		<div class="item">
			<div class="image">
				<figure>
					<img src="{{ URL::asset('upload/'.$character->image) }}" alt="{{$character->name}}">
				</figure>
				<div class="position">
					<p>{{$loop->index+1}}</p>
				</div>
			</div>
			<div class="text">
				<p>{{$character->name}}</p>

				
				<p>{{$character->description}}</p>
			</div>	
			<div class="likes">
				<a href="{{url('/manager/delete/'.$character->id)}}">delete</a>
				<a href="{{url('/manager/edit/'.$character->id)}}">edit</a>
			</div>

			

		</div>
		@endforeach

	</div>
</div>

@section('script')

@stop


@stop
