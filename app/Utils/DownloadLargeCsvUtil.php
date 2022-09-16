<?php

namespace App\Utils;

/**
 * Class DownloadLargeCsvUtil
 *
 * @package App\Utils
 *
 * This class set streaming large csv chunking queries
 */
class DownloadLargeCsvUtil
{
    /**
     * Function set header for CSV file.
     *
     * @param string $fileName
     *
     * @return array
     */
    public function headers($fileName)
    {
        return [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];
    }

    /**
     * Export Data to CSV (use Streamed Response).
     *
     * @param array   $rows
     * @param boolean $header
     * @param string  $delimiter
     * @param string  $enclosure
     * @param string  $eol
     *
     * @return collection
     */
    public function exportCsvWithEncodeUtf16le(
        $rows,
        $header = false,
        $delimiter = "\t",
        $enclosure = '"',
        $eol = "\n"
    ) {
        $file = fopen('php://output', 'w');
        foreach ($rows as $key => $fields) {
            foreach ($fields as &$field) {
                $field = preg_replace('/' . $enclosure . '/', '""', $field);
            }
            $csv = '"' . implode('"' . $delimiter . '"', $fields) . '"' . $eol;
            if (!empty($header) && $key === 0) {
                $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
            } else {
                $csv = mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
            }
            fputs($file, $csv);
        }
        fclose($file);
    }
}
