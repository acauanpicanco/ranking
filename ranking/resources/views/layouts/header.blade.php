<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

	<title>@yield('title', "Ranking")</title>
	<base href="{{ URL::to('/') }}">	

	
	


@section('metatags')
	<!-- SEO META TAGS -->
	<meta name="description" content="Ranking" />
	<meta name="keywords" content="" />
	<meta name="author" content="Acauan Picanço" />
@show

@section('facebooktags')
	<!-- FACEBOOK META TAGS -->
	<meta property="og:image" content="{{ URL::asset('assets/img/favicon-g.png') }}"/>
	<meta property="og:title" content="Ranking"/>
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta property="og:site_name" content="Ranking"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="Ranking" />
	

@show
	<link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700|Saira:200,300,400,500,600,700,800|Saira+Condensed:300,400,500,700,800|Saira+Extra+Condensed:400,600,800" rel="stylesheet">
	
	
		
		<link rel="stylesheet" href="{{ URL::asset('assets/css/variaveis-cor.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">	

	@yield('style')


		

	


	

	<!-- endbuild -->

	<!--[if lte IE 9]>
	<link href="dist/assets/css/ie.css" rel="stylesheet" type="text/css">
    <script dist="dist/assets/js/vendor/html5shiv.js"></script>
	<![endif]-->


</head>
<body>



<header>		
</header>