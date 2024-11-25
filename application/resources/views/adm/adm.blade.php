@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Lista de Inscrições</h1>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de uma transação -->
                <tr>
                    <td>#12345</td>
                    <td>24/11/2024</td>
                    <td>Compra no supermercado</td>
                    <td>R$ 150,00</td>
                    <td><span class="status completed">Concluída</span></td>
                </tr>
                <tr>
                    <td>#12346</td>
                    <td>23/11/2024</td>
                    <td>Assinatura de software</td>
                    <td>R$ 299,99</td>
                    <td><span class="status pending">Pendente</span></td>
                </tr>
                <tr>
                    <td>#12347</td>
                    <td>22/11/2024</td>
                    <td>Transferência bancária</td>
                    <td>R$ 500,00</td>
                    <td><span class="status failed">Falhou</span></td>
                </tr>
                <tr>
                    <td>#12348</td>
                    <td>21/11/2024</td>
                    <td>Compra de eletrônicos</td>
                    <td>R$ 1.200,00</td>
                    <td><span class="status in-progress">Em Progresso</span></td>
                </tr>
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
        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            text-transform: capitalize;
        }
        .status.completed {
            background-color: #28a745;
            color: white;
        }
        .status.pending {
            background-color: #ffc107;
            color: white;
        }
        .status.failed {
            background-color: #dc3545;
            color: white;
        }
        .status.in-progress {
            background-color: #17a2b8;
            color: white;
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