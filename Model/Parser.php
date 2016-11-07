<?php

namespace Staempfli\Spreadsheet\Model;

use Akeneo\Component\SpreadsheetParser\SpreadsheetParser;

/**
 * Class Reader
 * @package Staempfli\Spreadsheet\Model\Spreadsheet
 */
class Parser
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var $spreadsheet \Akeneo\Component\SpreadsheetParser\Xlsx\Spreadsheet | \Akeneo\Component\SpreadsheetParser\Csv\Spreadsheet
     */
    protected $spreadsheet;
    /**
     * @var
     */
    protected $worksheet;
    /**
     * @var SpreadsheetParser
     */
    protected $spreadsheetParser;

    /**
     * Reader constructor.
     * @param SpreadsheetParser $spreadsheetParser
     */
    public function __construct(
        SpreadsheetParser $spreadsheetParser
    ) {
        $this->spreadsheetParser = $spreadsheetParser;
    }

    /**
     * @param $file
     * @param int $worksheetIndex
     * @return array
     */
    public function readFile($file, $worksheetIndex = 0)
    {
        $this->spreadsheet = $this->spreadsheetParser->open($file);
        return $this->getWorksheetData($worksheetIndex);
    }

    /**
     * @return \Akeneo\Component\SpreadsheetParser\Csv\Spreadsheet|\Akeneo\Component\SpreadsheetParser\Xlsx\Spreadsheet
     */
    public function getSpreadsheet()
    {
        return $this->spreadsheet;
    }

    /**
     * @return array|bool|\string[]
     */
    public function getWorksheets()
    {
        if ($this->spreadsheet) {
            return $this->spreadsheet->getWorksheets();
        }
        return false;
    }

    /**
     * @param int $worksheetIndex
     * @return array
     */
    public function getWorksheetData($worksheetIndex = 0)
    {
        if (is_string($worksheetIndex)) {
            $worksheetIndex = $this->spreadsheet->getWorksheetIndex($worksheetIndex);
        }
        $this->worksheet = $this->spreadsheet->createRowIterator($worksheetIndex);

        if (!$this->data) {
            foreach ($this->worksheet as $index => $rows) {
                $this->data[$index] = $rows;
            }
        }
        return $this->data;
    }
}
