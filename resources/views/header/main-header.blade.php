<div class="main-header content-container">
    <a href="{{ route('advisor.dashboard') }}">Kredium</a>
    @if(\Illuminate\Support\Facades\Auth::check())
        @include('header.logout-form')
    @endif
</div>
