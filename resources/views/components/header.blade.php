<div class="container">
    <nav class="navbar navbar-expand-lg bg-light p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('/') }}">
                <img style="width: 200px; " src="/resources/images/logo.png" alt="логотип">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Заказы</a>
                    </li>
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">Панель админа</a>
                            </li>
                        @endif
                    @endauth


                </ul>
                @guest()
                    <div class="d-flex flex-row">
                        <div class="btn btn-outline-primary">
                            <a class="nav-link btn-outline-primary" href="{{route('login')}}">Авторизация</a>
                        </div>
                        <div class="ms-3 btn btn-primary">
                            <a class="nav-link" href="{{route('reg')}}">Регистрация</a>
                        </div>
                    </div>
                @endguest
                @auth()
                    <div class="d-flex flex-row">
                        <div class="btn">
                            <a class="nav-link btn-outline-primary" href="{{ route('cartView') }}">Корзина</a>
                        </div>
                        <div class="btn">
                            <a class="nav-link btn-outline-primary" href="">Аккаунт</a>
                        </div>
                        <div class=" ms-3 btn btn-outline-primary">
                            <a class="nav-link btn-outline-primary" href="{{ route('logout') }}">Выход</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>
