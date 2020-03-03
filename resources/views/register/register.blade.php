<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/eventually/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Register</h1>
			</header>

		<!-- Signup Form -->
			<form id="signup-form" method="post" action="/login">
				{{ csrf_field() }}
				<input type="text" name="nisn" id="nisn" placeholder="NISN" />
				<input type="text" name="nama" id="nama" placeholder="Nama" />
				<input type="text" name="kelas" id="kelas" placeholder="Kelas" />
				<input type="password" name="password" id="password" placeholder="Password" />
				
				<input type="submit" value="Register" />
			</form>
			@if ($errors->has('nisn'))
				<p style="color:red">{{$errors->first('nisn')}}</p>
			@endif
			@if ($errors->has('nama'))
				<p style="color:red">{{$errors->first('nama')}}</p>
			@endif
			@if ($errors->has('kelas'))
				<p style="color:red">{{$errors->first('kelas')}}</p>
			@endif
			@if ($errors->has('password'))
				<p style="color:red">{{$errors->first('password')}}</p>
			@endif

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="/eventually/assets/js/main.js"></script>

	</body>
</html>