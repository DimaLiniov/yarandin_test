
@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h1>{{ $project->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $project->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $project->name }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $project->description }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $project->deadline }}</td>
            </tr>
            {{--<tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($product->image)}}" height="240px"></td>
            </tr>--}}
            {{--<tr>
                <td>Категория</td>
                <td>{{ $project->category->name }}</td>
            </tr>--}}
            </tbody>
        </table>
    </div>
@endsection

