@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card_suave">
                <div class="card">
                    <h1>Validar certificado!</h1>
                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Código do certificado</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome completo">
                        </div>

                        <div class="mb-4 text-center">
                            <button type="submit" class="btn btn-primary">Validar</button>
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
