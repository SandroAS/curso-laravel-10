<div class="alert aler-danger">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    {{ $slot }}
</div>
