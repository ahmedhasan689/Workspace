<h1>
    Welcome {{ auth()->guard(session('guardName'))->user()->first_name }}
</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">
        logout
    </button>
</form>
