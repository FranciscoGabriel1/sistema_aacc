<?php
// inclui o arquivos de inicialização
require 'init.php';
// resgata variáveis do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


// cria o hash da senha
//$passwordHash = make_hash($password);

$PDO = db_connect();//verifico se existe user e senha
$sql = "SELECT * FROM coord INNER JOIN curso ON coord.curso_codigo = curso.codigo WHERE nome =:nome AND senha = :senha";


$stmt = $PDO->prepare($sql);

$stmt->bindParam(':senha', $password);
$stmt->bindParam(':nome', $nome);


$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//se retornar alguma coisa, será maior que 0
if (count($users) <= 0)
{?>
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

header('Location: ../views/aacc/index.php');