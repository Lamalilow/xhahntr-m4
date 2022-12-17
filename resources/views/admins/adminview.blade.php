@extends('welcome')
@section('title', 'Панель админа')
@section('content')
    <div class="container">
        <a href="{{ route('addProd') }}">Добавить продукт</a>
        <br>
        <a href="{{ route('addCateg') }}">Добавить категорию</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Фото</th>
                            <th>Название</th>
                            <th>Производитель</th>
                            <th>Цена</th>
                            <th>Категория</th>
                            <th>Статус</th>
                            <th>Изменение</th>
                            <th>Удаление</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <img style="max-width: 100px;" src="{{asset('storage/app/public/'.$product->photo)}}" alt="картинка поста">

                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->manufacturer}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category()}}</td>
                            <td>{{$product->status()}}</td>
                            <td><a href="">Удалить</a></td>
                            <td><a href="">Изменить</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col"></div>

        </div>
    </div>
@endsection
