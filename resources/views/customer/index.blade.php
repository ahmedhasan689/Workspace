<h1>
    {{-- Welcome {{ auth()->guard('guardName') }} --}}
</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    {{-- @dd(guard('guardName')) --}}
    <button type="submit">
        logout
    </button>
</form>
