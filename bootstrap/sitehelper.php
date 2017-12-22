<?php
class SiteHelper {

  const DOMAIN = 'site.dev';
  const KEYS = __DIR__.'/keys.json';
  const DIRCONF = __DIR__.'/templates/dir.conf';
  const INDEX = __DIR__.'/templates/index.php';
  const SITECONF = __DIR__.'/templates/site.dev.conf';

  public function getUsageHelp() {

    echo <<<USAGE

    Usage: Helper for setting up vagrant environment

    setdomain         Set domain to be configured
    getdomain         Get configured domain
    setHost           Set hostname to be configured
    getHost           Get configured hostname
    setdomainandhost  Set domain and host
    getdirconf        Get content for dir.conf file
    getindex          Get content for index file
    getsiteconf       Get content for virtual host file
    \n
USAGE;

  }

  private function getFile($path = "") {

    $content = "";

    if (file_exists($path)) {
      try {
          $content = file_get_contents($path);
          if ($content === false) {
              $content = "";
          }
      } catch (Exception $e) {
          echo "Exception on getting file";
      }
    } else {
      echo "File does not exist";
    }

    return $content;
  }

  private function setFile($path = "", $content = "") {

    try {
        file_put_contents($path, $content);
    } catch (Exception $e) {
        echo "Exception on setting file";
    }
  }

  public function getJSON($path = "") {

    return json_decode($this->getFile($path), true);
  }

  public function setJSON($path = "", $content = "") {

    $this->setFile($path, json_encode($content));
  }

  public function getKey($key = "") {

    $value = "";
    $content = $this->getJSON(SiteHelper::KEYS);
    if(isset($content[$key])) {
      $value = $content[$key];
    }

    return $value;
  }

  public function setKey($key = "", $value = "") {

    $content = $this->getJSON(SiteHelper::KEYS);
    $content[$key] = $value;
    $this->setJSON(SiteHelper::KEYS, $content);
  }

  public function getDirConf() {

    $content = $this->getFile(SiteHelper::DIRCONF);
    return $content;
  }

  public function getIndex() {

    $content = $this->getFile(SiteHelper::INDEX);
    $content = str_replace(SiteHelper::DOMAIN, $this->getKey("domain"), $content);
    return $content;
  }

  public function getSiteConf() {

    $content = $this->getFile(SiteHelper::SITECONF);
    $content = str_replace(SiteHelper::DOMAIN, $this->getKey("domain"), $content);
    return $content;
  }

  private function getArgs() {

    if(!isset($argv)) {
      $argv = $_SERVER['argv'];
    }

    $array = array("key" => "", "value" => "");

    if(isset($argv[1])) {
      $array['key'] = $argv[1];
    }

    if(isset($argv[2])) {
      $array['value'] = $argv[2];
    }

    return $array;
  }

  public function run() {

    $args = $this->getArgs();

    if($args['key'] == "setdomain") {
      $this->setKey("domain", $args['value']);

    } elseif($args['key'] == "getdomain") {
      echo $this->getKey("domain");

    } elseif($args['key'] == "setHost") {
      $this->setKey("host", $args['value']);

    } elseif($args['key'] == "getHost") {
      echo $this->getKey("host");

    } elseif($args['key'] == "setdomainandhost") {
      $this->setKey("domain", $args['value']);
      $this->setKey("host", str_replace(".", "-", $args['value']));

    } elseif($args['key'] == "getdirconf") {
      echo $this->getDirConf();

    } elseif($args['key'] == "getindex") {
      echo $this->getIndex();

    } elseif($args['key'] == "getsiteconf") {
      echo $this->getSiteConf();

    } else {
      $this->getUsageHelp();
    }
  }
}

$helper = new SiteHelper();
$helper->run();
