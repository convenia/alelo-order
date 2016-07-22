<?php

namespace Convenia\AleloOrder\Registries;

use Convenia\AleloOrder\Fields\Formats\FieldC;
use Convenia\AleloOrder\Fields\Formats\FieldN;

/**
 * Class HeaderRegistry.
 */
class HeaderRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'       => FieldN::class,
            'position'     => 1,
            'length'       => 1,
            'defaultValue' => 0,
        ],
        'orderDate' => [
            'format'   => FieldN::class,
            'position' => 2,
            'length'   => 8,
            'rules'    => [
                'required',
                'date:dmY',
            ]
        ],
        'channel' => [
            'format'       => FieldC::class,
            'position'     => 10,
            'length'       => 4,
            'defaultValue' => 'A001',
        ],
        'name' => [
            'format'   => FieldC::class,
            'position' => 14,
            'length'   => 35,
            'rules'        => [
                'required'
            ],
        ],
        'cnpj' => [
            'format'   => FieldN::class,
            'position' => 49,
            'length'   => 14,
            'rules'        => [
                'required'
            ],
        ],
        'cpf' => [
            'format'   => FieldN::class,
            'position' => 63,
            'length'   => 11,
        ],
        'contractNumber' => [
            'format'   => FieldN::class,
            'position' => 74,
            'length'   => 11,
            'rules'        => [
                'required'
            ],
        ],
        'orderNumber' => [
            'format'   => FieldN::class,
            'position' => 85,
            'length'   => 6,
        ],
        'orderScheduleDate' => [
            'format'   => FieldN::class,
            'position' => 91,
            'length'   => 8,
        ],
        'benefitType' => [
            'format'   => FieldN::class,
            'position' => 99,
            'length'   => 1,
            'rules'        => [
                'required'
            ],
        ],
        'orderType' => [
            'format'   => FieldN::class,
            'position' => 100,
            'length'   => 1,
            'rules'        => [
                'required'
            ],
        ],
        'accrualMonth' => [
            'format'   => FieldN::class,
            'position' => 101,
            'length'   => 6,
            'rules'        => [
                'required'
            ],
        ],
        'custom' => [
            'format'   => FieldC::class,
            'position' => 107,
            'length'   => 18,
            'defaultValue' => '',
        ],
        'layoutVersion' => [
            'format'       => FieldN::class,
            'position'     => 125,
            'length'       => 3,
            'defaultValue' => 7,
        ],
        'blankSpaces' => [
            'format'   => FieldC::class,
            'position' => 128,
            'length'   => 267,
            'defaultValue' => '',
        ],
        'registryId' => [
            'format'   => FieldN::class,
            'position' => 395,
            'length'   => 6,
            'rules'        => [
                'required'
            ],
        ],
    ];
}
