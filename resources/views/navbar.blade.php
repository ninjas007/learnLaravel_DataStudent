<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{url('/')}}">Laravel 5.6</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				@if(!empty($halaman) && $halaman == 'siswa')
				<li class="active">
					<a class="nav-link" href="{{url('siswa')}}"><strong>Siswa</strong></a>
				</li>
				@else
				<li class="nav-item"><a class="nav-link" href="{{url('siswa')}}">Siswa</a></li>
				@endif
				
				@if(!empty($halaman) && $halaman == 'about')
				<li class="active">
					<a class="nav-link" href="{{url('about')}}"><strong>About</strong></a>
				</li>
				@else
				<li class="nav-item"><a class="nav-link" href="{{url('about')}}">About</a></li>
				@endif

				@if(!empty($halaman) && $halaman == 'kelas')
				<li class="active">
					<a class="nav-link" href="{{url('kelas')}}"><strong>Kelas</strong></a>
				</li>
				@else
				<li class="nav-item"><a class="nav-link" href="{{url('kelas')}}">Kelas</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>