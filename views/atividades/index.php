<?php
session_start();
require_once '../../login/init.php';
require '../../login/check.php';
$discente = $_POST['nome'];
$user = $_SESSION['user_nome'];

?>
<!DOCTYPE html>
<html lang="en">
<!--<head> -->
<meta charset="UTF-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
<meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
<meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
<meta content="PPType" name="author" />
<!--<meta content="#ffffff" name="theme-color" />-->
<title>Atividades</title>
<link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
<link href="../../semantic/static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
<script src="../../semantic/static/dist/jquery/jquery.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="../../semantic/dist/semantic.min.js"></script>
<!--<script src="../../semantic/dist/semantic.js"></script>-->
<!--<script src="../../semantic/static/dist/jquery/jquery.min.js"></script>-->
<!--<script src="../../Jquery.js"></script>-->
<link rel="stylesheet" href="../../Stylesheet.css">
<script src="../../assets/js/Javascript.js"></script>
<!--</head> -->




<!--<body> -->
<body>
<div class="ui menu" style="background-color: #00BFA5; width: 100%;height: 8%;margin-bottom: 0%;">
    <div class="right menu" style="margin-right: 2%;margin-top: 1.2%;width: auto;">
         <span><div class="ui inline dropdown" style="margin-top: 3%;">
            <div class="text"><img class="ui avatar image" src="../../assets/img/perfil.jpg"> <?php echo $user; ?> </div>
            <i class="dropdown icon"></i>
            <div class="menu">
                 <a class="ui item" href="#" ><i class="user circle icon"></i>Configurar Perfil</a>
                 <a class="ui item" href="../../login/logout.php" ><i class="power off icon"></i> Sair</a>
            </div>
        </div></span>
    </div>
</div>

<div class="ui pointing menu" style="margin-top: 0px;">
    <a class="item " href="../../index.php">Home</a>
    <a class="item " href="../aacc">AACCs</a>
    <a class="item active" href="../alunos">Alunos</a>
</div>

<div class="ui breadcrumb" style="margin-top: 3%;margin-left: 1%;">

    <div class="section"><a href="../alunos">Alunos</a></div>
    <i class="right angle icon divider"></i>
    <div class="active section">Cadastrar Atividade</div>
</div>

<div class="ui segment">
<div style="text-align: center;margin-bottom: 2%;font-size: 14pt;">
    <p style="color: #0c5460;font-weight: bold;"><?php echo "".$discente; ?></p>
</div>


<!---->
<!--    <div class="ui form " style="margin-left: 35%;">-->
<!--        <div class="field" style=" width: 40%;">-->
<!--            <select name="SelectOptions" id="SelectOptions" required="">-->
<!--                <option >Selecione uma modalidade</option>-->
<!--                <option value="ensino">Ensino</option>-->
<!--                <option value="pesquisa">Pesquisa</option>-->
<!--                <option value="extensao">Extensão</option>-->
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->

    <div class="ui form" style="margin-left: 35%;">
        <div class="field" style=" width: 40%;">
            <label>Modalidade</label>
            <select name="SelectOptions" id="SelectOptions" required="" class="ui fluid dropdown">
                <option value="">Selecione uma modalidade</option>
                <option value="ensino">Ensino</option>
                <option value="pesquisa">Pesquisa</option>
                <option value="extensao">Extensão</option>
            </select>
        </div>
    </div>

    <div class="Container">
        <div class="DivPai" style="width: 80%;margin-left: 10%;height: auto;margin-top: 3%;">
            <div class="ensino">
                <table class="ui selectable celled table" style="font-size: 11pt;">
                    <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>Atividade</th>
                        <th>Documento Comprobatório</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>EE1</label></td>
                        <td>Apresentou minicurso</td>
                        <td>Nada consta</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>EE1</label></td>
                        <td>Participou de evento </td>
                        <td>Certificado</td>
                    </tr>
                    </tbody>
                </table>
            </div>


<!-- ----------------------------------PESQUISA --------------------------------------------------- -->
            <div class="pesquisa">
                <table class="ui selectable celled table" style="font-size: 11pt;">
                    <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>Atividade</th>
                        <th>Documento Comprobatório</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>PE1</label></td>
                        <td>Apresentou minicurso</td>
                        <td>Nada consta</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>PE2</label></td>
                        <td>Participou de evento </td>
                        <td>Certificado</td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <!-- ----------------------------------PESQUISA --------------------------------------------------- -->
            <div class="extensao">
                <table class="ui selectable celled table" style="font-size: 11pt;">
                    <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>Atividade</th>
                        <th>Documento Comprobatório</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>EXE1</label></td>
                        <td>Apresentou minicurso</td>
                        <td>Nada consta</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><input type="radio" name="aacc"> <label>EXE2</label></td>
                        <td>Participou de evento </td>
                        <td>Certificado</td>
                    </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>


<!--</body> -->
</body>
<script type="text/javascript">
    $('.ui.radio.checkbox')
        .checkbox()
    ;

    $('select.dropdown')
        .dropdown()
    ;
    $('.ui.dropdown')
        .dropdown()
    ;

</script>
</html>