<?php
// require 'Node.php';
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

  public function insert($data)
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
    // $node = &$node;
  }

  public function display()
  {
    $n = self::$head;
    while ($n->next != null) {
      echo "|".$n->data."|-->";
      $n = $n->next;
    }
    echo "|".$n->data."|null";
  }
}

  $data;
  $size;
  echo "Enter the no. of node add in Linked list : ";
  fscanf(STDIN,"%s\n",$size);
  for ($i = 0; $i < $size; $i++) {
    fscanf(STDIN,"%s\n",$data);
    LinkedList::insert($data);
  }

  LinkedList::display();

 ?>
