@extends('tasks.layout')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
    @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Task List</div>
            <div class="card-body">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Task</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">T Name</th>
                        <th scope="col">T Email</th>
                        <th scope="col">Task Detail</th>
     
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $task->tname }}</td>
                            <td>{{ $task->temail }}</td>
                            <td>{{ $task->task }}</td>
                            <td>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('remove task?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>task not Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $tasks->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection