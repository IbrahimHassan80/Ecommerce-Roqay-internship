<div>
<h3 class="text-center">Add New Task</h3>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" wire:model.lazy="title" class="form-control">
        @error('title')<div class="alert alert-danger">{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <button wire:click.prevent="addTask" class="btn btn-primary btn-block">Add</button>
    </div>
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
</div>
