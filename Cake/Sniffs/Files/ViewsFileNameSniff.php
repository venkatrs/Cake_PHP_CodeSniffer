<?php

/**
 * Cake_Sniffs_Files_ViewsFileNameSniff 
 *
 * Checks file name, and throws warnings if it is not in
 * complaince with CakePHP file naming conventions.
 *
 */
class Cake_Sniffs_Files_ViewsFileNameSniff implements PHP_CodeSniffer_Sniff

{

  /**
   * Returns an array of tokens this test wants to listen for.
   *
   * @return array
   */
  public function register()
  {
    return array(
      T_CLASS,
      T_INTERFACE,
    );

  }//end register()

  /**
   * Processes this test, when one of its tokens is encountered.
   *
   * @param PHP_CodeSniffer_File $phpcsFile The current file being processed.
   * @param int                  $stackPtr  The position of the current token
   *                                        in the stack passed in $tokens.
   *
   * @return void
   */
  public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
  {
    $path = $phpcsFile->getFileName();
    if(!preg_match("/(views)/i", $path)) return;

    $tokens = $phpcsFile->getTokens();
    $classname = $tokens[$phpcsFile->findNext(T_STRING, $stackPtr)]['content'];

    if(preg_match("/(helpers)/i", $path)) {
      $final_classname = $this->classname_without_type($classname, "Helper");
      $msg_on_error = "Cake convention expects the helper class name to end with 'Helper'";
    } else {
      $final_classname = $this->classname_with_type($classname, "View"); 
      $msg_on_error = "Cake convention expects the view class name to end with 'View'";
    }

    if(is_null($final_classname)) {
      $phpcsFile->addError($msg_on_error, $stackPtr);
      return;
    }

    $expected_file_name =  preg_replace('/([A-Z])/', '_${1}', $final_classname);
    if(strpos($expected_file_name, "_") === 0) {
      $expected_file_name = substr($expected_file_name, 1, strlen($expected_file_name));
    }
    $expected_file_name = strtolower($expected_file_name) . ".php";

    if(!preg_match("/" . $expected_file_name . "/", $path)) {
      $error = "File name is expected to be, '" . $expected_file_name . "' for Class with name, '" . $classname . "'";
      $phpcsFile->addError($error, $stackPtr);
    }
  }

  private function classname_without_type($class_name, $type_name) {
    if(preg_match("/(" . $type_name .")/", $class_name)) {
      return substr($class_name, 0, strpos($class_name, $type_name));
    }
    return NULL;
  } 

}//end class

?>
