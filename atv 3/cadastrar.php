<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <form method="POST">

        <div class="form-group">
            <label for="exampleInpuyName">Nome de Usuario</label>
            <input type="text" name="nome" class="form-control" id="exampleInpuyName" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" name="senha" class="form-control" id="exampleInputPassword1" required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword2">Confirmar Senha</label>
            <input type="password" name="confirmarSenha" class="form-control" id="exampleInputPassword2" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button><br>
        <a href="index.php">Voltar para tela de login</a>
    </form>

</body>

</html>