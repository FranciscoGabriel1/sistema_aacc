<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 30/11/2018
 * Time: 05:23
 */
require_once("Crud.php");
class Foto extends Crud
{

    protected $tabela = 'tbl_file';
    private $id;
    private $name;
    private $image;
    private  $egresso_cpf;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getEgressoCpf()
    {
        return $this->egresso_cpf;
    }

    /**
     * @param mixed $egresso_cpf
     */
    public function setEgressoCpf($egresso_cpf)
    {
        $this->egresso_cpf = $egresso_cpf;
    }

    public function mostrarFotoPorPessoa($cpf){
        $sql = "SELECT * FROM $this->tabela WHERE egresso_cpf = '$cpf'";
        $stm = DB::prepare($sql);
        $stm->bindParam(':egresso_cpf',$cpf, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }



    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

}