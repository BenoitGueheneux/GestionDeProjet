<?php

namespace Benoi\GestionDeProjet\Kernel;

use Benoi\GestionDeProjet\Kernel\Db;

class Model
{

    private static function getEntityName()
    {
        $classname = static::CLASS;
        $tab = explode('\\', $classname);
        return $tab[count($tab) - 1];

    }

    private static function getClassName()
    {
        return static::CLASS;
    }

    public static function execute($sql)
    {
        return Db::getResults($sql, self::getClassName());
    }

    private static function executes($sql)
    {
        return Db::getResult($sql);
    }

    public static function getAll()
    {
        $sql = "select * from " . self::getEntityName();
        return self::execute($sql);
    }
    
    public static function getById($id)
    {
        $sql = "select * from " . self::getEntityName() . ' WHERE id = :id';
        $statement = Db::getInstance()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(Db::FETCH_CLASS, self::getClassName());
        $statement->execute();
        return $statement->fetch(Db::FETCH_CLASS);
    }

    public static function getParticipationById(string $id)
    {
        $sql = 'SELECT projet.* FROM projet INNER JOIN participation ON projet.id = participation.id_projet WHERE participation.id = :id';
        $statement = Db::getInstance()->prepare($sql);
        $statement->bindParam(':id', $id, Db::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(Db::FETCH_CLASS, self::getClassName());
    }

    public static function getParticipationByProjetId(int $id)
    {
        $sql = 'SELECT utilisateur.* FROM utilisateur INNER JOIN participation ON utilisateur.id = participation.id WHERE id_projet = :id';
        $statement = Db::getInstance()->prepare($sql);
        $statement->bindParam(':id', $id, Db::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(Db::FETCH_CLASS, self::getClassName());
    }

    public static function getByConditions(array $conditions)
    {
        $sql = "SELECT * FROM " . self::getEntityName() . " WHERE ";
        $paramBindings = [];
        foreach ($conditions as $key => $value) {
            $paramName = ":$key";
            $sql .= "$key = $paramName AND ";
            $paramBindings[$paramName] = $value;
        }
        $sql = rtrim($sql, " AND ");
        $statement = Db::getInstance()->prepare($sql);
        foreach ($paramBindings as $key => $value) {
            $statement->bindValue($key, $value);
        }
        $statement->execute();
        return $statement->fetchAll(Db::FETCH_CLASS, self::getClassName());
    }

    public static function insert(array $values, bool $autoIncrement = false)
    {
        $paramBindings = [];
        $sql = "INSERT INTO " . self::getEntityName() . " VALUES (";
        if ($autoIncrement) {
            $sql .= "NULL, ";
        }
        $count = count($values);
        $i = 1;
        foreach ($values as $value) {
            $paramName = ":value$i";
            if ($i < $count) {
                $sql .= "$paramName, ";
            } else {
                $sql .= "$paramName)";
            }
            $i++;
            $paramBindings[$paramName] = $value;
        }
        $statement = Db::getInstance()->prepare($sql);
        foreach ($paramBindings as $key => &$value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
    }

    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id=$id";
        return self::executes($sql);

    }

    public static function update($id, array $datas)
    {
        $sql = "update " . self::getEntityName() . " set ";
        $count = count($datas);
        $i = 1;
        foreach ($datas as $key => $value) {
            if ($i < $count) {
                $sql .= "$key='$value',";
            } else {
                $sql .= "$key='$value'";
            }
            $i++;
        }
        $sql .= " where id=:id";
        $statement = Db::getInstance()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}
