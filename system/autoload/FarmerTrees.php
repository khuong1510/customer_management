<?php
Class FarmerTrees{


    public function get_tree($did){

        $name = '';

        $d = ORM::for_table('tree')->find_one($did);

        if($d){
            $name = $d->name;
        }

        return $name;


    }

    public function validatePhone($phone){

        $d = ORM::for_table('crm_accounts')->where("phone", $phone)->where("type", "Customer")->find_one();

        if($d){
            return true;
        }

        return false;
    }

    public function createAccount($data){
        $password_default = Password::_crypt("123456");
        $d = ORM::for_table('crm_accounts')->create();

        $d->account = trim($data['account']);
        $d->phone = trim($data['phone']);
        $d->street = trim($data['street']);
        $d->ward = trim($data['ward']);
        $d->district = trim($data['district']);
        $d->city = trim($data['city']);
        $d->cid = trim($data['cid']);
        $d->area = trim($data['area']);
        $d->password = $password_default;
        $d->save();
        $account_id = $d->id();
        return $account_id;
    }

    public function create($cid=0){
        global $config,$_L;
        $msg = '';


        $ib_now = date('Y-m-d H:i:s');


//
//        if(!$ticket_prefix)
//        {
//	        $ticket_prefix = strtoupper(Ib_Str::random_alpha(3));
//        }
//
//
//        $tid = $ticket_prefix.'-'._raid(8);
//

//        $data['tree_id'] = _post("tree_id");
//        $data['area'] = _post("area");
//        $data['age'] = _post("age");
//        $data['amount'] = _post("amount");
//        $data['phone'] = _post("phone");
//        $data['account'] = _post("account");
//        $data['street'] = _post("street");
//        $data['ward'] = _post("ward");
//        $data['district'] = _post("district");
//        $data['city'] = _post("city");

        $data = ib_posted_data();
        $data['cid'] = $cid;

        //check phone
        $check_phone = $this->validatePhone($data['phone']);

        if($check_phone){
            //customer is exited
            $msg = $_L["This phone is exited. Please add other phone."];
        }

        if($msg == ''){
            if($data['type'] != "Customer"){
                $account_id = $this->createAccount($data);
            }
            else {
                $account_id = $data['account_id'];
            }

            $d = ORM::for_table('tree_mapping')->create();
            $d->account_id = $account_id;
            $d->tree_id = $data['tree_id'];
//            $d->area = trim($data['area']);
            $d->age = trim($data['age']);
            $d->amount = trim($data['amount']);
            $d->save();

            $ret_val = array(

                "success" => "Yes",
                "msg" => $_L["Data Created Successfully."],

            );


            Event::trigger('farmer_tree/created/',$ret_val);



        }
        else{

            $ret_val = array(
                "success" => "No",
                "msg" => $msg
            );
        }


        return $ret_val;



    }

    public function getDashboardInfo(){
        $result_trees = [];
        $trees =  ORM::for_table('tree')->order_by_asc('name')->find_array();
        if(!empty($trees)){
            foreach ($trees as $tree) {
                $amount = ORM::for_table('tree_mapping')->where("tree_id", $tree['name'])->sum('amount');
                $amount = $amount ? $amount : 0;
//                $area = ORM::for_table('tree_mapping')->where("tree_id", $tree['name'])->sum('area');
//                $area = $area ? $area : 0;
                $result_trees[] = array("name" => $tree['name'],
                                        "amount" => $amount
                    );
            }
        }
        $total_farmer = ORM::for_table('crm_accounts')->where('type', "Customer")->count();
        $area = ORM::for_table('crm_accounts')->where('type', "Customer")->sum('area');
        $area = $area ? $area : 0;
        $result = array("tree" => $result_trees,
                        "total_farmer" => $total_farmer,
                        "area" => $area
            );
        return $result;
    }
}