<?php

// inclui o arquivos de inicialização
require 'init.php';
// resgata variáveis do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//if (empty($email) || empty($password))
//{
//    ?>
<!--    <script>-->
<!--        alert('Informe email ou senha');-->
<!--        document.location.href = '../index.php';-->
<!--    </script>-->
<!--    --><?php
//    exit;
//}

// cria o hash da senha
//$passwordHash = make_hash($password);

$PDO = db_connect();
//$sql = "SELECT idAdministrador,setor_idSetor, nome, senha, email FROM administrador WHERE senha =:senha AND email = :email";
//$sql = "SELECT * FROM coord WHERE nome =:nome AND senha = :senha";
$sql = "SELECT * FROM coord INNER JOIN curso ON coord.curso_codigo = curso.codigo WHERE nome =:nome AND senha = :senha";


$stmt = $PDO->prepare($sql);

$stmt->bindParam(':senha', $password);
$stmt->bindParam(':nome', $nome);


$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0)
{
    //echo "Email ou senha incorretos";
    ?>
<script>
    alert('Usuário(a) ou senha incorretos');
    document.location.href = 'index.html';
</script>
<?php
    exit;
}

// pega o primeiro usuário
$user = $users[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['idcoord'];
$_SESSION['user_nome'] = $user['nome'];
$_SESSION['user_curso'] = $user['curso_codigo'];

header('Location: ../index.php');