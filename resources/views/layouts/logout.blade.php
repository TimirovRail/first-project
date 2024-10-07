<header>
    <nav>
        <ul>
            <li><a href="{{ route('product.index') }}">Товары</a></li>
            @if(Auth::check())
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Выйти</button>
                    </form>
                </li>
            @endif
        </ul>
    </nav>
</header>