<?php
/**
 * Checks the nesting level for methods.
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
 * Checks the nesting level for methods.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Tarique Sani <tarique@sanisoft.com>
 * @copyright 2008 SANIsoft Technologies Pvt Ltd http://sanisoft.com/
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link      http://sanisoft.com/downloads/cakephp_sniffs/
 */
class Cake_Sniffs_Metrics_NestingLevelSniff extends Generic_Sniffs_Metrics_NestingLevelSniff
{

    /**
     * A nesting level than this value will throw a warning.
     *
     * @var int
     */
    protected $nestingLevel = 3;

    /**
     * A nesting level than this value will throw an error.
     *
     * @var int
     */
    protected $absoluteNestingLevel = 5;

}//end class

?>
