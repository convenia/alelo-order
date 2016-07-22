<?php

namespace Convenia\AleloOrder\Registries;

use Convenia\AleloOrder\Fields\Formats\FieldC;
use Convenia\AleloOrder\Fields\Formats\FieldN;

/**
 * Class TraillerRegistry.
 */
class TraillerRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'       => FieldN::class,
            'position'     => 1,
            'length'       => 1,
            'defaultValue' => 9,
        ],
        'employeeRegTotals' => [
            'format'   => FieldN::class,
            'position' => 2,
            'length'   => 6,
            'rules'        => [
                'required'
            ],
        ],
        'orderTotal' => [
            'format'   => FieldN::class,
            'position' => 8,
            'length'   => 15,
            'rules'        => [
                'required'
            ],
        ],
        'blankSpaces' => [
            'format'   => FieldC::class,
            'position' => 23,
            'length'   => 372,
            'defaultValue' => ' ',
        ],
        'registryId' => [
            'format'   => FieldN::class,
            'position' => 395,
            'length'   => 6,
            'rules'    => [
                'required'
            ],
        ],
    ];
}
