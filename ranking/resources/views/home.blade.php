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
			</div
>			<div class="likes">
				<div class="like">
					<figure class="js-vote" data-type="like">
					<svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 94.9 91.1" style="enable-background:new 0 0 94.9 91.1;" xml:space="preserve">
					<g>
						<g>
							<path d="M83.2,33.7c-4.7-0.3-11.6,0.1-18.9,0.8c2.1-8.5,4.9-20.3,5.9-25.8c1.6-8.7-10.8-11.8-13.5-5s-10.8,29.9-26,34.1
								c-0.7,0.2-1.5,0.6-1.5,0.6l-0.1,46.5c0,0,29.7,6.2,47,6.2c8.7,0,14.6-1.5,15.5-9.8c1.2-11.1,2.6-25.1,3.2-33.3
								C95.6,37.6,92.4,34.3,83.2,33.7z"/>
						</g>
						<g>
							<path d="M17.7,34.9H5c-2.8,0-5,2.2-5,5v43.7c0,2.8,2.2,5,5,5h12.7c2.8,0,5-2.2,5-5V39.9C22.7,37.1,20.4,34.9,17.7,34.9z"/>
						</g>
					</g>
					</svg>

					</figure>
				</div>
				<div class="unlike">
					<figure class="js-vote" data-type="unlike">
					<svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 94.9 91.1" style="enable-background:new 0 0 94.9 91.1;" xml:space="preserve">
				<g>
					<g>
						<path d="M83.2,33.7c-4.7-0.3-11.6,0.1-18.9,0.8c2.1-8.5,4.9-20.3,5.9-25.8c1.6-8.7-10.8-11.8-13.5-5s-10.8,29.9-26,34.1
							c-0.7,0.2-1.5,0.6-1.5,0.6l-0.1,46.5c0,0,29.7,6.2,47,6.2c8.7,0,14.6-1.5,15.5-9.8c1.2-11.1,2.6-25.1,3.2-33.3
							C95.6,37.6,92.4,34.3,83.2,33.7z"/>
					</g>
					<g>
						<path d="M17.7,34.9H5c-2.8,0-5,2.2-5,5v43.7c0,2.8,2.2,5,5,5h12.7c2.8,0,5-2.2,5-5V39.9C22.7,37.1,20.4,34.9,17.7,34.9z"/>
					</g>
				</g>
				</svg>
					</figure>
				</div>
			</div>

			<div class="percentage">
				<div class="like">
					<p>gostam</p>
					
						@if($character->like != 0)
						<p>{{round($character->calcPercentage($character->like))}}%</p>
						@else
						<p>0</p>
						@endif				
				</div>
				<div class="unlike">
					<p>não gostam</p>
					@if($character->unlike != 0)
						<p>{{round($character->calcPercentage($character->unlike))}}%</p>
						@else
						<p>0</p>
						@endif				
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
			$(this).toggleClass('active');

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
