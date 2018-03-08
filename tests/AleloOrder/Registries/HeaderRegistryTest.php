<?php

namespace Convenia\AleloOrder\Tests\Registries;

use Convenia\AleloOrder\Tests\BaseTest;
use Convenia\AleloOrder\Registries\HeaderRegistry;

/**
 * Class HeaderRegistryTest.
 */
class HeaderRegistryTest extends BaseTest
{
    /**
     * @expectedException Convenia\PayrollFileReader\Exceptions\FieldNotExistsException
     */
    public function test_field_not_exists()
    {
        $header = new HeaderRegistry(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
                'contractNumber' => 123456,
                'benefitType' => '2', // 1 = AVV 2= RVV 3= CVV 4= NVV 5= FVV
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
                'registryId' => 1,
                'invalid_field' => '1'
            ]
        );
    }

    public function test_complete_fields()
    {
        $header = new HeaderRegistry(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
                'contractNumber' => 123456,
                'benefitType' => '2', // 1 = AVV 2= RVV 3= CVV 4= NVV 5= FVV
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
                'registryId' => 1
            ]
        );

        $expected = '005052016A001RAZAO SOCIAL COM CARACTERES INVALID0531568400013400000000000000001234560000000000000021052016QUALQUERCOISA     007                                                                                                                                                                                                                                                                           000001';

        $this->assertEquals($expected, (string)$header);
    }
}
