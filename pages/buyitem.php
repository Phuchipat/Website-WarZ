<?php
  function updatepoint($id,$gc) {
    global $conn;
    $gc = intval($gc);
    $query = sqlsrv_query($conn,"UPDATE UsersData SET GamePoints = GamePoints-'".$gc."' WHERE CustomerID = '".$id."'");
    return $query;
  }

  function additem($id,$itemid,$amount){
    global $conn;
    $query = sqlsrv_query($conn,"INSERT INTO [UsersInventory] VALUES (".$id.", 0, 0, ".$itemid.", DATEADD(day, 2000, GETDATE()), ".$amount.", -1, -1, 10000);");
    return true;
  }

  function get_store($itemid) {
    global $conn;
    $query = sqlsrv_query($conn,"SELECT * FROM ZJJ_HISTOR_BUYITEM WHERE ItemID = '".$itemid."'");
    $array = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    return array('buy_amount'=>$array['buy_amount'],'max_store'=>$array['max_store']);
  }

  function update_buyamount($itemid) {
    global $conn;
    $query = sqlsrv_query($conn,"UPDATE ZJJ_HISTOR_BUYITEM SET buy_amount += 1 WHERE ItemID = '".$itemid."'");
  }

  $id = $_GET["id"];
  if (isset($id) AND !empty($id)) {
    if ($buyitem[$id]) {
      if (intval($gc) >= intval($buyitem[$id]["gc"])) {
          $store = get_store(intval($buyitem[$id]["itemid"]));
          if($store['buy_amount'] < $store['max_store']) {
            if(updatepoint($customer,$buyitem[$id]["gc"])) {
              echo '<script>alert("ซื้อไอเทม '.$buyitem[$id]["title"].' เรียบร้อยแล้ว จำนวน '.$buyitem[$id]["amount"].' ชิ้น");location="?warz=buyitem";</script>';
              additem($customer,$buyitem[$id]["itemid"],$buyitem[$id]["amount"]);
              update_buyamount($buyitem[$id]["itemid"]);
            } else {
              echo '<script>alert("Error cannot update GC");location="?warz=home";</script>';
            }
          } else {
            echo '<script>alert("ไอเทมในร้านค้าหมดแล้ว ไม่สามารถซื้อได้");location="?warz=buyitem";</script>';
          }
      } else {
        echo '<script>alert("จำนวน GC ไม่พอซื้อไอเทมนี้ กรุณาเติม GC");location="?warz=home";</script>';
      }
    } else {
      echo '<script>alert("ไม่มีไอเทมที่ต้องการซื้อ");location="?warz=buyitem";</script>';
    }
  }
  ;echo '
  ';include "pages/menu.php";;echo '<div class="container">
      <div class="row">
          <div class="col-xs-12">
              <ol class="breadcrumb">
                  <li><span class="fa fa-bullhorn"></span> ประกาศ : </li> ';echo $New ;echo '            </ol>
          </div>
      </div>
  </div>


  <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="panel panel-default">
                  <div class="panel-heading"><i class="fa fa-credit-card"></i> BuyItem <small>ซื้อไอเท็ม ด้วย
                          GC</small></div>
                  <div class="panel-body">
                      <div class="col-md-12">
                          <div class="text-center" style="padding-top:3vh;">
                              จำนวน GC คงเหลือ <span class="label label-success">';echo number_format($gc);;echo '</span> GC
                              </br></br>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12">
                              ';
  foreach ($buyitem as $rows =>$value){
    $store = get_store($value["itemid"]);
  ;echo '                            <div class="col-sm-5 col-md-3">
                                  <div class="thumbnail">
                                      <center><img src="';echo $value["image"];;echo '" height="150" width="100%" alt=""></center>
                                      <div class="caption">
                                          <center>
                                              <h4>';echo $value["title"];;echo '</h4>
                                              <p><b>จำนวน : ';echo $value["amount"];;echo ' ชิ้น</b></p>
                                              <p><b>';echo $value["gc"];;echo ' GC</b></p>
                                              <p><b>';echo $store['buy_amount'];;echo ' / ';echo $store['max_store'];;echo '</b></p>
                                              <p><a href="?warz=buyitem&id=';echo $rows;;echo '"
                                                      onclick="var txt; var r = confirm(\'คุณต้องการซื้อไอเทมนี้ใช่หรือไม่ !\'); if (r == true) { txt = \'You pressed OK!\'; }else{ return false; }"
                                                      class="btn btn-success btn-sm" role="button">ซื้อไอเทมนี้</a></p>
                                          </center>
                                      </div>
                                  </div>
                              </div>
                              ';};echo '                        </div><!-- End row -->
                      </div><!-- col-xs-12 -->
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  </div>
  </div>';
?>
