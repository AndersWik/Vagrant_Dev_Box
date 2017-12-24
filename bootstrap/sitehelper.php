<?php
class SiteHelper {

  const DOMAIN = '{{server.name}}';
  const ROOT = '{{document.root}}';
  const KEYS = __DIR__.'/keys.json';
  const DIRCONF = __DIR__.'/templates/dir.conf';
  const INDEX = __DIR__.'/templates/index.php';
  const SITECONF = __DIR__.'/templates/site.dev.conf';
  const APACHECONF = __DIR__.'/templates/apache2.conf';

  private function getUsageHelp() {

    echo <<<USAGE

    Usage: Helper for setting up vagrant environment

    setdomain         Set domain to be configured
    getdomain         Get configured domain
    sethost           Set hostname to be configured
    gethost           Get configured hostname
    setdomainandhost  Set domain and host
    setframework      Set framework to be configured
    getframework      Get configured framework
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

  private function getJSON($path = "") {

    return json_decode($this->getFile($path), true);
  }

  private function setJSON($path = "", $content = "") {

    $this->setFile($path, json_encode($content));
  }

  private function getKey($key = "") {

    $value = "";
    $content = $this->getJSON(SiteHelper::KEYS);
    if(isset($content[$key])) {
      $value = $content[$key];
    }

    return $value;
  }

  private function setKey($key = "", $value = "") {

    $content = $this->getJSON(SiteHelper::KEYS);
    $content[$key] = $value;
    $this->setJSON(SiteHelper::KEYS, $content);
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

  private function getPath() {

    $framework = $this->getKey("framework");
    $path = "/var/www/site/public_html";

    if($framework == "wordpress" || $framework == "wp") {

      $path = "/var/www/site/wordpress";

    }

    return $path;
  }

  public function run() {

    $args = $this->getArgs();

    if($args['key'] == "setdomain") {
      $this->setKey("domain", $args['value']);

    } elseif($args['key'] == "getdomain") {
      echo $this->getKey("domain");

    } elseif($args['key'] == "sethost") {
      $this->setKey("host", str_replace(".", "-", $args['value']));

    } elseif($args['key'] == "gethost") {
      echo $this->getKey("host");

    } elseif($args['key'] == "setframework") {
      $this->setKey("framework", $args['value']);

    } elseif($args['key'] == "getframework") {
      echo $this->getKey("framework");

    } elseif($args['key'] == "getdirconf") {
      $content = $this->getFile(SiteHelper::DIRCONF);
      echo $content;

    } elseif($args['key'] == "getindex") {
      $content = $this->getFile(SiteHelper::INDEX);
      $content = str_replace(SiteHelper::DOMAIN, $this->getKey("domain"), $content);
      echo $content;

    } elseif($args['key'] == "getsiteconf") {
      $content = $this->getFile(SiteHelper::SITECONF);
      $content = str_replace(SiteHelper::DOMAIN, $this->getKey("domain"), $content);
      $content = str_replace(SiteHelper::ROOT, $this->getPath(), $content);
      echo $content;

    } elseif($args['key'] == "getapacheconf") {
      $content = $this->getFile(SiteHelper::APACHECONF);
      echo $content;

    } elseif($args['key'] == "getenv") {
      $content = $this->getFile(SiteHelper::ENV);
      $content = str_replace(SiteHelper::DOMAIN, $this->getKey("domain"), $content);
      echo $content;

    } else {
      $this->getUsageHelp();
    }
  }
}

$helper = new SiteHelper();
$helper->run();
