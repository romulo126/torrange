@extends('Templade.defaultGust')
@section('head')
@endsection
@section('content')
<main class="form-signin">
        
  <form action="{{ route('web.login.post') }}" method="POST">
    @csrf
    <img class="mb-4" src="{{ asset('storage/Logo/torange.png') }}" alt="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <!-- Lista todos os erros -->
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="form-floating">
      <input type="text" class="form-control" name="user" id="floatingInput" placeholder="torange">
      <label for="floatingInput">User address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
  </form>
</main>
@endsection