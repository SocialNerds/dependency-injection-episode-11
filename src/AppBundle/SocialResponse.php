<?php

namespace AppBundle;

class SocialResponse {

  public $message;

  function __construct(string $message) {
    $this->message = $message;
  }
}
