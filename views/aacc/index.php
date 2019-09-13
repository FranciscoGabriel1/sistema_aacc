<?php

//esse trecho de código em PHP são para verificar se o user estar logado
session_start();
require_once '../../login/init.php';
require '../../login/check.php';
$user = $_SESSION['user_nome'];
header('Content-Type: text/html; charset=utf-8');
function __autoload($class)
{
    require_once '../../domain/' . $class . '.php';
}

//essas informações eu pego no momento em que o usuário loga, porque posso precisar
$codigo = $_SESSION['user_curso'];
$coord_log = $_SESSION['user_id'];
$aacc = new Aacc();

//Se o user estiver logado, ele tem acesso a essa página
?>
<!DOCTYPE html>
<!-- Modulo AACC -->
<!-- Onde serão inseridas Atividades de:
-Ensino
-Pesquisa
-Extensão

*inserir (ok)
*(falta editar e excluir)
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport"/>
    <meta content="Sistema " name="description"/>
    <meta content="aacc,icet,ufam,sistema,lab312,horas,complementares,software" name="keywords"/>
    <meta content="PPType" name="author"/>
    <title>AACC</title>
    <link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
    <link href="../../semantic/static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css"/>
    <script src="../../semantic/static/dist/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>
    <script src="../../assets/tab.js"></script>
    <link href="../../assets/tab.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../../semantic/dist/semantic.min.js"></script>
</head>

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

<!-- ************opções do menu-->
<div class="ui pointing menu" style="margin-top: 0px;">
<!--    <a class="item " href="../../index.php">Home</a>-->
    <!--    <a class="item"  href="../atividades">Atividades </a>-->
    <a class="item active" href="../aacc">AACCs</a>
    <a class="item" href="../alunos">Alunos</a>
</div>

<!-- ***********Migalha de pão-->
<div class="ui breadcrumb" style="margin-top: 3%;margin-left: 1%;">
<!--    <a class="section">Home</a>-->
<!--    <i class="right angle icon divider"></i>-->
    <div class="active section">AACCs</div>
</div>

<!-- *************Botão adiconar AACC-->
<div class="ui segment">
    <div style="text-align: center;margin-bottom: 2%;">
        <button class="ui  positive basic button create_btn" type="button" id="addAACC">Adicionar AACC</button>
    </div>

    <!----------------GRENDE TABELA ONDE MOSTRAM TODAS AS MODALIDADES ---------------->

    <!-- Tab links com as opções ENSINO, PESQUISA e EXTENSÃO -->
    <div class="tab">
        <button class="tablinks active" onclick="openModalidade(event, 'Ensino')" id="padraoAberto">Ensino</button>
        <button class="tablinks" onclick="openModalidade(event, 'Pesquisa')">Pesquisa</button>
        <button class="tablinks" onclick="openModalidade(event, 'Extensão')">Extensão</button>
    </div>
    <!-- Tab content ENSINO-->
    <div id="Ensino" class="tabcontent">
        <h3 style="text-align: center;">MODALIDADE: ENSINO</h3>

        <table id="ensinotable" class="ui celled table" style="width:100%">
            <thead>
            <tr>
                <th>Sigla</th>
                <th>Atividade</th>
                <th>Carga Horária Mínima</th>
                <th>Carga Horária Máxima</th>
                <th>Aproveitamento Máximo</th>
                <th>Documento Comprobatório</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aacc->MostrarAaccEnsinoPorCurso($codigo) as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->sigla; ?></td>
                    <td><?php echo $value->descricao_aacc; ?></td>
                    <td><?php echo $value->cargamin; ?></td>
                    <td><?php echo $value->cargamax; ?></td>
                    <td><?php echo $value->aprov_max; ?></td>
                    <td><?php echo $value->doc_comprobatorio; ?></td>
                    <td>
                        <button class="ui icon button" title="Excluir Atividade">
                            <i class="trash alternate outline icon"></i>
                        </button>

                        <form method="post" action="edit.php">
                            <input type="hidden" name="sigla" value="<?php echo $value->sigla; ?>">
                            <input type="hidden" name="modalidade" value="<?php echo $value->modalidade_idmod; ?>">
                            <input type="hidden" name="descricao_aacc" value="<?php echo $value->descricao_aacc; ?>">
                            <input type="hidden" name="cargamin" value="<?php echo $value->cargamin; ?>">
                            <input type="hidden" name="cargamax" value="<?php echo $value->cargamax; ?>">
                            <input type="hidden" name="aprov_max" value="<?php echo $value->aprov_max; ?>">
                            <input type="hidden" name="doc_comprobatorio" value="<?php echo $value->doc_comprobatorio; ?>">
                        <button class="ui icon button" type="submit" title="Alterar dados da Atividade">
                            <i class="edit outline icon"></i>
                        </button>
                        </form>
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
                    <!--                    <div class="line number1 index0 alt2">1</div>-->
                    <!--                    <div class="line number2 index1 alt1">2</div>-->
                    <!--                    <div class="line number3 index2 alt2">3</div>-->
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

    <!-- Tab content PESQUISA-->
    <div id="Pesquisa" class="tabcontent" style="display:none">
        <h3 style="text-align: center;">MODALIDADE: PESQUISA</h3>
        <table id="pesquisatable" class="ui celled table" style="width:100%">
            <thead>
            <tr>
                <th>Sigla</th>
                <th>Atividade</th>
                <th>Carga Horária Mínima</th>
                <th>Carga Horária Máxima</th>
                <th>Aproveitamento Máximo</th>
                <th>Documento Comprobatório</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aacc->MostrarAaccPesquisaPorCurso($codigo) as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->sigla; ?></td>
                    <td><?php echo $value->descricao_aacc; ?></td>
                    <td><?php echo $value->cargamin; ?></td>
                    <td><?php echo $value->cargamax; ?></td>
                    <td><?php echo $value->aprov_max; ?></td>
                    <td><?php echo $value->doc_comprobatorio; ?></td>
                    <td>
                        <button class="ui icon button" title="Excluir Atividade">
                            <i class="trash alternate outline icon"></i>
                        </button>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="sigla" value="<?php echo $value->sigla; ?>">
                            <input type="hidden" name="modalidade" value="<?php echo $value->modalidade_idmod; ?>">
                            <input type="hidden" name="descricao_aacc" value="<?php echo $value->descricao_aacc; ?>">
                            <input type="hidden" name="cargamin" value="<?php echo $value->cargamin; ?>">
                            <input type="hidden" name="cargamax" value="<?php echo $value->cargamax; ?>">
                            <input type="hidden" name="aprov_max" value="<?php echo $value->aprov_max; ?>">
                            <input type="hidden" name="doc_comprobatorio" value="<?php echo $value->doc_comprobatorio; ?>">
                            <button class="ui icon button" type="submit" title="Alterar dados da Atividade">
                                <i class="edit outline icon"></i>
                            </button>
                        </form>
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
                    <!--                    <div class="line number1 index0 alt2">1</div>-->
                    <!--                    <div class="line number2 index1 alt1">2</div>-->
                    <!--                    <div class="line number3 index2 alt2">3</div>-->
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

    <!-- Tab content EXTENSÃO-->
    <div id="Extensão" class="tabcontent" style="display:none">
        <h3 style="text-align: center;">MODALIDADE: EXTENSÃO</h3>
        <table id="extensaotable" class="ui celled table" style="width:100%">
            <thead>
            <tr>
                <th>Sigla</th>
                <th>Atividade</th>
                <th>Carga Horária Mínima</th>
                <th>Carga Horária Máxima</th>
                <th>Aproveitamento Máximo</th>
                <th>Documento Comprobatório</th>
                <th>Opções</th>
            </tr>


            </thead>
            <tbody>
            <?php foreach ($aacc->MostrarAaccExtensaoPorCurso($codigo) as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->sigla; ?></td>
                    <td><?php echo $value->descricao_aacc; ?></td>
                    <td><?php echo $value->cargamin; ?></td>
                    <td><?php echo $value->cargamax; ?></td>
                    <td><?php echo $value->aprov_max; ?></td>
                    <td><?php echo $value->doc_comprobatorio; ?></td>
                    <td>
                        <button class="ui icon button" title="Excluir Atividade">
                            <i class="trash alternate outline icon"></i>
                        </button>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="sigla" value="<?php echo $value->sigla; ?>">
                            <input type="hidden" name="modalidade" value="<?php echo $value->modalidade_idmod; ?>">
                            <input type="hidden" name="descricao_aacc" value="<?php echo $value->descricao_aacc; ?>">
                            <input type="hidden" name="cargamin" value="<?php echo $value->cargamin; ?>">
                            <input type="hidden" name="cargamax" value="<?php echo $value->cargamax; ?>">
                            <input type="hidden" name="aprov_max" value="<?php echo $value->aprov_max; ?>">
                            <input type="hidden" name="doc_comprobatorio" value="<?php echo $value->doc_comprobatorio; ?>">
                            <button class="ui icon button" type="submit" title="Alterar dados da Atividade">
                                <i class="edit outline icon"></i>
                            </button>
                        </form>
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
                    <!--                    <div class="line number1 index0 alt2">1</div>-->
                    <!--                    <div class="line number2 index1 alt1">2</div>-->
                    <!--                    <div class="line number3 index2 alt2">3</div>-->
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


</div>



<!-- MEU MODAL PARA ADICIONAR AACC --->
<div class="ui modal addAACC">
    <i class="close icon"></i>
    <div class="header">
        Adicionar AACC
    </div>
    <div class="content">
        <form method="post" action="add.php">
            <div class="ui form">
                <div class="inline fields">
                    <div class="field">
                        <label><i class="book icon"></i>Sigla</label>
                        <input type="text" name="sigla" placeholder="Sigla" required>
                    </div>
                    <div class="field">
                        <select name="modalidade" class="ui fluid dropdown" required>
                            <option value="">Modalidade</option>
                            <?php foreach ($aacc->MostrarModalidades() as $key => $value) { ?>
                            <option value="<?php echo $value->idmod; ?>"><?php echo $value->descricao; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="ui form">
                <div class="field">
                    <label><i class="clipboard list icon"></i>Descrição da Atividade</label>
                    <textarea rows="2" name="descricao_aacc" placeholder="Escreva as atividades aqui..." required></textarea>
                </div>
            </div>
            <div class="ui form" style="margin-top: 2%;">
                <div class="two fields">
                    <div class="field">
                        <label><i class="clock outline icon"></i>Carga Horária Mínima</label>
                        <input placeholder="Carga Horária Mínima" name="ch_minima" type="number" required>
                    </div>
                    <div class="field">
                        <label><i class="clock icon"></i>Carga Horária Máxima</label>
                        <input placeholder="Carga Horária Máxima" name="ch_maxima" type="number" required>
                    </div>
                </div>
            </div>

            <div class="ui form">
                <div class="two fields">
                    <div class="field">
                        <label><i class="hourglass end icon"></i>Aproveitamento Máximo</label>
                        <input placeholder="Aproveitamento Máximo" name="ap_maximo" type="number" required>
                    </div>
                    <div class="field">
                        <label><i class="address book icon"></i>Documento Comprobatório</label>
                        <input placeholder="Documento Comprobatório" name="doc_comp" type="text" required>
                    </div>
                </div>
            </div>

            <input  type="hidden"  name="coord" value="<?php echo $coord_log; ?>">

    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <button class="ui green button right labeled icon button" type="submit" name="cad_aacc">Salvar<i class="checkmark icon"></i>
        </button>
    </div>
</div>
</form>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

<script>

    /*esses scripts são importantes, são referentes à organização e busca nas tebelas*/
    $(document).ready(function () {
        $('#ensinotable').DataTable();
    });

    $("#ensinotable").dataTable({
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

    $(document).ready(function () {
        $('#pesquisatable').DataTable();
    });

    $("#pesquisatable").dataTable({
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

    $(document).ready(function () {
        $('#extensaotable').DataTable();
    });

    $("#extensaotable").dataTable({
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
    /*esses scripts fazem parte do SEMANTIC UI e são acrescentados aqui na parte final do arquivo de código
     porque no início não funcionam, deve ser alguma regra do semantic UI. Esses scripts são para estilizar o select*/
    $(function () {
        $("#addAACC").click(function () {
            $(".addAACC").modal('show');
        });
        $(".addAACC").modal({
            closable: true
        });
    });
    $('.ui.dropdown')
        .dropdown()
    ;
    $('select.dropdown')
        .dropdown()
    ;
</script>

<script>
    // Pega o elemento com id = "padraoAberto" e clica nele
    document.getElementById("padraoAberto").click();
</script>
</html>