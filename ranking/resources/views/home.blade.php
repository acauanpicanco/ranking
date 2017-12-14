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

				<p>{{round($character->calcPercentage($character->like))}}</p>
				<p>{{round($character->calcPercentage($character->unlike))}}</p>
				<p>{{$character->description}}</p>
			</div>
			<div class="likes">
				<div class="like">
					<figure class="js-vote" data-type="like">
						<img src="{{ URL::asset('assets/img/like-linha.svg') }}" alt="like">
					</figure>
				</div>
				<div class="unlike">
					<figure class="js-vote" data-type="unlike">
						<img src="{{ URL::asset('assets/img/like-linha.svg') }}" alt="unlike">
					</figure>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>

@section('script')
	<script>
		var session_token 	= '{{ Session::token() }}';


		$('.js-vote').click(function(){
			var type = $(this).data('type');

			$.ajax({
					headers:{
						'X-CSRF-Token': session_token
					},
					type: "GET",
					url: '{{url('/ajax-vote')}}',
					data: {type:type},
						success: function() {
							
						}
				});


		});
	</script>
@stop


@stop
