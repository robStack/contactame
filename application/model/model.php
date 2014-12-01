<?php

class Model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getContactos(){
        $sql = "SELECT  contacto_id , c.nombre as nombre,  apellidos ,  telefono ,  email , g.nombre as grupo,  avatar ,  favorito , c.usuario_id as usuario_id FROM contactos AS c LEFT JOIN grupos AS g ON c.grupo_id = g.grupo_id ORDER BY nombre";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getGrupos(){
        $sql = "SELECT * FROM grupos ORDER BY nombre";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getContacto($id){
        $sql = "SELECT  contacto_id , c.nombre as nombre,  apellidos ,  telefono ,  email , g.nombre as grupo, g.grupo_id as grupo_id,  avatar ,  favorito , c.usuario_id as usuario_id FROM contactos AS c LEFT JOIN grupos AS g ON c.grupo_id = g.grupo_id WHERE contacto_id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getComments($contacto_id, $usuario_id){
        $sql = "SELECT comentario, fecha FROM comentarios WHERE contacto_id = ".$contacto_id." AND usuario_id = ".$usuario_id." ORDER BY fecha";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function createContacto($data){
        $sql = "INSERT INTO contactos (nombre, apellidos, telefono, email, grupo_id, avatar, favorito, usuario_id) VALUES (:nombre, :apellidos, :telefono, :email, :grupo_id, :avatar, :favorito, :usuario_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $data['nombre'], ':apellidos' => $data['apellidos'], ':telefono' => $data['telefono'], ':email' => $data['email'], ':grupo_id' => $data['grupo_id'], ':avatar' => $data['avatar'], ':favorito' => $data['favorito'], ':usuario_id' => $data['usuario_id']);
        $result = $query->execute($parameters);
        if($result)
            return array('1' => 'Creación satisfactoria del contacto');
        else
            return array('2' => 'Error ejecuntado el procedimiento: '.$query->error);
    }

    public function createComment($data){
        $sql = "INSERT INTO comentarios (contacto_id, usuario_id, comentario, fecha) VALUES (:contacto_id, :usuario_id, :comentario, CURRENT_DATE())";
        $query = $this->db->prepare($sql);
        $parameters = array(':contacto_id' => $data['contacto_id'], ':usuario_id' => $data['usuario_id'], ':comentario' => $data['comentario']);
        $result = $query->execute($parameters);
        if($result)
            return array('1' => 'Creación satisfactoria del contacto');
        else
            return array('2' => 'Error ejecuntado el procedimiento: '.$query->error);
    }

    public function deleteContacto($id)
    {
        $sql = "DELETE FROM contactos WHERE contacto_id = :contacto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':contacto_id' => $id);
        $result = $query->execute($parameters);
        if($result)
            return array('1' => 'Eliminación satisfactoria del contacto');
        else
            return array('2' => 'Error ejecuntado el procedimiento: '.$query->error);
    }

    public function updateContacto($data)
    {
        $sql = "UPDATE contactos SET nombre=:nombre,apellidos=:apellidos,telefono=:telefono,email=:email,grupo_id=:grupo_id,avatar=:avatar WHERE contacto_id = :contacto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $data['nombre'], ':apellidos' => $data['apellidos'], ':telefono' => $data['telefono'], ':email' => $data['email'], ':grupo_id' => $data['grupo_id'], ':avatar' => $avatar, ':contacto_id' => $data['contacto_id']);
        $result = $query->execute($parameters);
        return $data;
    }

    public function createUsuario($data, $provider){
        $sql = "SELECT COUNT(nombre) AS total FROM usuarios WHERE usuario ='".$data['displayName']."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0]->total < 1)
        {
            $sql = "INSERT INTO usuarios(usuario, email, password, nombre, avatar, referencia) VALUES (:usuario, :email, :password, :nombre, :avatar, :referencia)";
            $query = $this->db->prepare($sql);
            $parameters = array(':usuario' => $data['displayName'], ':email' => 'Oauth', ':password' => 'Oauth', ':nombre' => $data['firstName'], ':avatar' => $data['photoURL'], ':referencia' => $provider);
            $result = $query->execute($parameters);
        }        
    }
}
