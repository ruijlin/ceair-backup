<?php
    require_once("../db_connection/connection_admin_login.php");
    if(isset($_POST['getNo'])){
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "";
        $doc = "<option value='#'>Select</option>";
        $sql = "select * from transportation";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $doc .= "<option value='{$row['transportation_ID']}'>{$row['transportation_name']}</option>";
        }
        echo $doc;
    }
    if(isset($_POST['residency_ID'])){
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "<option value='#'>Select</option>";
        $sql = "select * from residency";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $doc .= "<option value='{$row['res_ID']}'>{$row['res_Name']}</option>";
        }
        echo $doc;
    }

    if(isset($_POST['getTour'])){
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "<option value='#'>Select</option>";
        $sql = "select * from `tourist spot`";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $doc .= "<option value='{$row['tourist_spot_ID']}'>{$row['destination']}</option>";
        }
        echo $doc;
    }

    // Add Package
    if(isset($_POST['package'])){
        $pack = $_POST['package'];
        $packObj = (object)json_decode($pack,true);
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $sql = "INSERT INTO `service_package`(`id`, `package_name`, `package_type`, `package_price`, `transportation_ID`, `residency_ID`, `tourist_spot_ID`) VALUES ('','$packObj->name','$packObj->type','$packObj->price','$packObj->transportation_id','$packObj->residency','$packObj->tourist_spot')";
        $res = mysqli_query($db,$sql);
        if($res){
            echo "true";
        }
        else{
            echo mysqli_error($db);
        }
    }

    if(isset($_POST['getPackageList'])){
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "";
        $sql = "SELECT service_package.id, service_package.package_name, service_package.package_type, service_package.package_price, transportation.transportation_name, residency.res_Name, `tourist spot`.`destination` FROM service_package INNER JOIN transportation , residency, `tourist spot` where service_package.transportation_ID = transportation.transportation_ID and residency.res_ID = service_package.residency_ID and `tourist spot`.`tourist_spot_ID` = service_package.tourist_spot_ID";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            if($_POST['getPackageList'] == "agency"){
                $doc .= "<tr>".
                            "<td>{$row['package_name']}</td>".
                            "<td>{$row['package_type']}</td>".
                            "<td>{$row['package_price']}</td>".
                            "<td>{$row['transportation_name']}</td>".
                            "<td>{$row['res_Name']}</td>".
                            "<td>{$row['destination']}</td>".
                            "<td>".
                                "<button onclick='deletePackage({$row['id']})'>DELETE</button>".
                            "</td>".
                        "</tr>";
            }
            else{
                $doc .= "<tr>".
                            "<td>{$row['package_name']}</td>".
                            "<td>{$row['package_type']}</td>".
                            "<td>{$row['package_price']}</td>".
                            "<td>{$row['transportation_name']}</td>".
                            "<td>{$row['res_Name']}</td>".
                            "<td>{$row['destination']}</td>".
                            "<td>".
                                "<a href='buyPage.php?package_id={$row['id']}' class='btn'>Buy Now</a>".
                            "</td>".
                        "</tr>";
            }
        }
        echo $doc;
    }

    if(isset($_POST['pack_id'])){
        $pack_id = $_POST['pack_id'];
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $sql = "DELETE FROM `service_package` WHERE id='$pack_id'";
        $result = mysqli_query($db,$sql);
        if($result){
            echo "Done";
        }
        else{
            echo mysqli_error($db);
        }
    }

    // Search Data
    if(isset($_POST['data'])){
        $data = $_POST['data'];
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "";
        $sql = "SELECT service_package.id, service_package.package_name, service_package.package_type, service_package.package_price, transportation.transportation_name, residency.res_Name, `tourist spot`.`destination` FROM service_package INNER JOIN transportation , residency, `tourist spot` WHERE service_package.transportation_ID = transportation.transportation_ID and residency.res_ID = service_package.residency_ID and `tourist spot`.`tourist_spot_ID` = service_package.tourist_spot_ID and service_package.package_name like '%$data%'";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $doc .= "<tr>".
                        "<td>{$row['package_name']}</td>".
                        "<td>{$row['package_type']}</td>".
                        "<td>{$row['package_price']}</td>".
                        "<td>{$row['transportation_name']}</td>".
                        "<td>{$row['res_Name']}</td>".
                        "<td>{$row['destination']}</td>".
                        "<td>".
                            "<button onclick='deletePackage({$row['id']})'>DELETE</button>".
                        "</td>".
                    "</tr>";
        }
        echo $doc;
    }

    if(isset($_POST['package_id'])){
        $id = $_POST['package_id'];
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $sql = "SELECT service_package.id, service_package.package_name, service_package.package_type, service_package.package_price, transportation.transportation_name, residency.res_Name, `tourist spot`.`destination` FROM service_package INNER JOIN transportation , residency, `tourist spot` WHERE service_package.transportation_ID = transportation.transportation_ID and residency.res_ID = service_package.residency_ID and `tourist spot`.`tourist_spot_ID` = service_package.tourist_spot_ID and service_package.id like '$id'";
        $result = mysqli_query($db,$sql);
        $arr = (object)array();
        while($row = mysqli_fetch_assoc($result)){
            $arr->id = $row['id'];
            $arr->name = $row['package_name'];
            $arr->type = $row['package_type'];
            $arr->price = $row['package_price'];
            $arr->tran_type = $row['transportation_name'];
            $arr->res = $row['res_Name'];
            $arr->destination = $row['destination'];
        }

        $arrObj = json_encode($arr);
        
        echo $arrObj;
    }

    if(isset($_POST['check'])){
        $user_id = $_POST['check'];
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $sql = "SELECT * FROM `trip` WHERE user_ID='$user_id'";
        $result = mysqli_query($db,$sql);

        if(mysqli_num_rows($result) == 0){
            echo "Valid";
        }
        else{
            echo "";
        }
        
    }

    if(isset($_POST['tripObj'])){
        $tripObj = $_POST['tripObj'];
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $tripObj = (object)json_decode($tripObj,true);
        $sqlTrans = "INSERT INTO `transaction`(`transaction_ID`, `total_cost`, `payment_time`, `user_id`) VALUES ('','$tripObj->price',now(),'$tripObj->user_id')"; 
        $tranRes = mysqli_query($db,$sqlTrans);
        if($tranRes){
            $tranIdSql = "select * from transaction where user_id='$tripObj->user_id'";
            $resId = mysqli_query($db,$tranIdSql);
            $arr2 = [];
            while($row = mysqli_fetch_assoc($resId)){
                array_push($arr2,$row);
            }
            $id = $arr2[mysqli_num_rows($resId)-1]['transaction_ID'];
            $sql = "INSERT INTO `trip`(`trip_ID`, `departure_date`, `return_date`, `hotel_nights`, `no_of_people`, `user_ID`, `service_package_ID`, `transaction_ID`) VALUES ('','$tripObj->dep_date','$tripObj->ret_date','$tripObj->night','$tripObj->no_people','$tripObj->user_id','$tripObj->pack_id','$id')";
            $res = mysqli_query($db,$sql);
            if($res){
                echo "Done";
            }
            else{
                echo mysqli_error($db);
            }
        }
        else{
            echo mysqli_error($db);
        }
    }

    if(isset($_POST['getCus'])){
        $db = dbConnection();
        if(!$db){
            echo "504";
        }
        $doc = "";
        $sql = "SELECT * from user where role='User' or role='user'";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $doc .= "<tr>".
                        "<td>{$row['user_Name']}</td>".
                        "<td>{$row['user_email_ID']}</td>".
                        "<td>{$row['mobile_No']}</td>".
                        "<td>{$row['user_Address']}</td>".
                        "<td>{$row['role']}</td>".
                    "</tr>";
        }
        echo $doc;
    }

?>