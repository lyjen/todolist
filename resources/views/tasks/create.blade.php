@extends('layouts.main')

@section('title', 'Create Task')

@section('content')

	<div class="row"> 
		<div class="col-sm-12">
			<h1>Create Task</h1>
			{!! Form::open(['route' => 'task.store', 'method' => 'STORE']) !!}
			@component('components.taskForm')
			@endcomponent
			{!! Form::close() !!}
		</div>
	</div>

@endsection

