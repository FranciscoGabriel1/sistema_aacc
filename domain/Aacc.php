<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 07/12/2018
 * Time: 14:43
 */
require_once ("Crud.php");
class Aacc extends Crud
{
    protected $tabela = 'aacc';
    private $sigla;
    private $descricao_aacc;
    private $cargamin;
    private $cargamax;
    private $aprov_max;
    private $doc_comprobatorio;
    private $coord_idcoord;
    private $modalidade_idmod;

    /**
     * @return mixed
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param mixed $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    /**
     * @return mixed
     */
    public function getDescricaoAacc()
    {
        return $this->descricao_aacc;
    }

    /**
     * @param mixed $descricao_aacc
     */
    public function setDescricaoAacc($descricao_aacc)
    {
        $this->descricao_aacc = $descricao_aacc;
    }

    /**
     * @return mixed
     */
    public function getCargamin()
    {
        return $this->cargamin;
    }

    /**
     * @param mixed $cargamin
     */
    public function setCargamin($cargamin)
    {
        $this->cargamin = $cargamin;
    }

    /**
     * @return mixed
     */
    public function getCargamax()
    {
        return $this->cargamax;
    }

    /**
     * @param mixed $cargamax
     */
    public function setCargamax($cargamax)
    {
        $this->cargamax = $cargamax;
    }

    /**
     * @return mixed
     */
    public function getAprovMax()
    {
        return $this->aprov_max;
    }

    /**
     * @param mixed $aprov_max
     */
    public function setAprovMax($aprov_max)
    {
        $this->aprov_max = $aprov_max;
    }

    /**
     * @return mixed
     */
    public function getDocComprobatorio()
    {
        return $this->doc_comprobatorio;
    }

    /**
     * @param mixed $doc_comprobatorio
     */
    public function setDocComprobatorio($doc_comprobatorio)
    {
        $this->doc_comprobatorio = $doc_comprobatorio;
    }

    /**
     * @return mixed
     */
    public function getCoordIdcoord()
    {
        return $this->coord_idcoord;
    }

    /**
     * @param mixed $coord_idcoord
     */
    public function setCoordIdcoord($coord_idcoord)
    {
        $this->coord_idcoord = $coord_idcoord;
    }

    /**
     * @return mixed
     */
    public function getModalidadeIdmod()
    {
        return $this->modalidade_idmod;
    }

    /**
     * @param mixed $modalidade_idmod
     */
    public function setModalidadeIdmod($modalidade_idmod)
    {
        $this->modalidade_idmod = $modalidade_idmod;
    }




//MÉTODOS CRUD E ETC
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function MostrarAaccEnsinoPorCurso($codigo){
        $sql = "SELECT * FROM aacc INNER JOIN modalidade ON aacc.modalidade_idmod = modalidade.idmod INNER JOIN coord ON aacc.coord_idcoord = coord.idcoord INNER JOIN curso ON coord.curso_codigo = curso.codigo WHERE modalidade.idmod = 1 AND curso.codigo = '$codigo'";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function MostrarAaccPesquisaPorCurso($codigo){
        $sql = "SELECT * FROM aacc INNER JOIN modalidade ON aacc.modalidade_idmod = modalidade.idmod INNER JOIN coord ON aacc.coord_idcoord = coord.idcoord INNER JOIN curso ON coord.curso_codigo = curso.codigo WHERE modalidade.idmod = 2 AND curso.codigo = '$codigo'";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function MostrarAaccExtensaoPorCurso($codigo){
    $sql = "SELECT * FROM aacc INNER JOIN modalidade ON aacc.modalidade_idmod = modalidade.idmod INNER JOIN coord ON aacc.coord_idcoord = coord.idcoord INNER JOIN curso ON coord.curso_codigo = curso.codigo WHERE modalidade.idmod = 3 AND curso.codigo = '$codigo'";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
}

    public function MostrarModalidades(){
        $sql = "SELECT * FROM modalidade";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function insert()
    {
        // TODO: Implement insert() method.
        $sql = "INSERT INTO $this->tabela (sigla,descricao_aacc,cargamin,cargamax,aprov_max,doc_comprobatorio,coord_idcoord,modalidade_idmod) VALUES (:sigla,:descricao_aacc,:cargamin,:cargamax,:aprov_max, :doc_comprobatorio,:coord_idcoord,:modalidade_idmod)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':sigla',$this->sigla);
        $stm->bindParam(':descricao_aacc',$this->descricao_aacc);
        $stm->bindParam(':cargamin',$this->cargamin);
        $stm->bindParam(':cargamax',$this->cargamax);
        $stm->bindParam(':aprov_max',$this->aprov_max);
        $stm->bindParam(':doc_comprobatorio',$this->doc_comprobatorio);
        $stm->bindParam(':coord_idcoord',$this->coord_idcoord);
        $stm->bindParam(':modalidade_idmod',$this->modalidade_idmod);
        return $stm->execute();
    }

    public function update($sigla)
    {
        // TODO: Implement update() method.
        $sql = "UPDATE $this->tabela SET sigla=:sigla,descricao=:descricao,cargamin=:cargamin, cargamax:cargamax, aprov_max=:aprov_max,doc_comprobatorio=:doc_comprobatorio WHERE  sigla=:sigla";
        $stm = DB::prepare($sql);
        $stm->bindParam(':sigla',$sigla, PDO::PARAM_INT);
        $stm->bindParam(':sigla',$this->sigla);
        $stm->bindParam(':descricao',$this->descricao_aacc);
        $stm->bindParam(':cargamin',$this->cargamin);
        $stm->bindParam(':cargamax',$this->cargamax);
        $stm->bindParam(':aprov_max',$this->aprov_max);
        $stm->bindParam(':doc_comprobatorio',$this->doc_comprobatorio);
        $stm->bindParam(':coord_idcoord',$this->coord_idcoord);
        $stm->bindParam(':modalidade_idmod',$this->modalidade_idmod);
        return $stm->execute();
    }
    public function delete($sigla)
    {
        $sql = "DELETE FROM $this->tabela WHERE sigla=:$sigla";
        $stm = DB::prepare($sql);
        $stm->bindParam(':sigla',$sigla, PDO::PARAM_INT);
        return $stm->execute();
    }



}