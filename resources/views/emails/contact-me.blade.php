<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me Email</title>
</head>

<body>
    <h1>Nova mensagem de contato</h1>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>E-mail:</strong> {{ $data['email'] }}</p>
    <p><strong>Telefone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Mensagem:</strong> {{ $data['message'] }}</p>
</body>

</html>
