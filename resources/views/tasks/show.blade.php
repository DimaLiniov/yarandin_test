
@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h1>@lang('main.task') № {{ $task->id }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    @lang('main.field')
                </th>
                <th>
                    @lang('main.value')
                </th>
            </tr>
            <tr>
                <td>№ @lang('main.of_project')</td>
                <td>{{ $task->project_id}}</td>
            </tr>
            <tr>
                <td>@lang('main.name')</td>
                <td>{{ $task->name }}</td>
            </tr>
            <tr>
                <td>@lang('main.status')</td>
                <td>{{ $task->status }}</td>
            </tr>
            <tr>
                <td>@lang('main.file')</td>
                <td>@isset($task->file)<a href="{{route('task.download', $task)}}" class="btn "> @lang('main.download') </a>
                    {{--<img src="{{ Storage::url($task->file) }}" height="25px">--}}
                    {{ Storage::url($task->file) }}
                    @endisset
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

