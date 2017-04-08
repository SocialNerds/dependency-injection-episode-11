<?php

namespace AppBundle;

class GetResponse {

  private $message;

  function __construct(SocialResponse $socialResponse) {
    $this->message = $socialResponse->message;
  }

  public function get() {
   return $this->message;
  }
}
