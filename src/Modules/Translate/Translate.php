<?php
namespace App\Modules\Translate;


/**
 * Translate
 */
class Translate
{
  /**
   *Lang
   *@var string
   */
  private $lang = '';

  /**
   *Path files
   *@var string
   */
  private static $pathFiles = '';


  /**
   *Dictionary
   *@var array
   */
  private $dictionary = [];


  public function __construct(string $pathFiles)
  {
    $this->pathFiles = rtrim($pathFiles, '/');
  }

  /**
   *Get lang
   *@return string
   */
  public function getLang() : string
  {
    return $this->lang;
  }

  /**
   *Set lang
   *
   */
  public function setLang(string $lang) : void
  {
    $this->lang = $lang;
  }

  /**
   *Parse File
   *
   *@return array
   */
  private function parseFile(): array
  {
    $filename = self::$pathFiles . DIRECTORY_SEPARATOR . $this->lang . '.ini';
    if (file_exists($filename)) {
      return (array) parse_ini_file($filename);
    }

    return [];
  }

  public function translate(string $text) : string
  {

    return isset($this->dictionary[$text]) ? $this->dictionary[$text] : $text;
  }
}
