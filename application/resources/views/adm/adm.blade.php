@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Lista de Inscrições</h1>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Pessoa</th>
                    <th>Evento</th>
                    <th>Data Inscrição</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscriptions as $inscription)
                    <tr>
                        <td>{{ $inscription->id }}</td>
                        <td>{{ $inscription->ref_user}}</td>
                        <td>{{ $inscription->ref_event}}</td>
                        <td>{{ $inscription->dt_inscription }}</td>
                        <td>
                        @if (!$inscription->fl_presenca)
                            <form action="{{ route('presences.store', $inscription->id) }}" method="POST" style="width: 100%; text-align:center;">
                                @csrf
                                <button type="submit" style="background-color: #2192FF; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                                    Registrar presença
                                </button>
                            </form>
                            @else
                            <div style="width:100%; text-align:center;">
                                <button style="background-color: red; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                                    Presença registrada
                                </button>
                            </div>
                            @endif
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