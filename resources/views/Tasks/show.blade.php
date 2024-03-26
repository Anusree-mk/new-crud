@extends('tasks.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit task
                </div>
                <div class="float-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="post">
                    @csrf
                    @method("PUT")


                    
                    <div class="mb-3 row">
                        <label for="tname" class="col-md-4 col-form-label text-md-end text-start">T name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('tname') is-invalid @enderror" id="tname" name="tname" value="{{ $task->tname }}">
                            @if ($errors->has('tname'))
                                <span class="text-danger">{{ $errors->first('tname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="temail" class="col-md-4 col-form-label text-md-end text-start">T email</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('temail') is-invalid @enderror" id="temail" name="temail" value="{{ $task->temail }}">
                            @if ($errors->has('temail'))
                                <span class="text-danger">{{ $errors->first('temail') }}</span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <label for="task" class="col-md-4 col-form-label text-md-end text-start">Task</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('task') is-invalid @enderror" id="task" name="task">{{ $task->task }}</textarea>
                            @if ($errors->has('task'))
                                <span class="text-danger">{{ $errors->first('task') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection