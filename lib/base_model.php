<?php

class BaseModel{
  public function __construct($attributes = null) {
    if ($attributes == null)
      return;
    // Käydään attribuutit läpi
    foreach (get_object_vars($this) as $attribute => $value) {
      // Jos attribuutti on olemassa ja on attribuuttilistassa...
      if (property_exists($this, $attribute) && array_key_exists($attribute, $attributes)) {
        // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
        $this->{$attribute} = $attributes[$attribute];
      }
    }
  }

  public function errors(){
    $errors = array();
    foreach (get_object_vars($this) as $attribute => $value) {
      if (method_exists($this, "validate_".$attribute)) {
        $errors = array_merge($errors, $this->{"validate_".$attribute}());
      }
    }
    return $errors;
  }

  public static function tablename() {
    return strtolower(get_class(static::newself()));
  }

  public static function find_by($field, $val) {
    $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE '.$field.' = :'.$field);
    $query->execute(array($field => $val));
    $rows = $query->fetchAll();

    $collection = array();
    foreach($rows as $row){
      $collection[] = static::newself($row);
    }
    return $collection;
  }

  public static function find($id) {
    $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if (!$row) {
      return null;
    }
    return static::newself($row);
  }

  public static function all() {
    $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'"');
    $query->execute();
    $rows = $query->fetchAll();

    $collection = array();
    foreach($rows as $row){
      $collection[] = static::newself($row);
    }
    return $collection;
  }

  public function save(){
    $attrs = get_object_vars($this);
    // do not save id, should be new object
    unset($attrs['id']);
    $attrs_list_field = join(', ', array_keys($attrs));
    $attrs_list_value = ':'.join(', :', array_keys($attrs));
    $query = DB::connection()->prepare('INSERT INTO "'.static::tablename().'" ('.$attrs_list_field.') VALUES ('.$attrs_list_value.') RETURNING id');
    $query->execute($attrs);
    $row = $query->fetch();
    $this->id = $row['id'];
  }

  public function update(){
    $attrs = get_object_vars($this);
    $attrs_list_field = join(', ', array_keys($attrs));
    $attrs_list_value = ':'.join(', :', array_keys($attrs));
    $query = DB::connection()->prepare('UPDATE "'.static::tablename().'" ('.$attrs_list_field.') = ('.$attrs_list_value.') WHERE id = :id');
    $query->execute($attrs);
  }

  public function delete(){
    $query = DB::connection()->prepare('DELETE FROM "'.static::tablename().'" WHERE id = :id');
    $query->execute(array("id" => $this->id));
  }

}
