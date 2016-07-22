<?php

namespace Convenia\AleloOrder\Registries;

use Convenia\AleloOrder\Fields\Formats\FieldN;
use Convenia\AleloOrder\Fields\Formats\FieldC;

/**
 * Class BranchRegistry.
 */
class BranchRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'       => FieldN::class,
            'position'     => 1,
            'length'       => 1,
            'defaultValue' => 1,
        ],
        'cnpjBase' => [
            'format'   => FieldN::class,
            'position' => 2,
            'length'   => 8,
            'rules'    => [
                'required',
            ]
        ],
        'cnpjBranch' => [
            'format'       => FieldN::class,
            'position'     => 10,
            'length'       => 4,
            'defaultValue' => 'A001',
        ],
        'cnpjDigit' => [
            'format'   => FieldN::class,
            'position' => 14,
            'length'   => 2,
            'rules'    => [
                'required'
            ],
        ],
        'aleloCompanyCod' => [
            'format'   => FieldN::class,
            'position' => 16,
            'length'   => 10,
            'rules'    => [
                'required'
            ],
        ],
        'name' => [
            'format'   => FieldC::class,
            'position' => 26,
            'length'   => 35,
        ],
        'areaCode' => [
            'format'   => FieldN::class,
            'position' => 61,
            'length'   => 4,
        ],
        'firstContactName' => [
            'format'   => FieldC::class,
            'position' => 65,
            'length'   => 35,
            'rules'    => [
                'required'
            ],
        ],
        'firstContactAddress' => [
            'format'   => FieldC::class,
            'position' => 100,
            'length'   => 40,
        ],
        'firstContactPhone' => [
            'format'   => FieldN::class,
            'position' => 140,
            'length'   => 12,
        ],
        'firstContactBranch' => [
            'format'   => FieldN::class,
            'position' => 152,
            'length'   => 6,
        ],
        'secondContactName' => [
            'format'   => FieldC::class,
            'position' => 158,
            'length'   => 35,
        ],
        'secondContactAddress' => [
            'format'   => FieldC::class,
            'position' => 193,
            'length'   => 40,
        ],
        'secondContactPhone' => [
            'format'   => FieldN::class,
            'position' => 233,
            'length'   => 12,
        ],
        'secondContactBranch' => [
            'format'   => FieldN::class,
            'position' => 245,
            'length'   => 6,
        ],
        'thirdContactName' => [
            'format'   => FieldC::class,
            'position' => 251,
            'length'   => 35,
        ],
        'thirdContactAddress' => [
            'format'   => FieldC::class,
            'position' => 286,
            'length'   => 40,
        ],
        'thirdContactPhone' => [
            'format'   => FieldN::class,
            'position' => 326,
            'length'   => 12,
        ],
        'thirdContactBranch' => [
            'format'   => FieldN::class,
            'position' => 338,
            'length'   => 6,
        ],
        'branchCod' => [
            'format'   => FieldC::class,
            'position' => 344,
            'length'   => 20,
            'rules'        => [
                'required'
            ],
        ],
        'blankSpaces' => [
            'format'   => FieldC::class,
            'position' => 364,
            'length'   => 31,
            'defaultValue' => '',
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
