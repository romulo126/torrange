@extends('Templade.defaultGust')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<main class="form-signin">
        
  <form  id="loginForm">
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
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="torange@torrange.com">
      <label for="floatingInput">Email address</label>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            fetch(`{{ route('api.login') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.access_token) {
                    document.cookie = `token=${encodeURIComponent(data.access_token)}|${data.user.id}; path=/; Secure; SameSite=Lax`;
                    window.location.href = `{{ route('web.index') }}`; // Defina o caminho de redirecionamento
                    // console.log(data);
                } else {
                    // Lidar com o erro
                    console.error('Erro na autenticação');
                }
            })
            .catch(error => console.error('Erro:', error));
        });
    });
</script>
@endsection