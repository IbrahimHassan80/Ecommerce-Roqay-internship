@extends('admin.layout.index')
@section('title','Add Tasks')
@section('content')

<div class="col-md-6">
@livewire('addtasks')
</div>

<div class="col-md-8 p-4">
    @livewire('tasks')
</div>

@stop