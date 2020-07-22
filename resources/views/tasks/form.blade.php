
@extends('layouts.app')
@section('content')

    <div class="col-md-12">
        @isset($task)
            <h1>@lang('main.edit_task') № "<b>{{ $task->id }}"</b></h1>
        @else
            <h1>@lang('main.add_task')</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
            @isset($task)
            action="{{ route('task.update', $task) }}"
            @else
            action="{{ route('task.store') }}"
          @endisset
        >
            <div>
                @isset($task)
                    @method('PUT')
                @endisset
                @csrf
                    <div class="input-group row">
                        <label for="project_id" class="col-sm-2 col-form-label">№ @lang('main.of_project'): </label>
                        <div class="col-sm-6">
                            <select name="project_id" id="project_id" class="form-control">
                                @foreach($projects as $project)<option value="{{$project->id}}"
                                        @isset($project) @isset($task)
                                        @if($project->id == $task->project_id)selected
                                    @endif
                                    @endisset
                                    @endisset>{{$project->id}}
                                </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('main.name'): </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($task){{ $task->name }}@endisset">
                    </div>
                </div>
                <br>

                    <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">@lang('main.status'): </label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                                <option value="set"
                                        @isset($task)
                                        @if($task->status == 'set')selected
                                    @endif
                                    @endisset>set
                                </option>
                                <option value="work"
                                    @isset($task)
                                    @if($task->status == 'work')selected
                                @endif
                                @endisset>work
                            </option>
                            <option value="done"
                                    @isset($task)
                                    @if($task->status == 'done')selected
                                @endif
                                @endisset>done
                            </option>
                        </select>
                    </div>
            </div>
                    <br>
                <div class="input-group row">
                    <label for="image" class=" col-sm-2 col-form-label">@lang('main.download'): </label>
                    <div class="col-sm-2">
                        <input class="date form-control" type="file" name="file" id="file" value="">
                    </div>
                </div>

                <button class="btn btn-success">@lang('main.save')</button>
            </div>
        </form>
    </div>
@endsection
