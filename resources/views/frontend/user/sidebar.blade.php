<div class="sidebar">
    <a class="@if(request()->is('user/dashboard')) {{'active'}} @endif" href="{{route('user.dashboard')}}">Dashboard</a>
    <a class="@if(request()->is('user/books')) {{'active'}} @endif" href="{{route('user.books')}}">Books</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Sign out')}}</a>
                    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
</div>