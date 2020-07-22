@extends('layouts.app')
@section('content')

    <div class="col-md-12">
        @isset($project)
            <h1>@lang('main.edit_project')<b> "{{ $project->name }}"</b></h1>
        @else
            <h1>@lang('main.add_project')</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($project)
              action="{{ route('projects.update', $project) }}"
              @else
              action="{{ route('projects.store') }}"
              @endisset
        >
            <div>
                @isset($project)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('main.name'): </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($project){{ $project->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">@lang('main.description'): </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" id="description"
                               value="@isset($project){{ $project->description }}@endisset">
                    </div>
                </div>
                <br>

                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">@lang('main.deadline'): </label>
                            <div class="col-sm-6">
                        <input class="date form-control" type="text" name="deadline" value="@isset($project){{ $project->deadline }} @endisset">
                            </div>
                    </div>

                    <script type="text/javascript">

                        $('.date').datepicker({

                            format: 'yyyy-mm-dd',


                        });

                    </script>

                    <button class="btn btn-success">@lang('main.save')</button>
            </div>
        </form>
    </div>
@endsection
