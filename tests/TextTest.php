<?php
/**
 * Created by PhpStorm.
 * User: av007
 * Date: 3/14/18
 * Time: 5:07 PM
 */

namespace Translit\Test;

use PHPUnit_Framework_TestCase as TestCase;
use Translit\Helper\Text;


/**
 * Class TextTest
 *
 * @package Av007\Helper
 * @author Vladimir Avdeev <avdeevvladimir@gmail.com>
 */
class TextTest extends TestCase
{
    public function testSlugify()
    {
        $this->assertEquals('test-test1', Text::slugify('test test1&'));
    }

    public function testTransliterate()
    {
        $this->assertEquals('test-test1', Text::transliterate('тест-teсt1'));
    }

    public function testUrlFormat()
    {
        $this->assertEquals('test-test1', Text::urlFormat('тест teсt1&'));
    }
}
