<?php

$KoolControlsFolder = "vendor/KoolPHPSuite/KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder

require($KoolControlsFolder."/KoolAjax/koolajax.php");
$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";

require($KoolControlsFolder."/KoolGrid/koolgrid.php");
require($KoolControlsFolder."/KoolGrid/ext/datasources/MySQLiDataSource.php");
require($KoolControlsFolder."/KoolCalendar/koolcalendar.php");

class KoolPHP
{
    static public function createGrid()
    {
        $grid = new KoolGrid("grid");
        $grid->AjaxEnabled = true;
        $grid->DataSource = self::dbConnect();
        $grid->MasterTable->Pager = new GridPrevNextAndNumericPager();
        $grid->ColumnWrap = true;
        $grid->AllowEditing = true;
        $grid->AllowDeleting = true;

        return $grid;
    }

    /**
     * Render text input
     *
     * @param $grid
     * @param $field
     * @param string $fieldName
     * @return mixed
     */
    public function renderTextInput($grid, $field, $fieldName = '')
    {
        $column = new GridBoundColumn();
        $column->DataField = $field;
        if($fieldName) {
            $column->HeaderText = $fieldName;
        } else {
            $column->HeaderText = $field;
        }

        $grid->MasterTable->AddColumn($column);
        return $grid;
    }

    /**
     * Render text area
     *
     * @param $grid
     * @param $field
     * @param string $fieldName
     * @return mixed
     */
    public function renderTextArea($grid, $field, $fieldName = '')
    {
        $column = new GridTextAreaColumn();
        $column->DataField = $field;
        if($fieldName) {
            $column->HeaderText = $fieldName;
        } else {
            $column->HeaderText = $field;
        }

        $grid->MasterTable->AddColumn($column);
        return $grid;
    }

    /**
     * Connect to DB
     *
     * @return MySQLiDataSource
     */
    static protected function dbConnect()
    {
        $db_con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($db_con, 'utf8');

        $ds = new MySQLiDataSource($db_con);
        $ds->SelectCommand = "select id,account,street,city from crm_accounts";
        $ds->UpdateCommand = "update crm_accounts set account='@account', street='@street', city='@city' where id=@id";
        $ds->DeleteCommand = "delete from crm_accounts where id=@id";

        return $ds;
    }
}
