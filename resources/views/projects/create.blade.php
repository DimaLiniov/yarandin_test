
@extends('layouts.app')
@section('content')

    <div class="col-md-12">
            <h1>Создать проект </h1>
        <form method="POST" enctype="multipart/form-data"
            {{--@isset($product)
            action="{{ route('products.update', $product) }}"
            @else
            action="{{ route('products.store') }}"
          @endisset--}}
        >
            <div>

                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" id="description"
                               value="">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Дэдлайн: </label>
                    <div class="col-sm-6">
                        <input class="date form-control" type="text" value="">
                    </div>
                </div>

                <script type="text/javascript">

                    $('.date').datepicker({

                        format: 'yyyy-mm-dd',


                    });

                </script>

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
