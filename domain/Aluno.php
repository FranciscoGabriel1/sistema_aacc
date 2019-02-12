<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 07/12/2018
 * Time: 15:51
 */
require_once("Crud.php");
class Aluno extends Crud
{
protected $tabela = 'aluno';
private $matricula;
private $nome;
private $curso_codigo;
private $coord;

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCursoCodigo()
    {
        return $this->curso_codigo;
    }

    /**
     * @param mixed $curso_codigo
     */
    public function setCursoCodigo($curso_codigo)
    {
        $this->curso_codigo = $curso_codigo;
    }

    /**
     * @return mixed
     */
    public function getCoord()
    {
        return $this->coord;
    }

    /**
     * @param mixed $coord
     */
    public function setCoord($coord)
    {
        $this->coord = $coord;
    }

    //MÉTODOS CRUD E ETc
    public function alunosPorCurso($codigo) {
        $sql = "SELECT * FROM aluno INNER JOIN curso ON aluno.curso_codigo = curso.codigo WHERE curso.codigo = '$codigo'";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function insert()
    {
        // TODO: Implement insert() method.
        $sql = "INSERT INTO $this->tabela (matricula,nome,curso_codigo,coord_idcoord) VALUES (:matricula,:nome,:curso_codigo,:coord_idcoord)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':matricula',$this->matricula);
        $stm->bindParam(':nome',$this->nome);
        $stm->bindParam(':curso_codigo',$this->curso_codigo);
        $stm->bindParam(':coord_idcoord',$this->coord);
        return $stm->execute();
    }
    public function update($matricula)
    {
        // TODO: Implement update() method.
        $sql = "UPDATE $this->tabela SET matricula=:matricula,nome=:nome WHERE matricula=:matricula ";
        $stm = DB::prepare($sql);
        $stm->bindParam(':matricula',$matricula, PDO::PARAM_INT);
        $stm->bindParam(':matricula',$this->matricula);
        $stm->bindParam(':nome',$this->curso_codigo);
        $stm->bindParam(':curso_codigo',$this->curso_codigo);
        $stm->bindParam(':coord_idcoord',$this->coord);
        return $stm->execute();
    }
    public function delete($matricula) {
        $sql = "DELETE FROM $this->tabela WHERE matricula=:$matricula";
        $stm = DB::prepare($sql);
        $stm->bindParam(':matricula',$matricula, PDO::PARAM_INT);
        return $stm->execute();
    }

}