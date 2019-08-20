<?php

class KoolPHP
{
    /**
     * Handle Export request
     *
     * @param $grid
     */
    static public function exportFile($grid)
    {
        $fileName = "Export_".date('d-m-Y:H:i:s');

        ob_end_clean();
        $grid->ExportSettings->FileName = $fileName;
        $grid->ExportSettings->IgnorePaging = true;
        $grid->ExportSettings->CharSet = 'UTF-8';

        if(isset($_POST["ExportToExcel"])) {
            $grid->GetInstanceMasterTable()->ExportToExcel();
        }

        if(isset($_POST["ExportToCSV"])) {
            $grid->GetInstanceMasterTable()->ExportToCSV();
        }
    }
}
