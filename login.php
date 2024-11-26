<!-- 2ª Digitação (Aqui) -->
 <?php
session_start();
include('conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } 
    else{
        $error = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container" style="width: 400px">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="usuario">Usúario</label>
            <input type="text" name="usuario" require><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" require><br>
            <button type="submit" style="margin-bottom: 30px;" >Entrar</button>
            <?php if(isset($error)) echo "<p class='message error'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>