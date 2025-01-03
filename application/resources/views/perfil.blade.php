@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card_suave">
                <div class="card">
                    <h1>Meu perfil</h1>
                    <form action="{{ route('perfil.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome completo" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o e-mail" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="dt_birth" class="form-label">Data de Nascimento</label>
                            <input type="date" id="dt_birth" name="dt_birth" class="form-control" value="{{ old('dt_birth', $user->dt_birth) }}">
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" id="cpf" name="cpf"  maxlength="11" class="form-control" placeholder="Digite o CPF" value="{{ old('cpf', $user->cpf) }}">
                        </div>
                        <div class="mb-3">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" id="rg"  maxlength="9" name="rg" class="form-control" placeholder="Digite o RG" value="{{ old('rg', $user->rg) }}">
                        </div>            

                        <div class="mb-4 text-center">
                            <button type="submit" class="btn-custom">Atualizar</button>
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
