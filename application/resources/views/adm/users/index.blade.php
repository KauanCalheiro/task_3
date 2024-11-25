@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Inscrições</h1>

    <!-- Botão para adicionar um novo usuário -->
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Adicionar Novo Usuário</a>

    <!-- Tabela com a listagem de usuários -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <!-- Botão Editar -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <!-- Botão Deletar -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<style>
    body {
        background-color: #f4f7fc;
        font-family: 'Arial', sans-serif;
    }
    .container {
        margin-top: 30px;
    }
    h1 {
        font-size: 2.5rem;
        color: #343a40;
        margin-bottom: 20px;
        text-align: center;
    }
    .table {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        padding: 15px;
        vertical-align: middle;
    }
    .table th {
        background-color: #6c757d;
        color: white;
        font-weight: bold;
    }
    .table td {
        color: #495057;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
        cursor: pointer;
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 1rem;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        color: white;
    }
</style>
@endsection
