@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="col-md-12">
                            <h3>@lang('main.project_list')</h3>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        @lang('main.name')
                                    </th>
                                    <th>
                                        @lang('main.description')
                                    </th>
                                    <th>
                                        @lang('main.deadline')
                                    </th>
                                    <th>
                                        @lang('main.actions')
                                    </th>
                                </tr>

                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->id}}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->deadline }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                                    <a class="btn btn-success" type="button"
                                                       href="{{ route('task_list', $project) }}">@lang('main.open')</a>
                                                    <a class="btn btn-warning" type="button"
                                                       href="{{ route('projects.edit', $project) }}">@lang('main.edit')</a>
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="@lang('main.delete')"></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-success" type="button" href="{{ route('projects.create', $project) }}">@lang('main.add_project')</a>
                            <a class="btn " type="button" href="{{ route('generate.project', $project) }}">@lang('main.generate_project')</a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
