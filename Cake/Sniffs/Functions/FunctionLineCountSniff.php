<?php
/**
 * Cake_Sniffs_Functions_FunctionLineCountSniff
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

/**
 * Cake_Sniffs_Functions_FunctionLineCountSniff.
 *
 * Checks the number of lines in a function.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Tarique Sani <tarique@sanisoft.com>
 * @copyright 2008 SANIsoft Technologies Pvt Ltd http://sanisoft.com/
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link      http://sanisoft.com/downloads/cakephp_sniffs/
 */
class Cake_Sniffs_Functions_FunctionLineCountSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * The limit that the number of a lines a function should not exceed.
     *
     * @var int
     */
    protected $lineCountLimit = 45;

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
                T_FUNCTION,
               );

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the
     *                                        stack passed in $tokens..
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['code'] === T_FUNCTION) {
            
            $functionName = $phpcsFile->getDeclarationName($stackPtr);
            $closingBracket = $tokens[$stackPtr]['scope_closer'];

            if ($closingBracket === null) {
	    // Possible inline structure. Other tests will handle it.
	    return;
	    }

            $linesOfCode = $tokens[$closingBracket]['line'] - $tokens[$stackPtr]['line'];
        }

        if ($this->lineCountLimit <= $linesOfCode) {
	    $error = "Expected lines of code in function ".$functionName."() less than, equal to  ".$this->lineCountLimit." found ".$linesOfCode.".  Refactor function";
            $phpcsFile->addError($error, $closingBracket);
            return;
        }
	
    }//end process()


}//end class

?>
