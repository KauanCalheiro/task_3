@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card_suave">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <img width="30" height="30" class="col-md-4 col-form-label text-md-end" style="width:40px" src="https://img.icons8.com/ios-glyphs/30/new-post.png" alt="new-post"/>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <img width="26" height="26" class="col-md-4 col-form-label text-md-end" src="https://img.icons8.com/metro/26/lock.png" style="width:40px" alt="lock"/>


                            <div class="col-md-10">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 mb-2 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))  
                            <div class="col-md-8" >
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            </div>
                            @endif
                        </div>

                        <div class="row mb-0">
                        <div class="col-md-10">
                            <p>Não está cadastrado? <a href="/register">Cadastrar</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    const body = document.body;

    body.addEventListener('mousemove', (e) => {
      const wave = document.createElement('div');
      wave.classList.add('wave');

      // Definindo o tamanho da onda
      const size = Math.random() * 100 + 100; // Tamanho aleatório da onda
      wave.style.width = `${size}px`;
      wave.style.height = `${size}px`;

      // Definindo a posição da onda no local do mouse
      const mouseX = e.clientX;
      const mouseY = e.clientY;
      wave.style.left = `${mouseX - size / 2}px`;
      wave.style.top = `${mouseY - size / 2}px`;

      // Adicionando o elemento ao corpo da página
      body.appendChild(wave);

      // Remover a onda após a animação
      setTimeout(() => {
        wave.remove();
      }, 600); // Tempo da animação
    });
  </script>
