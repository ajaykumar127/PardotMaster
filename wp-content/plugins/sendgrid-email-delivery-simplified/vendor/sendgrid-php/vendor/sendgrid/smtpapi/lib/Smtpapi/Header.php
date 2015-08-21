<?php

namespace Smtpapi;

class Header {
  public $to           = array();
  public $sub          = array();
  public $unique_args  = array();
  public $category     = array();
  public $section      = array();
  public $filters      = array();
  public $send_at      = null;
  public $send_each_at = array();

  public function __construct() {}

  public function addTo($email, $name=null) {
    $this->to[] = ($name ? $name . " <" . $email . ">" : $email);
    return $this;
  }

  public function setTos(array $emails) {
    $this->to = $emails;
    return $this;
  }
  
  public function setSendAt($send_at) {
    $this->send_at = $send_at;
    $this->send_each_at = array();
    return $this;
  }
  
  public function setSendEachAt(array $send_each_at) {
    $this->send_each_at = $send_each_at;
    $this->send_at = null;
    return $this;
  }
  
  public function addSendEachAt($send_at) {
    $this->send_at = null;
    $this->send_each_at[] = $send_at;
    return $this;
  }

  public function addSubstitution($from_value, array $to_values) {
    $this->sub[$from_value] = $to_values;
    return $this;
  }

  public function setSubstitutions($key_value_pairs) {
    $this->sub = $key_value_pairs;
    return $this;
  }

  public function addUniqueArg($key, $value) {
    $this->unique_args[$key] = $value;
    return $this;
  }

  public function setUniqueArgs(array $key_value_pairs) {
    $this->unique_args = $key_value_pairs;
    return $this;
  }

  public function addCategory($category) {
    $this->category[] = $category;
    return $this;
  }

  public function setCategories($categories) {
    $this->category = $categories;
    return $this;
  }

  public function addSection($from_value, $to_value) {
    $this->section[$from_value] = $to_value;
    return $this;
  }

  public function setSections(array $key_value_pairs) {
    $this->section = $key_value_pairs;
    return $this;
  }

  public function addFilter($filter_name, $parameter_name, $parameter_value) {
    $this->filters[$filter_name]['settings'][$parameter_name] = $parameter_value;
    return $this;
  }

  public function setFilters($filter_setting) {
    $this->filters = $filter_setting;
    return $this;
  }

  private function toArray() {
    $data = array();

    if ($this->to) {
      $data["to"] = $this->to;
    }
    if ($this->sub) {
      $data["sub"] = $this->sub;
    }
    if ($this->unique_args) {
      $data["unique_args"] = $this->unique_args;
    }
    if ($this->category) {
      $data["category"] = $this->category;
    }
    if ($this->section) {
      $data["section"] = $this->section;
    }
    if ($this->filters) {
      $data["filters"] = $this->filters;
    }
    if ($this->send_at) {
      $data["send_at"] = $this->send_at;
    }
    if ($this->send_each_at) {
      $data["send_each_at"] = $this->send_each_at;
    }
  
    return $data;
  }

  public function jsonString($options = null) {
    if ($options == null) {
      $options = JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
    }
    if (count($this->toArray()) <= 0) {
      return "{}";
    }

    $json_string = json_encode($this->toArray(), $options);

    // unescape 5.3 PHP's escaping of forward slashes
    return str_replace('\\/', '/', $json_string);
  }
}
