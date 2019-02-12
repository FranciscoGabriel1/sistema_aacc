<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 07/12/2018
 * Time: 17:21
 */
require_once ("Crud.php");
class Curso extends Crud
{
    protected $tabela = 'curso';
    private $codigo;
    private $descricao;

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    //MÉTODOS CRUD E ETC
    public function mostrarCursoPorCodigo($codigo) {
        $sql = "SELECT * FROM $this->tabela WHERE codigo='$codigo'";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function insert()
    {
        // TODO: Implement insert() method.
        $sql = "INSERT INTO (codigo,descricao) VALUES (:codigo,:descricao)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':codigo',$this->codigo);
        $stm->bindParam(':descricao',$this->descricao);
        $stm->execute();
    }
    public function update($id)
    {
        // TODO: Implement update() method.
    }

}