<?php
class menu_link {
    public $id;
    public $link;
    public $name;

    function __construct() {
    }
}

/**
 *
 */
class menu
{
  public $table;
  public $db;

  function __construct($db, $table = '')
  {
    $this->db = $db;
    $this->table = $table;
  }

  public function get_menu()
  {
    return $this->db->selectAllObject($this->table, 'menu_link');
  }
}

?>
