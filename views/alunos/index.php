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
?>

<!-- Modulo ALUNOS -->
<!-- Onde serão inseridas Atividades de:
-Ensino
-Pesquisa
-Extensão

*inserir (ok)
*(falta editar e excluir)
-->

<!DOCTYPE html>
<html lang="pt-br">
<!--<head> -->
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport"/>
<meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description"/>
<meta content="Semantic-UI, Theme, Design, Template" name="keywords"/>
<meta content="PPType" name="author"/>
<!--<meta content="#ffffff" name="theme-color" />-->
<title>Alunos</title>
<link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
<link href="../../semantic/static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css"/>
<script src="../../semantic/static/dist/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="../../semantic/dist/semantic.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>

<!--</head> -->
<style>
    .tim {
        border: 0;
        padding: 0;
        display: inline;
        background: none;
        text-decoration: none;
        color: #0091EA;
    }

    button:hover {
        cursor: pointer;
    }
</style>
<!--<body> -->
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

<div class="ui pointing menu" style="margin-top: 0px;">
<!--    <a class="item " href="../../index.php">Home</a>-->
    <!--    <a class="item"  href="../atividades">Atividades </a>-->
    <a class="item " href="../aacc">AACCs</a>
    <a class="item active" href="../alunos">Alunos</a>
</div>

<div class="ui breadcrumb" style="margin-top: 3%;margin-left: 1%;">
<!--    <a class="section">Home</a>-->
<!--    <i class="right angle icon divider"></i>-->
    <div class="active section">Alunos</div>
</div>

<div class="ui segment">
    <div style="text-align: center;margin-bottom: 2%;">
        <button class="ui  positive basic button create_btn" type="button" id="addAlunos">Adicionar Aluno(a)</button>
    </div>


    <table id="alunostable" class="ui celled table" style="width:100%">
        <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Opções</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($aluno->alunosPorCurso($codigo) as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value->matricula; ?></td>
                <td>
                    <form method="post" action="../atividades/index.php">
                        <input type="hidden" name="nome" value="<?php echo $value->nome; ?>">
                        <button type="submit" class="tim"><?php echo $value->nome; ?></button>
                    </form>
                </td>
                <td><?php echo $value->descricao_curso; ?></td>
                <td style="text-align: center">
                    <button class="ui icon button" title="Excluir Aluno (a)">
                        <i class="trash alternate outline icon"></i>
                    </button>
                    <button class="ui icon button" title="Alterar dados do Aluno(a)">
                        <i class="edit outline icon"></i>
                    </button>
                    <button class="ui icon button" title="Panorama Geral do Aluno">
                        <i class="street view icon"></i>
                    </button>
                    <button class="ui icon button" title="Emitir Relatório" id="confirmModal">
                        <i class="file pdf outline icon"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
        </tfoot>
    </table>

    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td class="gutter">
                <!--                <div class="line number1 index0 alt2">1</div>-->
                <!--                <div class="line number2 index1 alt1">2</div>-->
                <!--                <div class="line number3 index2 alt2">3</div>-->
            </td>
        </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td class="gutter">
                <div class="line number1 index0 alt2" style="display: none;">1</div>
            </td>
            <td class="code">
                <div class="container" style="display: none;">
                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>


</div>
<!-- MEU MODAL PARA ADICIONAR ALUNOS --->
<div class="ui modal addAlunos">
    <i class="close icon"></i>
    <div class="header">
        Adicionar Aluno(a)
    </div>
    <div class="content">
        <form method="post" action="add.php">
            <div class="ui form">
                <div class="fields">
                    <div class="field ">
                        <label><i class="barcode icon"></i>Matrícula</label>
                        <input type="number" name="matricula" placeholder="Matrícula" maxlength="8" required>
                    </div>
                    <div class="field twelve wide">
                        <label><i class="address card outline icon"></i>Nome</label>
                        <input type="text" name="nome" placeholder="Nome" required>
                    </div>
                </div>
            </div>
            <div class="ui form">
                <div class="field">
                    <label><i class="book icon"></i>Curso</label>
                    <select class="ui fluid dropdown" name="curso" required>
                        <option value="">Curso do ICET/UFAM</option>
                        <?php foreach ($curso->mostrarCursoPorCodigo($codigo) as $key => $value) {

                            ?>
                            <option value="<?php echo $value->codigo; ?>"
                                    lang="pt-br"><?php echo $value->descricao_curso; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <button class="ui green button right labeled icon button" name="cad_aluno" type="submit">Salvar<i
                    class="checkmark icon"></i></button>
    </div>
</div>
</form>


<div class="ui modal confirmModal">
    <i class="close icon"></i>
    <div class="header">
        Gerar Relatório em PDF
    </div>

    <div class="content">
        <div class="ui checked checkbox">
            <input type="checkbox" name="example" checked="">
            <label>Atividades de Ensino</label>
        </div>
    </div>
    <div class="content">
        <div class="ui checkbox">
            <input type="checkbox" name="example">
            <label>Atividades de Pesquisa</label>
        </div>
    </div>
    <div class="content">
        <div class="ui checkbox">
            <input type="checkbox" name="example">
            <label>Atividades de Extensão</label>
        </div>
    </div>

    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <div class="ui positive right labeled icon button">
            Ok
            <i class="checkmark icon"></i>
        </div>
    </div>

</div>


<!--</body> -->
</body>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

<script>
    $(document).ready(function () {
        $('#alunostable').DataTable();
    });
</script>

<script>
    $("#alunostable").dataTable({
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Pesquisar por: ",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#addAlunos").click(function () {
            $(".addAlunos").modal('show');
        });
        $(".addAlunos").modal({
            closable: true
        });
    });


    $(function () {
        $("#confirmModal").click(function () {
            $(".confirmModal").modal('show');
        });
        $(".confirmModal").modal({
            closable: true
        });
    });


    $('select.dropdown')
        .dropdown()
    ;
    $('.ui.dropdown')
        .dropdown()
    ;
</script>

</html>