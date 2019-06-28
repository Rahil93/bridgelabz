<?php
// require 'Node.php';
class LinkedList{
  public Node $head;
  class Node{
    $data;
    $Node next;
  }
  public function insert($data)
  {
    Node $node = new Node();
    $node->$data = $data;
    $node->next = null;

    if ($head == null) {
      $head = $node;
    }

    Node $n = $head;
    while ($n->next != null) {
      $n = $n->next;
    }
    $n->next = $node;
  }


}

 ?>
