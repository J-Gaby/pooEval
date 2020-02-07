<?php

require_once 'BDD.php';

class Agenda
{
    /**
     * nom
     * @var mixed/null
     */
    protected $name = null;

    /**
     * couleur
     * @var mixed/null
     */
    protected $color = null;

    public static $_authorisedUpdate = ['name', 'color'];

    public function __construct($id=null)
    {
        if (!empty($id)) {
            $bdd = BDD::getConnection();
            $inst = $bdd->query("SELECT * FROM Agenda WHERE id = " . $id);
            // requete BDD pour id
            $result = $inst->fetch(PDO::FETCH_ASSOC);

            $this->id = $result['id'];
            $this->name = $result['Name'];
            $this->color = $result['Color'];
        }
    }
}