@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar Usuário</h1>

    <div class="card">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome do evento" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <input type="text" id="description" name="description" class="form-control" placeholder="Descricao" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Local</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Qual o local do evento?" required>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacidade</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dt_init" class="form-label">Data de Inicio</label>
                    <input type="datetime-local" id="dt_init" name="dt_init" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dt_end" class="form-label">Data de Fim</label>
                    <input type="datetime-local" id="dt_end" name="dt_end" class="form-control" required>
                </div>

                <div class="mb-4 text-center">
                    <button type="submit" class="btn-custom">Criar Evento</button>
                </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<style>
    body {
        background-color: #f4f7fc;
        font-family: Arial, sans-serif;
    }
    .container {
        margin-top: 50px;
    }
    h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #343a40;
        margin-bottom: 20px;
    }
    .card {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
    .form-control {
        border-radius: 5px;
        font-size: 1rem;
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        font-size: 1.1rem;
        border-radius: 5px;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        color: white;
    }
</style>

@endsection
