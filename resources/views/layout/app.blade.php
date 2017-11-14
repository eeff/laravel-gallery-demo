<!DOCTYPE html>
<html>
<head>
	<title>PhotoShow</title>
	<meta charset="utf-8">
	<link href="https://cdn.bootcss.com/foundation/6.3.1/css/foundation.css" rel="stylesheet">
</head>
<body>
	@include('inc.topbar')
	<div class="row">
		@include('inc.messages')
		@yield('content')
	</div>
</body>
</html>