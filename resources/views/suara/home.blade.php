{{-- @include('suara.navbar') --}}

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>E-VOTING SMA N 2 PATI</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
		<noscript><link rel="stylesheet" href="/phantom/assets /css/noscript.css" /></noscript>
		<link rel="stylesheet" href="{{asset('/phantom/assets/css/main.css')}}" />
		<style>
			header {
				position: sticky;
				top: 0;
				z-index: 5;
			}
		</style>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<img src="/gambar/smanda.png" alt="logo" class="logo" style="width:200px; height:auto"/>

							<!-- Nav -->
								<nav class="">
									<ul>
										
										<li>
											<form action="/logout" method="POST" style="display:inline">
												{{ csrf_field() }}
												<a href="javascript:;" onclick="parentNode.submit();">
												<style>a:link { 
													text-decoration: none; } 
												</style> Log Out</a>
											</form>
										</li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							
								<h1>Selamat Datang di Sistem E-Voting SMAN 2 Pati </h1>
								<p>Sistem e-voting ini bertujuan untuk memudahkan dalam pemilihan ketua OSIS di SMA N 2 Pati</p>
							
							<section class="tiles">
								@foreach ($paslon as $key => $item)
									<article class="style1">
										<span class="image">
											<img src="/gambar/{{$item->foto}}" alt="" style="width: 100%; height: 300px;"/>
										</span>
										<a>
											<h2 style="color:white">{{$item->nama_ketos}}-{{$item->nama_waketos}}</h2>
											<div class="content">
												<button data-toggle="modal" data-target="#myModal{{isset($item->visimisi) ? $item->visimisi->id : ""}}">Visi Misi</button>
												<form action="/submit-hasil" id="voteform_{{$key}}" style="display:inline" method="POST">
													{{ csrf_field() }}
													<input type="hidden" name="voter" value="{{Auth::guard('voter')->id()}}">
													<input type="hidden" name="paslon" value="{{$item->id}}">
													<button type="button" class="sbmt" data-toggle="modal" data-target="#myVote" data-key="{{$key}}">Vote</button>
												</form>
											</div>
										</a>
									</article>
									<!-- The Modal -->
									<div class="modal" id="myModal{{isset($item->visimisi) ? $item->visimisi->id : ""}}">
										<div class="modal-dialog">
											<div class="modal-content">
									
											<!-- Modal Header -->
											<div class="modal-header">
												<h3 class="modal-title">Visi Misi Pasangan Calon</h3>
											{{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
											</div>
									
											<!-- Modal body -->
											<div class="modal-body">
												<h4>Visi</h4>
												<p>{!! isset($item->visimisi) ? $item->visimisi->visi : "TIDAK ADA VISI" !!}</p>
												<h4>Misi</h4>
												<p>{!! isset($item->visimisi) ? $item->visimisi->misi : "TIDAK ADA MISI" !!}</p>
											
											</div>
							
										</div>
										</div>
									</div>
									@endforeach
									<div class="modal" id="myVote">
										<div class="modal-dialog">
											<div class="modal-content">
									
										
									
											<!-- Modal body -->
											<div class="modal-body">
												<h3>Are you sure?</h3>
												
											
											</div>
											<div class="modal-footer">
												<button type="submit" class="vote">Yes</button>
												<button type="button" data-dismiss="modal">Cancel</button>

											</div>
							
										</div>
										</div>
							</section>
						</div>
					</div>
					
					
				
					{{-- End Modal	 --}}

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send" class="primary" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="/phantom/assets/js/jquery.min.js"></script>
			<script src="/phantom/assets/js/browser.min.js"></script>
			<script src="/phantom/assets/js/breakpoints.min.js"></script>
			<script src="/phantom/assets/js/util.js"></script>
			<script src="/phantom/assets/js/main.js"></script>
	<script
	src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
	integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	crossorigin="anonymous"></script>
	<script>
	// 	<div id="destination"></div>
	// 	$.ajax({
    //      type:"GET",
        
    //      success : function(results) {
    //          var $table = $('<table></table>');
    //          $('#destination').html('');

    //          for(var i=0;i<=results.length;i++) {
    //              $table.append('<tr><td>Visi</td><td>'+results[i].visi+'</td></tr>');
    //              $table.append('<tr><td>Misi</td><td>'+results[i].misi+'</td></tr>');
    //          }
    //          $('#destination').append($table);
    //      }
    // });
	$(document).ready(function(){
		let key = null;
		$('.sbmt').on('click', function(){
			key = $(this).data('key');
		})
		
		$(".vote").on('click', function(){
			$('#voteform_'+key)[0].submit()
		})
	}) 
	</script>
	</body>
</html>