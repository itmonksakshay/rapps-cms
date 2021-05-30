<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<style>
			a[disabled] { 
				display:none;
				pointer-events: none;
			}
			
			
				.div-center {
				  width: 400px;
				  height: 200px;
				  background-color: #fff;
				  position: absolute;
				  left: 0;
				  right: 0;
				  top: 20;
				  bottom:20;
				  margin: auto;
				  max-width: 100%;
				  max-height: 100%;
				  overflow: auto;
				  padding: 1em 2em;
				  border-bottom: 2px solid #ccc;
				  display: table;
				}

		</style>
    </head>
    <body>
        <div id="root">
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
