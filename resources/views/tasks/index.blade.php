@extends('layouts.main')

@section('title', 'Tasks')

@section('content')
	<div class="row">
		<div class="col-sm-12 mt-3">
		<a href="{{route('task.create')}}" class="btn btn-sm btn-success add-task">Add Task</a>
		</div>
	</div>
	@if($tasks->count() == 0)
		<p class="lead">No tasks available.</p>
	@else
		<h2>Task List</h2>
	@foreach($tasks as $task)
		<div class="row tasks">
			
			<div class="col-sm-8">
				<h4>{{ $task->name}}
					<small>{{$task->created_at}}</small>
				</h4>
				<p>{{ $task->description}}</p>
				
			
				
			</div>
			<div class="col-sm-4">
				<h5>Due Date: {{$task->due_date}}</h5>
				{!! Form::open(['route' => ['task.destroy', $task->id],'method' => 'DELETE']) !!}
				<a href="{{route('task.edit', $task->id)}}" class="btn btn-sm btn-primary">Edit</a>
				<button type="submit" class="btn btn-sm btn-danger">Delete</button>
				{!! Form::close() !!}
			</div>
		</div>
		<hr />
	@endforeach
	<div class="row justify-content-center">
		<div class="col-sm-6 text-center">
		{{ $tasks->links() }}
		</div>
	</div>
	@endif
@endsection

