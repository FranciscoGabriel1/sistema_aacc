<?php
function __autoload($class)
{
    require_once '../../domain/' . $class . '.php';
}

$aluno = new Aluno();
if (isset($_POST['cad_aluno'])):
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$curso = $_POST['curso'];
$coord = 5;

$aluno->setMatricula($matricula);
$aluno->setNome($nome);
$aluno->setCursoCodigo($curso);
$aluno->setCoord($coord);

if ($aluno->insert()){
    ?>

    <script>
        alert('Aluno(a) inserido com sucesso!');
        document.location.href = 'index.php';
    </script>

<?php
}

endif;