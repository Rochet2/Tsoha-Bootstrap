<?php

class BaseModel{
  // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
  protected $validators;

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
    // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
    $errors = array();

    foreach($this->validators as $validator){
      // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
    }

    return $errors;
  }

  public static function tablename() {
    return strtolower(get_class(static::newself()));
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
    // do not save validators nor id
    unset($attrs['id']);
    unset($attrs['validators']);
    $attrs_list_field = join(', ', array_keys($attrs));
    $attrs_list_value = ':'.join(', :', array_keys($attrs));
    $query = DB::connection()->prepare('INSERT INTO "'.static::tablename().'" ('.$attrs_list_field.') VALUES ('.$attrs_list_value.') RETURNING id');
    $query->execute($attrs);
    $row = $query->fetch();
    $this->id = $row['id'];
  }

}
