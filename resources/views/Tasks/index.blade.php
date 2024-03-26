@extends('tasks.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New task
                </div>
                <div class="float-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf



                    <div class="mb-3 row">
                        <label for="tname" class="col-md-4 col-form-label text-md-end text-start">T Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('tname') is-invalid @enderror" id="tname" name="tname" value="{{ old('tname') }}">
                            @if ($errors->has('tname'))
                                <span class="text-danger">{{ $errors->first('tname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="temail" class="col-md-4 col-form-label text-md-end text-start">T email</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('temail') is-invalid @enderror" id="temail" name="temail" value="{{ old('temail') }}">
                            @if ($errors->has('temail'))
                                <span class="text-danger">{{ $errors->first('temail') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="task" class="col-md-4 col-form-label text-md-end text-start">Task</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control @error('task') is-invalid @enderror" id="task" name="task" value="{{ old('task') }}">
                            @if ($errors->has('task'))
                                <span class="text-danger">{{ $errors->first('task') }}</span>
                            @endif
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add task">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection