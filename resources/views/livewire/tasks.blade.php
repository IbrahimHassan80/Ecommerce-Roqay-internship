<div class="col-md-7">
  
    <h3 class="text-center">Tasks ( {{$counttask}} )</h3>
    <table class="table bg-white ">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach($task as $tasks)
            <tr>
                <td scope="row">{{$tasks->id}}</td>
                <td>{{$tasks->title}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$task->links()}}
</div>
