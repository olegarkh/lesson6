<?php


abstract class AbstractModel
{
   protected static $table = 'news';

   protected $data = [];

   public function __set($k, $v)
   {
       $this->data[$k] = $v;
   }

   public function __get($k)
   {
       return $this->data[$k];
   }

   public function __isset($k)
   {
       return $this->data[$k];
   }

   public static function findAll()
   {
       $class = get_called_class();
       $sql = 'SELECT * FROM ' . static::$table;
       $db = new DB();

       $db->setClassName($class);
       if ($res = $db->query($sql)){
           return $res;
       }
       else{
           throw new HTTP404Exception('Не удалось получить записи из БД !');
       }
   }

   public static function  findOneByPk($id)
   {
       $class = get_called_class();
       $sql = 'SELECT * FROM '. static::$table .' WHERE id = :id';

       $db = new DB();
       $db->setClassName($class);
       $res = $db->query($sql, [':id'=>$id]);

       if (!empty($res)){
           return $res[0];
       }
       else{
           throw new HTTP404Exception('Запись с указанным идентификатором не найдена ! ');
       }
   }

   public static function findByColumn($column, $value)
   {
       $sql = 'SELECT * FROM '. static::$table .' WHERE ' .$column . '= :value ';
       $db = new DB();
       $db->setClassName(get_called_class());

       $res = $db->query($sql, [':value'=>$value]);

       if (!empty($res)){
           return $res[0];
       }
       else{
           throw new HTTP404Exception('Ничего не найдено в базе данных !');
       }
   }

   protected function insert()
   {
       $cols = array_keys($this->data);
       $data = [];

       foreach ($cols as $col){
           $data[':'.$col] = $this->data[$col];
       }

       $sql = 'INSERT INTO ' . static::$table . '(' .implode(', ',$cols). ')
                         VALUES (' .implode(', ', array_keys($data)). ')';

       $db = new DB;
       $db->execute($sql, $data);
       $this->id = $db->lastInsertId();
       return $this->id;
   }

   protected function update()
   {
       $cols = array_keys($this->data);
       $data = [];
       $set = [];
       foreach ($cols as $col){
           $data[':'.$col] = $this->data[$col];
           if ($col == 'id'){
               continue;
           }
           $set[] = $col.' = :'.$col;
       }

       $sql = 'UPDATE '. static::$table .  ' SET '. implode($set, ', ') . ' WHERE id = :id ';

       $db = new DB;
       $db->execute($sql, $data);

       return $this->id;
   }

   public function save()
   {
       if (isset($this->id)){

           return $this->update();
       }
       else{
           return $this->insert();
       }
   }

    public function delete()
    {
       $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id ';
       $db = new DB;
       $db->query($sql, [':id'=>$this->id]);

    }

} 