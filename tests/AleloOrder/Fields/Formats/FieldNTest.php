<?php

namespace Convenia\AleloOrder\Tests\Fields\Formats;

use Convenia\AleloOrder\Fields\Formats\FieldN;
use Convenia\AleloOrder\Tests\BaseTest;

/**
 * Class FieldNTest.
 */
class FieldNTest extends BaseTest
{
    public function test_format()
    {
        $expected = '0000000000000060000';

        $value = (new FieldN('600,00'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
        $this->assertEquals($expected, $value->__toString());
        $this->assertEquals(1, $value->getPosition());
    }

    public function test_format_cpf()
    {
        $expected = '00000000057132436562';

        $value = (new FieldN('571.324.365-62'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
        $this->assertEquals($expected, $value->__toString());
        $this->assertEquals(1, $value->getPosition());
    }

    public function test_format_cnpj()
    {
        $expected = '00000077166565000178';

        $value = (new FieldN('77.166.565/0001-78'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
        $this->assertEquals($expected, $value->__toString());
        $this->assertEquals(1, $value->getPosition());
    }
}
