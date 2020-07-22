@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="col-md-12">

                            <h3>@lang('main.list_of_tasks_for_the_project') № {{$project_id}}</h3>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        № @lang('main.of_task')
                                    </th>
                                    <th>
                                        @lang('main.name')
                                    </th>
                                    <th>
                                        @lang('main.status')
                                    </th>
                                    <th>
                                        @lang('main.actions')
                                    </th>
                                </tr>

                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id}}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>
                                            <div class="btn-group" role="group">

                                                <form action="{{ route('task.destroy', $task) }}" method="POST">
                                                <a class="btn btn-success" type="button"
                                                   href="{{ route('task.show', $task) }}">@lang('main.open')</a>
                                                <a class="btn btn-warning" type="button"
                                                   href="{{ route('task.edit', $task) }}">@lang('main.edit')</a>
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="@lang('main.delete')"></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-success" type="button" href="{{ route('task.create') }}">@lang('main.add_task')</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
