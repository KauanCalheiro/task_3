@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar Usuário</h1>

    <!-- Formulário de edição de usuário -->
    <div class="card">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Método PUT para atualizar o usuário -->

            <!-- Nome -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome completo" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite o e-mail" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Digite a nova senha (deixe em branco se não quiser alterar)">
            </div>

            <!-- Data de Nascimento -->
            <div class="mb-3">
                <label for="dt_birth" class="form-label">Data de Nascimento</label>
                <input type="date" id="dt_birth" name="dt_birth" class="form-control" value="{{ old('dt_birth', $user->dt_birth) }}" required>
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF" value="{{ old('cpf', $user->cpf) }}" required>
            </div>

            <!-- RG -->
            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" id="rg" name="rg" class="form-control" placeholder="Digite o RG" value="{{ old('rg', $user->rg) }}" required>
            </div>

            <!-- Botão de Enviar -->
            <div class="mb-4 text-center">
                <button type="submit" class="btn-custom">Salvar Alterações</button>
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
