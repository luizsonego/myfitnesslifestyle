<html>
        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

                <!-- Optional theme -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                
                <script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>


		<!-- bxSlider CSS file -->
		<link href="/bx-slider/jquery.bxslider.css" rel="stylesheet" />
		

		<link rel="stylesheet" href="/css/style.css" />

		<!-- bxSlider Javascript file -->
		<script src="/bx-slider/jquery.bxslider.min.js"></script>

		<script src="https://use.fontawesome.com/f0e0b3745e.js"></script>
		
		<script src="http://maps.googleapis.com/maps/api/js"></script>	

		<!-- <link rel="stylesheet" href="/css/style.css" />-->
                <title>@yield('title')</title>
                @yield('meta')
                
        </head>
        <body>
                @yield('body')
		@yield('js')
        </body>
</html>
