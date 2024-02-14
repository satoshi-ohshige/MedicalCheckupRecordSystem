<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\FiscalYear;

final readonly class MedicalRecordsViewModel
{
    private const int MIN_FISCAL_YEAR = 2010;

    /**
     * @param MedicalRecordsItemViewModel[] $medicalRecords
     */
    public function __construct(private FiscalYear $fiscalYear, private array $medicalRecords)
    {
    }

    public function getFySelectOptionGenerator(): \Generator
    {
        $maxFiscalYear = FiscalYear::now()->year();
        for ($fy = $maxFiscalYear; $fy >= self::MIN_FISCAL_YEAR ; $fy--) {
            yield $fy;
        }
    }

    public function isSelectedFy(int $fy): bool
    {
        return  $fy === $this->fiscalYear->year();
    }

    public function showFiscalYear(): string
    {
        return (string)$this->fiscalYear->year();
    }

    /**
     * @return MedicalRecordsItemViewModel[]
     */
    public function getMedicalRecords(): array
    {
        return $this->medicalRecords;
    }
}
