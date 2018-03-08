<?php

namespace Convenia\AleloOrder;

use Convenia\AleloOrder\Interfaces\AleloOrderInterface;
use Convenia\AleloOrder\Registries\BranchRegistry;
use Convenia\AleloOrder\Registries\EmployeeRegistry;
use Convenia\AleloOrder\Registries\HeaderRegistry;
use Convenia\AleloOrder\Registries\TraillerRegistry;
use Stringy\Stringy;

/**
 * Class AleloOrder.
 */
class AleloOrder
{
    /**
     * @var Stringy
     */
    protected $fileLayout;

    /**
     * @var HeaderRegistry
     */
    protected $header;

    /**
     * @var BranchRegistry
     */
    protected $branch;

    /**
     * Array of EmployeeRegisty
     *
     * @var array
     */
    protected $employees = [];

    /**
     * @var TraillerRegistry
     */
    protected $traillerRegistry;

    /**
     * @var bool
     */
    protected $autoBranchFill = true;

    /**
     * @var array
     */
    protected $validProductTypes = [
        'AVV' => '1',
        'RVV' => '2',
    ];

    /**
     * AleloOrder constructor.
     * @param array $headerData
     */
    public function __construct(array $headerData)
    {
        if (isset($headerData['registryId'])) {
            unset($headerData['registryId']);
        }

        $headerData['registryId'] = 1;

        $this->header = new HeaderRegistry($headerData);
        $this->fileLayout = Stringy::create('');

        if ($this->autoBranchFill) {
            $this->generateBranchRegistryFromHeader($headerData);
        }
    }

    /**
     * @param array $headerData
     */
    protected function generateBranchRegistryFromHeader(array $headerData)
    {
        $branchData = [
            'aleloCompanyCod' => 00,
            'branchCod' => '',
            'cnpjBase' => substr($this->header->getField('cnpj'), 0, 8),
            'cnpjBranch' => substr($this->header->getField('cnpj'), 8, 4),
            'cnpjDigit' => substr($this->header->getField('cnpj'), 12, 2),
            'firstContactName' => $headerData['name'],
            'name' => $headerData['name'],
            'registryId' => 2
        ];

        $branchData = new BranchRegistry($branchData);

        $this->branch = $branchData;
    }

    /**
     * @param array $employeeData
     */
    public function addEmployee(array $employeeData)
    {
        $registryId = 2+count($this->getAllEmployees())+1;
        $employeeData = array_merge(['registryId' => $registryId], $employeeData);

        $this->employees[] = new EmployeeRegistry($employeeData);
    }

    /**
     * @return array
     */
    public function getAllEmployees()
    {
        return $this->employees;
    }

    /**
     * @return int
     */
    public function employeesCount()
    {
        return count($this->getAllEmployees());
    }

    /**
     * Generate the alelo orders file.
     *
     * @return string
     */
    public function generate()
    {
        $this->generateTraillerRegistry();
        $this->fileLayout = $this->fileLayout->append($this->header->__toString());
        $this->fileLayout = $this->fileLayout->append(PHP_EOL);
        $this->fileLayout = $this->fileLayout->append($this->branch->__toString());
        $this->fileLayout = $this->fileLayout->append(PHP_EOL);

        foreach ($this->getAllEmployees() as $employeeRegistry) {
            $this->fileLayout = $this->fileLayout->append($employeeRegistry->__toString());
            $this->fileLayout = $this->fileLayout->append(PHP_EOL);
        }

        $this->fileLayout = $this->fileLayout->append($this->traillerRegistry->__toString());

        return (string) $this->fileLayout;
    }

    /**
     * Generate the Trailler Registry.
     */
    protected function generateTraillerRegistry()
    {
        $this->traillerRegistry = new TraillerRegistry(
            [
                'employeeRegTotals' => $this->employeesCount(),
                'orderTotal' => $this->orderTotal(),
                'registryId' => count($this->getAllEmployees())+3,
            ]
        );
        return $this->traillerRegistry;
    }

    /**
     * @return int
     */
    protected function orderTotal()
    {
        $orderTotal = 0;

        /** @var EmployeeRegistry $employee */
        foreach ($this->getAllEmployees() as $employee) {
            $orderTotal += $employee->getField('monthValue')->getValue('upper');
        }

        return $orderTotal;
    }
}
