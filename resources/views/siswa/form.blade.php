@csrf

@if(isset($siswa))
	{!! Form::hidden('id', $siswa->id) !!}
@endif

@if($errors->any())
	<div class="form-group {{$errors->has('nisn') ? 'has-error' : 'has-success'}}">
@else
	<div class="form-group">
@endif
	{!! Form::label('nisn', 'NISN*:',['class' => 'form-control-label'])!!}
	{!! Form::text('nisn', null, ['class' => 'form-control']) !!}
	@if($errors->has('nisn'))
	<span class="help-block text-danger">{{ $errors->first('nisn') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('nama_siswa', 'Nama Siswa*:',['class' => 'form-control-label'])!!}
	{!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
	@if($errors->has('nama_siswa'))
	<span class="help-block text-danger">{{ $errors->first('nama_siswa') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir*:',['class' => 'form-control-label'])!!}
	{!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
	@if($errors->has('tanggal_lahir'))
	<span class="help-block text-danger">{{ $errors->first('tanggal_lahir') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('jenis_kelamin', 'Jenis Kelamin*:',['class' => 'form-control-label'])!!}
	<div class="radio">
		<label>
			{!! Form::radio('jenis_kelamin', 'L')!!} Laki-laki
		</label>
	</div>
	<div class="radio">
		<label>
			{!! Form::radio('jenis_kelamin', 'P')!!} Perempuan
		</label>
	</div>
	@if($errors->has('jenis_kelamin'))
	<span class="help-block text-danger">{{ $errors->first('jenis_kelamin') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('nomor_telepon', 'Telepon*:', ['class' => 'form-control-label'] )!!}
	{!! Form::text('nomor_telepon', null, ['class' => 'form-control'])!!}
	@if($errors->has('nomor_telepon'))
	<span class="help-block text-danger">{{ $errors->first('nomor_telepon') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('id_kelas', 'Kelas*:', ['class' => 'form-control-label'] )!!}
	@if(count($list_kelas) > 0)
		{!! Form::select('id_kelas', $list_kelas, null, ['class' => 'form-control' , 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas'])!!}
	@else
		<p>Tidak ada pilihan kelas, buat dulu ya...!</p>
	@endif
	@if($errors->has('id_kelas'))
	<span class="help-block text-danger">{{ $errors->first('id_kelas') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::label('hobi_siswa', 'Hobi:', ['class' => 'form-control-label']) !!}
	@if(count($list_hobi) > 0)
		@foreach($list_hobi as $key => $value)
			<div class="checkbox">
				<label>{!! Form::checkbox('hobi_siswa[]', $key, null) !!}{{$value}}</label>
			</div>
		@endforeach
	@else
		<p>Tidak ada pilihan Hobi, buat dulu ya...!</p>
	@endif
</div>
<div class="form-group">
	{!! Form::label('foto', 'Foto:') !!}
	{!! Form::file('foto') !!}
	@if($errors->has('foto'))
	<span class="help-block">{{ $errors->first('foto') }}</span>
	@endif
</div>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control'])!!}
</div>