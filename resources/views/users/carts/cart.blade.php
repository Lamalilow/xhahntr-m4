@extends('welcome')
@section('title', 'Корзина')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h3>Общая цена {{ $result }}</h3>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Удалить</th>

                        </tr>
                    </thead>
                    @foreach($carts as $cart)
                    <tbody>
                        <tr>
                            <td>
                                <img style="max-width: 100px;" src="{{asset('storage/app/public/'.$cart->photo())}}" alt="картинка товара">
                            </td>
                            <td>{{$cart->name()}}</td>
                            <td>{{$cart->price() }} р.</td>
                            <form action="{{ route('deleteCart', $cart) }}" method="POST">
                                @csrf
                                <td><button class="btn btn-primary" type="submit" >Удалить</button></td>
                            </form>


                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
