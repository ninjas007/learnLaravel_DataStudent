@extends('template')

@section('main')
	<div id="siswa">
		<h2>Edit Siswa</h2>
{{-- @include('errors.form_error_list') --}}
		{!! Form::model($siswa, ['method' => 'PATCH' , 'action' => ['SiswaController@update', $siswa->id]]) !!}
@include('siswa.form', ['submitButtonText' => 'Update Data Siswa'])
		{!! Form::close() !!}
	</div>

@stop

@section('footer')
	@include('footer')
@stop