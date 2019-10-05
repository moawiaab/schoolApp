<?php 

namespace FR_MO\Models;
use FR_MO\LIB\database\PDOdatabase;

class AppModel { 

    const DATA_TYPE_BOOL      = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR       = \PDO::PARAM_STR;
    const DATA_TYPE_INT       = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL   = 4;

     
    private function prepareValues(\PDOStatement &$stmt)
    {
          foreach(static::$tableSchema as $columnName => $type)
        {
            if($type == 4){
                $sanitizedValue = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            }else{
                $stmt->bindValue(":{$columnName}", $this->$columnName, $type);   
            }
             
        }
    }
    private function buildNameParametersSQL()
    {
        $namedParams = '';
        
        foreach(static::$tableSchema as $columnName => $type){
           $namedParams .= $columnName . '= :' .$columnName .',';
        }
        return trim($namedParams, ', ');
    }
    
    private function create()
    {
      
        $sql = 'INSERT INTO ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL();
      
        $stmt = PDOdatabase::getInstance()->prepare($sql);
        $this->prepareValues($stmt);
        
       // var_dump($stmt);
        if($stmt->execute()){
            $this->{static::$primarykey} = PDOdatabase::getInstance()->lastInsertId();
            return true;
        }
        return false;
    }
    
     private function update()
    {
        global $connection;
        $sql = 'UPDATE ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL() . ' WHERE ' .static::$primarykey .' = '. $this->{static::$primarykey};
        
        $stmt = PDOdatabase::getInstance()->prepare($sql);
        $this->prepareValues($stmt);
        //echo $sql;
        return $stmt->execute();
    }
    
    public function save($primarykeyCheked = true)
    {
        if(false === $primarykeyCheked){
            return $this->create();
        }
        return $this->{static::$primarykey} === null ? $this->create() : $this->update();
    }
    
     public function delete()
    {

        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' .static::$primarykey .' = '. $this->{static::$primarykey};
         $stmt = PDOdatabase::getInstance()->prepare($sql);  
        
        return $stmt->execute();
    }
    
    public static function getAll()
    {
        
        $sql = 'SELECT * FROM ' . static::$tableName;
        
        $stmt = PDOdatabase::getInstance()->prepare($sql);
         $stmt->execute();
       
         if(method_exists(get_called_class(), '__construct'))
        {
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));  
            
        }else{
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS , get_called_class());
        }
        if((is_array($results) && !empty($results)))
        {
            $generator = function() use ($results){
                foreach ($results as $result){
                    yield $result;
                }
            };
            return $generator();
        };
        return false;
        
    }
    
      public static function getByPK($pk)
    {
        
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' .static::$primarykey . ' = "' . $pk . '"';
        $stmt = PDOdatabase::getInstance()->prepare($sql);
        if($stmt->execute() === true ) 
        {
             if(method_exists(get_called_class(), '__construct'))
        {
        $opj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));  
            
        }else{
            $opj = $stmt->fetchAll(\PDO::FETCH_CLASS , get_called_class());
        }
            return !empty($opj) ? array_shift($opj) : false;
        }   
        return false;
      
      }
    
    public static function getBy($columns, $options = array())
    {
        $whereClauseColumns = array_keys($columns);
        $whereClauseValues = array_values($columns);
        $whereClause = [];
        
        for($i = 0, $ii = count($whereClauseColumns); $i < $ii; $i++){
            $whereClause[] = $whereClauseColumns[$i] . ' = "' . $whereClauseValues[$i] . '"';
        }
        $whereClause = implode(' AND ', $whereClause);
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . $whereClause;
        return static::get($sql, $options);
    }
    
    public static function get($sql, $option = array())
    {
         global $connection;
        $stmt = PDOdatabase::getInstance()->prepare($sql);
        if(!empty($option))
        {
        foreach($option as $columnName => $type)
        {
            if($type[0] == 4){
                $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            }else{
                $stmt->bindValue(":{$columnName}", $type[1], $type[0]);   
            }
        } 
        }

         $stmt->execute();
        if(method_exists(get_called_class(), '__construct'))
        {

        $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));  

            
        }else{
           
         $results = $stmt->fetchAll(\PDO::FETCH_CLASS , get_called_class());

        }
        if((is_array($results) && !empty($results)))
        {
            $generator = function() use ($results){
                foreach ($results as $result){
                    yield $result;
                }
            };
            return $generator();
        };
        return false;
    }
    
     public static function getOne($sql, $option = array())
    {
         global $connection;
        $stmt = PDOdatabase::getInstance()->prepare($sql);
        if(!empty($option))
        {
        foreach($option as $columnName => $type)
        {
            if($type[0] == 4){
                $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            }else{
                $stmt->bindValue(":{$columnName}", $type[1], $type[0]);   
            }
        } 
        }

         $stmt->execute();
        if(method_exists(get_called_class(), '__construct'))
        {
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));  
            
        }else{
            $results = $stmt->fetch();
        }
        if((!empty($results)))
        {
            
            return $results;
       
        };
        return false;
    }
}