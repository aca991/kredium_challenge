<div class="form-container">
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="@yield('form-action')" method="@yield('form-method')">
        <div class="form-inner">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            @yield('form-fields')
        </div>
    </form>
</div>
