<?php

namespace App\Models;

class M3Result {

  public $status;
  public $message;
    public $data;

  public function toJson()
  {
    return json_encode($this, JSON_UNESCAPED_UNICODE);
  }

}
