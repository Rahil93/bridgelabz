<?php
class Node{
  public $data;
  public $next;
  function __construct($data)
  {
    $this->data = $data;
  }
}

class LinkedList{
  public static $head;

  public static function insert($data)
  {
    $node = new Node($data);

    if (self::$head == null) {
      self::$head = $node;
    }

    $n = self::$head;
    while ($n->next != null) {
      $n = $n->next;
    }
    $n->next = $node;
    $node->next = null;
  }

  public static function add($data)
  {
    $n = self::$head;
    $n1 = null;

    while (strcmp($data,$n->data) != 0 && $n->next != null) {
        $n1 = $n;
        $n = $n->next;
    }
    if (strcmp($data,$n->data) != 0) {
      LinkedList::insert($data);
    }
    else {
      echo "Data is already present...\n";
    }
  }

  public static function remove($data)
  {
    $n = self::$head;
    $n1 = null;

    while (strcmp($data,$n->data) != 0 && $n->next != null) {
        $n1 = $n;
        $n = $n->next;
    }
    if (strcmp($data,self::$head->data) == 0) {
      $n = self::$head;
      self::$head = self::$head->next;
      $n = null;
    }
    elseif (strcmp($data,$n->data) == 0) {
        $n1->next = $n->next;
        $n = null;
    }
    else {
      LinkedList::insert($data);
    }
  }

  public static function search($data)
  {
    $n = self::$head;

    while ($n->next != null) {
      if (strcmp($data,$n->data) == 0) {
        return true;
        break;
      }
      $n = $n->next;
    }
    return false;
  }

  public static function size()
  {
    $n = self::$head;
    $size = 0;
    while ($n->next != null) {
      $n = $n->next;
      $size++;
    }
    $size++;
    return $size;
  }

  public static function index($data)
  {
    $n = self::$head;
    $count = 0;
    while (strcmp($data,$n->data) != 0 && $n->next != null) {
      $n = $n->next;
      $count++;
    }
    $count++;
    return $count;
  }

  public static function insertAt($data,$pos)
  {
    $node = new Node($data);

    $size = LinkedList::size();

    if ($pos == 0) {
      $node->next = self::$head;
      self::$head = $node;
    }
    elseif ($pos == $size) {
      self::insert($data);
    }
    else {
      $n = self::$head;
      for ($i = 0; $i < $pos - 1; $i++) {
        $n = $n->next;
      }
      $node->next = $n->next;
      $n->next = $node;
    }
  }

  public static function pop()
  {
    $n = self::$head;
    $n1 = null;
    while ($n->next != null) {
      $n1 = $n;
      $n = $n->next;
    }
    $n1->next = null;
    $n = null;
  }

  public static function display()
  {
    $n = self::$head;
    while ($n->next != null) {
      echo "|".$n->data."|-->";
      $n = $n->next;
    }
    echo "|".$n->data."|null";
  }
}
 ?>
