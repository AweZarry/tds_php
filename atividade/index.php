<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Formulario</h1>

        <form action="conexão.php" method="POST">

            <div class="form-inform">

                <label for="">Nome de usuario</label>
                <input type="text" name="nome" placeholder="Digite o nome de Usuario" required>

                <label for="">Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required>

                <label for="">Aparelho com problema</label>
                <input type="text" name="aparelho" placeholder="Digite o modelo do aparelho! ACEITAMOS APENAS COMPUTADORES/NOTEBOOKS" pattern="Computador|Notebook" required>

                    <label for="">Problema do Aparelho</label>
                    <input type="text" name="problema" id="problems" placeholder="Digite o Problema que esta ocorrendo no aparelho">

                    <div class="form-botao">

                        <button type="submit" name="enviar">Enviar</button>

                </div>
            </div>

        </form>
    </div>
</body>

</html>