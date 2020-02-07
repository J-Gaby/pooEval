<?php

require_once 'BDD.php';

class People
{
    public static function findAll($filters=[]){

        $bdd = BDD::getConnection();
        $where='';
        $clauses=[];
        foreach ($filters as $k => $filter){
            $clauses[]=$k.'='.$bdd->quote($filter);
        }

        if(!empty($clauses)){
            $where = 'WHERE '.implode(' AND ',$clauses);
        }

        $res=$bdd->query('SELECT * FROM pooEval.PeopleEvents '.$where);
        var_dump($res);
        return $res->fetchAll(PDO::FETCH_CLASS, 'People');
    }
}