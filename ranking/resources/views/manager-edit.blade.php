@extends('layouts.app')

@section('content')



<div class="inner">
	<div class="top">
		<figure>
			<img src="{{ URL::asset('assets/img/logo.svg') }}" alt="Topway Logo">
		</figure>
	</div>

	<div class="list ">
		
		
		<div class="item form">
			
			<div class="text">
				<p>Edição de Personagem</p>

			</div>
	
				<form action="{{ url('/character/update/'.$character->id) }}" method="post" enctype="multipart/form-data">
					 {!! csrf_field() !!}
					 <div class="input_group">
					 	<input type="text" name="name" placeholder="Nome" value="{{$character->name}}">
					 </div>
					 <div class="input_group">
					 	<input type="text" name="description" placeholder="Descrição" value="{{$character->description}}">
					 </div>
					 <div class="input_group">
					 	<input type="file" name="image">
					 </div>
					 <div class="input_group">
					 	<input type="submit" value="Salvar">
					 </div>
					
				</form>
			
			
		</div>
		

	</div>
</div>

@section('script')
	
@stop


@stop
