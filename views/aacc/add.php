<?php
function __autoload($class)
{
    require_once '../../domain/' . $class . '.php';
}

$aacc = new Aacc();


if (isset($_POST['cad_aacc'])):

    $sigla = $_POST['sigla'];
    $descricao_aacc = $_POST['descricao_aacc'];
    $ch_minima = $_POST['ch_minima'];
    $ch_maxima = $_POST['ch_maxima'];
    $ap_maximo = $_POST['ap_maximo'];
    $doc_comp = $_POST['doc_comp'];
    $coord = $_POST['coord'];
    $modalidade = $_POST['modalidade'];

    $aacc->setSigla($sigla);
    $aacc->setDescricaoAacc($descricao_aacc);
    $aacc->setCargamin($ch_minima);
    $aacc->setCargamax($ch_maxima);
    $aacc->setAprovMax($ap_maximo);
    $aacc->setDocComprobatorio($doc_comp);
    $aacc->setCoordIdcoord($coord);
    $aacc->setModalidadeIdmod($modalidade);

    if ($aacc->insert()) {
        ?>

        <script>
            alert('AACC inserida com sucesso!');
            document.location.href = 'index.php';
        </script>

        <?php
    }

endif;