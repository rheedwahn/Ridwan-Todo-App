@extends('layouts.layout')

@section('content')

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h3>Application Summary</h3>
    	</div>
    	<div class="panel-body">
    		<ul class="list-group">
			  <li class="list-group-item">All Todos <span class="badge">{{ $todo->count() }}</span></li>
			  <li class="list-group-item">Completed Todos <span class="badge">{{ $todocomplete->count() }}</span></li>
			  <li class="list-group-item">Uncompleted Todo <span class="badge">{{ $todouncompleted->count() }}</span></li>
			  <li class="list-group-item">Trashed Todo <span class="badge">{{ $todotrashed->count() }}</span></li>
			</ul>
    	</div>
    </div>

@stop