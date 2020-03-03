<!DOCTYPE HTML>
<!--
 Eventually by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
 <head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="/eventually/assets/css/main.css" />
 </head>
 <body class="is-preload">

  <!-- Header -->
   <header id="header">
    <h1>Login Admin</h1>
   </header>

  <!-- Signup Form -->
   <form id="signup-form" method="post" action="/login">
                {{ csrf_field() }}
    <input type="text" name="username" id="username" placeholder="Username" />
    
    <input type="password" name="password" id="password" placeholder="Password" />
    
    <input type="submit" value="Sign In" />
   </form>
   @if ($errors->has('username'))
    <p style="color:red">{{$errors->first('username')}}</p>
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