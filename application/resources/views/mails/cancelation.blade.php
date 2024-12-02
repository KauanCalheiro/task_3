<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelamento de Inscrição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #777;
        }
        .button {
            background-color: #FF6347;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .button:hover {
            background-color: #FF4500;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Confirmação de Cancelamento</h2>
        </div>
        
        <div class="content">
            <p>Olá, <strong>{{ $name }}</strong>,</p>

            <p>Informamos que sua inscrição no evento <strong>{{ $eventName }}</strong> foi <strong>cancelada com sucesso</strong>.</p>
            
            <p>Se você tiver alguma dúvida ou precisar de mais informações, não hesite em nos contatar.</p>
            
            <p>Obrigado por participar do nosso evento e esperamos vê-lo em futuras edições!</p>
            
            <p>Atenciosamente,</p>
            <p><strong>Equipe de Eventos</strong></p>
        </div>

        <div class="footer">
            <p>Se você não solicitou esse cancelamento, por favor, entre em contato com nosso suporte.</p>
        </div>
    </div>

</body>
</html>
