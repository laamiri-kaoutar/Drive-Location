<?php

require_once '../config/database.php';




class Avis extends GestionBaseDeDonnees {



    public function create($user, $vehicule , $commentaire, $note){
        $query = "INSERT INTO avis(user_id, id_vehicule , commentaire , note) VALUES (?,?,?,?)";
        $params = [$user, $vehicule , $commentaire, $note];
        return  $this->execute($query, $params);
    }

    public function update($id ,$user, $vehicule , $commentaire, $note ){
        $query = "UPDATE avis SET user_id = ?,id_vehicule= ? ,commentaire= ? ,note= ? WHERE id_avis = ?";
        $params = [$user, $vehicule , $commentaire, $note, $id];
        return  $this->execute($query, $params);
    }


    public function deleteById($id){
        $query = "UPDATE avis SET is_deleted = 1 WHERE id_avis = ?";
        // $query = "DELETE FROM  avis  WHERE id_avis = ?";
        $params = [$id];
        return  $this->execute($query, $params);
    }

    public function getElementById($id){
        $query = "SELECT * FROM avis WHERE id_avis = ? ";
        $params = [$id];
        return  $this->select($query , $params);
    }


    public function readAll(){
        $query = "SELECT * FROM avis a JOIN vehicule v ON v.id_vehicule = a.id_vehicule  JOIN utilisateur u ON u.user_id = a.user_id ";
        return  $this->select($query);
    }

    public function readByUser($id){
        $query = "SELECT * FROM avis r JOIN vehicule v ON v.id_vehicule = r.id_vehicule  where r.user_id = ? AND is_deleted = 0";
        $params = [$id];
        return  $this->select($query , $params);
    }


}
