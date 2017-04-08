<?php

namespace AppBundle;

class GetResponse {

  private $message;

  function __construct(string $message) {
    $this->message = $message;
  }

  public function get() {
   return $this->message;
  }
}
