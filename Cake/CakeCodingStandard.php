<?php
/**
 * CakePHP Coding Standard and some more.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Tarique Sani <tarique@sanisoft.com>
 * @copyright 2008 SANIsoft Technologies Pvt Ltd http://sanisoft.com/
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link      http://sanisoft.com/downloads/cakephp_sniffs/
 */

if (class_exists('PHP_CodeSniffer_Standards_CodingStandard', true) === false) {
  throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_CodingStandard not found');
}

/**
 * CakePHP Coding Standard.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Tarique Sani <tarique@sanisoft.com>
 * @copyright 2008 SANIsoft Technologies Pvt Ltd http://sanisoft.com/
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link      http://sanisoft.com/downloads/cakephp_sniffs/
 */
class PHP_CodeSniffer_Standards_Cake_CakeCodingStandard extends PHP_CodeSniffer_Standards_CodingStandard
{


  /**
   * Return a list of external sniffs to include with this standard.
   *
   * The CakePHP standard uses some PEAR, Zend and Squiz sniffs.
   *
   * @return array
   */
  public function getIncludedSniffs()
  {
    return  array(
      'Generic/Sniffs/PHP/DisallowShortOpenTagSniff.php',
      'Generic/Sniffs/NamingConventions/UpperCaseConstantNameSniff.php',
      'Generic/Sniffs/WhiteSpace/',
      'Generic/Sniffs/Formatting/MultipleStatementAlignmentSniff.php',
      'PEAR/Sniffs/Files/LineEndingsSniff.php',
      'PEAR/Sniffs/Functions/FunctionCallArgumentSpacingSniff.php',
      'PEAR/Sniffs/Functions/FunctionCallSignatureSniff.php',
      'PEAR/Sniffs/Functions/ValidDefaultValueSniff.php',
      'PEAR/Sniffs/NamingConventions/ValidClassNameSniff.php',
      'Squiz/Sniffs/Functions/GlobalFunctionSniff.php',
      'Squiz/Sniffs/ControlStructures/InlineIfDeclarationSniff.php'
    );

  }//end getIncludedSniffs()


}//end class
?>
