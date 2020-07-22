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
                            <h3>@lang('main.list_of_users')</h3>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        @lang('main.Name')
                                    </th>
                                    <th>
                                        @lang('main.mail')
                                    </th>
                                    <th>
                                        @lang('main.registration_day')
                                    </th>
                                </tr>

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
