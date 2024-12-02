<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Presença</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }
        .email-header h1 {
            color: #0056b3;
            font-size: 24px;
        }
        .email-body {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Confirmação de Presença</h1>
        </div>
        <div class="email-body">
            <p>Olá <strong>{{$name}}</strong>,</p>
            <p>Estamos felizes em confirmar sua presença no nosso evento <strong>$eventName</strong>.</p>
            <p>O evento ocorrerá no dia {{$eventDate}}</strong>, no local <strong>{{$eventLocation}}</strong>.</p>
            <p>Por favor, clique no botão abaixo caso precise atualizar sua inscrição ou verificar mais detalhes.</p>


        <div class="email-footer">
            <p>Se você tiver alguma dúvida, não hesite em nos contatar através do e-mail <strong>suporte@eventos.com</strong>.</p>
            <p>Obrigado e esperamos vê-lo em breve!</p>
        </div>
    </div>
</body>
</html>
