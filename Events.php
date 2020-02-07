<?php

require_once 'BDD.php';

class Events
{

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

    public static function findOne($filters=[]){
//        var_dump($filters);
        $bdd = BDD::getConnection();
        $clause = [];
        foreach ($filters as $k => $filter){
            $clauses[] = $k. ' = ' .$bdd->quote($filter);
        }
        $where = '';
        if (!empty($clauses)){
            $where = 'WHERE ' .implode(' AND ' ,$clauses);
        }
        $request = 'SELECT * FROM pooEval.Events ' .$where. ' LIMIT 0,1';
        $query = $bdd->query($request);
//        var_dump($request);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Events');
        return $query->fetch();
    }

    public function allPeople($filters=[]){

        $filters['idPeople']=$this->id;
        $all = People::findAll($filters);
        return $all;
    }

    public static function findAllByDate($filters){
        $bdd = BDD::getConnection();
        $res=$bdd->query('SELECT * FROM pooEval.Events WHERE Datetime=' .$filters);
        return $res->fetchAll(PDO::FETCH_CLASS, 'Events');
    }
}
