@extends('welcome')
@section('title', 'Главная страница')
@section('content')
    <div class="block1">
        <div class="container">
            <div class="hero">
                <div class="hero_text_block">
                    <img class="hero_text_block--img"  src="/resources/images/4102.png" alt="косметика">
                    <div class="hero_text">
                        <h2>Ваша кожа будет сиять!</h2>
                        <p>Мы разработали 3-х ступенчатую
                            формулу вашей красоты, <br>
                            которую можно приобрести уже сейчас. </p>
                        <a href="">
                            <div class="btn btn-primary btn_black">Купить сейчас</div>
                        </a>
                    </div>
                </div>
               <img style=" width: 800px" src="/resources/images/Group%201.png" alt="девушка">


            </div>
        </div>
    </div>
    <div class="block2">
        <div class="container">
            <h2>Каталог</h2>
            <div class="block2_content">
                @foreach($products as $product)
                <div class="product">
                    <img style="max-width: 270px; min-height: 300px" src="{{asset('storage/app/public/'.$product->photo)}}" alt="картинка поста">
                    <p>{{ $product->name }}</p>
                    <p><b>{{ $product->price }} р.</b></p>
                    <div class="block2_content-btn">
                        <form action="{{ route('addCart', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn_black">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
