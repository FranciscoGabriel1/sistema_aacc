<?php
session_start();
require_once '../../login/init.php';
require '../../login/check.php';
$user = $_SESSION['user_nome'];
header('Content-Type: text/html; charset=utf-8');
function __autoload($class)
{
    require_once '../../domain/' . $class . '.php';
}

$codigo = $_SESSION['user_curso'];
$aluno = new Aluno();
$curso = new Curso();
$aacc = new Aacc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport"/>
    <meta content="Sistema " name="editar aacc"/>
    <meta content="PPType" name="chico gab"/>
    <title>Editar AACC</title>
    <link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
    <link href="../../semantic/static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css"/>
    <script src="../../semantic/static/dist/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>
    <script src="../../semantic/dist/semantic.min.js"></script>
</head>
<body>
<div class="ui menu" style="background-color: #00BFA5; width: 100%;height: 8%;margin-bottom: 0%;">
    <div class="right menu" style="margin-right: 2%;margin-top: 1.2%;width: auto;">
         <span><div class="ui inline dropdown" style="margin-top: 3%;">
            <div class="text"><img class="ui avatar image"
                                   src="../../assets/img/perfil.jpg"> <?php echo $user; ?> </div>
            <i class="dropdown icon"></i>
            <div class="menu">
                 <a class="ui item" href="#"><i class="user circle icon"></i>Configurar Perfil</a>
                 <a class="ui item" href="../../login/logout.php"><i class="power off icon"></i> Sair</a>
            </div>
        </div></span>
    </div>
</div>
<div class="ui breadcrumb" style="margin-top: 3%;margin-left: 1%;">
    <a class="section" href="index.php">AACCs</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Editar AACC</div>
</div>
<div class="ui segment" style="width: 80%;margin-left: 10%;margin-right: 10%;margin-top: 6%">


    <?php if ($_POST['modalidade'] == '1') { ?>
        <div class="header" style="text-align: center"> Editar AACC de Ensino</div> <?php } ?>
    <?php if ($_POST['modalidade'] == '2') { ?>
        <div class="header" style="text-align: center"> Editar AACC de Pesquisa</div> <?php } ?>
    <?php if ($_POST['modalidade'] == '3') { ?>
        <div class="header" style="text-align: center"> Editar AACC de Extensão</div> <?php } ?>


    <div class="content">
        <form method="post" action="add.php">
            <div class="ui form">
                <div class="inline fields">
                    <div class="field">
                        <label><i class="book icon"></i>Sigla</label>
                        <input type="text" name="sigla" placeholder="Sigla" value="<?php echo $_POST['sigla']; ?>"
                               required>
                    </div>
                </div>
            </div>
            <div class="ui form">
                <div class="field">
                    <label><i class="clipboard list icon"></i>Descrição da Atividade</label>
                    <textarea rows="2" name="descricao_aacc" placeholder="Escreva as atividades aqui..."
                              required><?php echo $_POST['descricao_aacc']; ?></textarea>
                </div>
            </div>
            <div class="ui form" style="margin-top: 2%;">
                <div class="two fields">
                    <div class="field">
                        <label><i class="clock outline icon"></i>Carga Horária Mínima</label>
                        <input placeholder="Carga Horária Mínima" value="<?php echo $_POST['cargamin']; ?>"
                               name="ch_minima" type="number" required>
                    </div>
                    <div class="field">
                        <label><i class="clock icon"></i>Carga Horária Máxima</label>
                        <input placeholder="Carga Horária Máxima" value="<?php echo $_POST['cargamax']; ?>"
                               name="ch_maxima" type="number" required>
                    </div>
                </div>
            </div>

            <div class="ui form">
                <div class="two fields">
                    <div class="field">
                        <label><i class="hourglass end icon"></i>Aproveitamento Máximo</label>
                        <input placeholder="Aproveitamento Máximo" value="<?php echo $_POST['aprov_max']; ?>"
                               name="ap_maximo" type="number" required>
                    </div>
                    <div class="field">
                        <label><i class="address book icon"></i>Documento Comprobatório</label>
                        <input placeholder="Documento Comprobatório" value="<?php echo $_POST['doc_comprobatorio']; ?>"
                               name="doc_comp" type="text" required>
                    </div>
                </div>
            </div>


    </div>
    <div class="actions inline fields">
        <a href="index.php">
            <div class="ui black deny button">
                Cancelar
            </div>
        </a>
        <button class="ui green button right labeled icon button" type="submit" name="cad_aacc">Salvar<i
                    class="checkmark icon"></i>
        </button>
    </div>
</div>
</form>












<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

<script>
    $('select.dropdown')
        .dropdown()
    ;
    $('.ui.dropdown')
        .dropdown()
    ;
</script>


</body>
</html>