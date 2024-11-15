<div class="form-container @yield('form-container-additional-classes') ">
    <form action="@yield('form-action')" method="@yield('form-method')">
        <div class="form-inner">
            @csrf
            @yield('form-fields')
        </div>
    </form>
</div>
