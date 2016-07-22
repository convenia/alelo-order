<?php

namespace Convenia\AleloOrder\Registries;

use Convenia\AleloOrder\Fields\Formats\FieldN;
use Convenia\AleloOrder\Fields\Formats\FieldC;

/**
 * Class EmployeeRegistry.
 */
class EmployeeRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'       => FieldN::class,
            'position'     => 1,
            'length'       => 1,
            'defaultValue' => 5,
        ],
        'monthValue' => [
            'format'       => FieldN::class,
            'position'     => 2,
            'length'       => 11,
            'defaultValue' => 5,
        ],
        'reserved1' => [
            'format'       => FieldC::class,
            'position'     => 13,
            'length'       => 1,
        ],
        'employeeRegistry' => [
            'format'       => FieldC::class,
            'position'     => 14,
            'length'       => 13,
        ],
        'reserved2' => [
            'format'       => FieldC::class,
            'position'     => 27,
            'length'       => 54,
            'defaultValue' => '',
        ],
        'birthDate' => [
            'format'       => FieldN::class,
            'position'     => 81,
            'length'       => 8,
            'rules'    => [
                'required',
                'date:dmY',
            ]
        ],
        'cpf' => [
            'format'   => FieldN::class,
            'position' => 89,
            'length'   => 11,
            'rules'    => [
                'required',
            ]
        ],
        'identityType' => [
            'format'   => FieldC::class,
            'position' => 100,
            'length'   => 1,
        ],
        'identityNumber' => [
            'format'   => FieldC::class,
            'position' => 101,
            'length'   => 13,
        ],
        'identityIssuer' => [
            'format'   => FieldC::class,
            'position' => 114,
            'length'   => 20,
        ],
        'identityIssuerState' => [
            'format'   => FieldC::class,
            'position' => 134,
            'length'   => 6,
        ],
        'pisNumber' => [
            'format'   => FieldN::class,
            'position' => 140,
            'length'   => 15,
        ],
        'gender' => [
            'format'   => FieldC::class,
            'position' => 155,
            'length'   => 1,
        ],
        'maritalStatus' => [
            'format'   => FieldC::class,
            'position' => 156,
            'length'   => 1,
        ],
        'address' => [
            'format'   => FieldC::class,
            'position' => 157,
            'length'   => 35,
        ],
        'addressAditional' => [
            'format'   => FieldC::class,
            'position' => 192,
            'length'   => 10,
        ],
        'addressNumber' => [
            'format'   => FieldN::class,
            'position' => 202,
            'length'   => 5,
        ],
        'zipcode' => [
            'format'   => FieldN::class,
            'position' => 207,
            'length'   => 8,
        ],
        'city' => [
            'format'   => FieldC::class,
            'position' => 215,
            'length'   => 28,
        ],
        'district' => [
            'format'   => FieldC::class,
            'position' => 243,
            'length'   => 30,
        ],
        'state' => [
            'format'   => FieldC::class,
            'position' => 273,
            'length'   => 2,
        ],
        'motherName' => [
            'format'   => FieldC::class,
            'position' => 275,
            'length'   => 35,
        ],
        'addressType' => [
            'format'   => FieldC::class,
            'position' => 310,
            'length'   => 1,
        ],
        'businessAreaCode' => [
            'format'   => FieldN::class,
            'position' => 311,
            'length'   => 4,
        ],
        'businessPhone' => [
            'format'   => FieldN::class,
            'position' => 315,
            'length'   => 8,
        ],
        'businessPhoneBranch' => [
            'format'   => FieldN::class,
            'position' => 323,
            'length'   => 4,
        ],
        'homeAreaCode' => [
            'format'   => FieldN::class,
            'position' => 327,
            'length'   => 4,
        ],
        'homePhone' => [
            'format'   => FieldN::class,
            'position' => 331,
            'length'   => 8,
        ],
        'education' => [
            'format'   => FieldC::class,
            'position' => 339,
            'length'   => 1,
        ],
        'admissionDate' => [
            'format'   => FieldC::class,
            'position' => 340,
            'length'   => 8,
            'rules'    => [
                'date:dmY',
            ]
        ],
        'reserved3' => [
            'format'   => FieldC::class,
            'position' => 348,
            'length'   => 1,
            'defaultValue' => '',
        ],
        'name' => [
            'format'   => FieldC::class,
            'position' => 349,
            'length'   => 40,
            'rules'    => [
                'required',
            ]
        ],
        'reserved4' => [
            'format'   => FieldC::class,
            'position' => 389,
            'length'   => 6,
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
