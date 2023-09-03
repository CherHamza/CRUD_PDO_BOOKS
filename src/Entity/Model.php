<?php

namespace hamza\pdo\Entity;

use hamza\pdo\Kernel\DataBase;

use PDO;
class Model  {

    public static $className;

    private static function getEntityName()
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab) - 1];
        return $entity;
    }

    private static function getClassName()
    {
        return static::class;
    }

    private static function Execute($sql, $params = [])
    {
        if (empty($params)) {
            $pdostatement = DataBase::getInstance()->query($sql);
            return $pdostatement;
        } else {
            $pdostatement = DataBase::getInstance()->prepare($sql);
            $pdostatement->execute($params);
            return $pdostatement;
        }
    }
    


    public static function getAll(int $limit = null, int $offset = 0)
{
    $db = DataBase::getInstance();
    $sql = "SELECT * FROM " . self::getEntityName() . " ORDER BY title";
    
    if (!is_null($limit)) {
        $sql .= " LIMIT $limit OFFSET $offset";
    }

    return self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
}



    public static function getById(int $id)
    {
        $sql = "select * from " . self::getEntityName() . " where id=$id";
        $result =  self::Execute($sql)->fetchAll(PDO::FETCH_CLASS, self::getClassName());
        //Comme fetchAll [0] on récupère le premier élément sinon c'est $result
        return $result[0];
    }





    public static function create($data)
    {
        $db = Database::getInstance();
    
        $stmt = $db->prepare("INSERT INTO " . self::getEntityName()." (title, author, type, description) VALUES (:title, :author, :type, :description)");
    
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
    
        return $stmt->execute();
    }
   


    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id=$id";
        return DataBase::getInstance()->exec($sql);
    }  



    
    
    public static function update(int $id, array $data)
    {
        $db = Database::getInstance();
        $sql="UPDATE ". self::getEntityName() ." SET title = :title, author = :author, type = :type, description = :description WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    
        
    }
        
    


