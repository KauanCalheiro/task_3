<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição Confirmada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #27ae60;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 30px;
        }

        .footer a {
            color: #27ae60;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscrição Confirmada!</h1>
        <p>Olá {{ $name }},</p>
        <p>Parabéns! Sua inscrição para o evento foi confirmada com sucesso. Estamos ansiosos para vê-lo no evento!</p>

        <p><strong>Detalhes do evento:</strong></p>
        <ul>
            <li><strong>Nome do evento:</strong> {{ $eventName }}</li>
            <li><strong>Data do evento:</strong> {{ $eventDate }}</li>
            <li><strong>Local:</strong> {{ $eventLocation }}</li>
        </ul>

        <p>Você pode acessar mais informações sobre o evento e confirmar sua participação na nossa plataforma a qualquer momento.</p>

        <p>Se tiver alguma dúvida, não hesite em nos contatar.</p>

        <p style="text-align: center;">
            <a href="https://ichef.bbci.co.uk/ace/ws/640/amz/worldservice/live/assets/images/2015/09/26/150926165742__85730600_monkey2.jpg.webp" class="cta-button">Acessar Detalhes do Evento</a>
        </p>

        <div class="footer">
            <p>Atenciosamente,</p>
            <p><strong>Equipe do Evento</strong></p>
            <p>Se você não reconhece esta inscrição ou acha que houve um erro, entre em contato conosco.</p>
            <p><a href="mailto:suporte@eventos.com">suporte@eventos.com</a></p>
        </div>
    </div>
</body>
</html>
