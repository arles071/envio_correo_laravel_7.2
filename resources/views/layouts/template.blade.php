<!doctype html>
<html lang="en" dir="ltr">
	<head>
        @include('includes.head')
	</head>
	<body>
        @include('includes.navbar')
        <div class="container">
            @yield('content')
        </div>
        @include('includes.footer')
           
	</body>
    @include('includes.scripts')
    @yield('scriptsown')
</html>