<?php

class KoolPhoneValidator extends GridValidator
{
    function validate($value,$dataItems)
    {
        global $_L;

        $customerId = $dataItems['id'] ? $dataItems['id'] : null;

        if ($customerId) {
            $existedCustomer = ORM::for_table('crm_accounts')
                ->where("phone", $dataItems['phone'])
                ->where("type", "Customer")
                ->where_not_equal("id", $dataItems['id'])
                ->find_one();
        } else {
            $existedCustomer = ORM::for_table('crm_accounts')
                ->where("phone", $dataItems['phone'])
                ->where("type", "Customer")
                ->find_one();
        }

        //echo "<pre>";var_dump($d);die;
        if ($existedCustomer){
            $this->ErrorMessage = $_L['This phone is existed. Please add other phone.'];
            return false;
        }

        return true;
    }
}
