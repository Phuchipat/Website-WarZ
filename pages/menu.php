<?php echo '<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?warz=home"><span class="glyphicon glyphicon-home"></span> หน้าแรก </a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"><span class="fa fa-credit-card"></span> ระบบเติมเงิน<span class="caret"></span></a>
						  <ul class="dropdown-menu" aria-labelledby="download">
							<li><a href="?warz=topup"> <span class="fa fa-credit-card"></span> เติมเงินโปรโมชั่น</a></li>
							<li><a href="?warz=topupchar"><span class="fa fa-credit-card"></span> เติมพ้อยเช่าดาวเช่าตัว</a></li>
							<!--li><a href="?warz=topupstar"><span class="fa fa-credit-card"></span> เติมเงินเช่าดาว</a></li-->
						  </ul>
            </li>
            <li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"><i class="fa fa-credit-card"></i> เช่าตัวละคร-ดาว<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="?warz=rentchar"><i class="fas fa-user"></i> เช่าตัวละคร</a></li>
                <!--li><a href="?warz=rentstar"><i class="glyphicon glyphicon-edit"></i> เช่ายศดาว</a></li-->
						  </ul>
						</li>
						<li><a href="?warz=getitem"><i class="fas fa-gift"></i> รับไอเท็มตามคนทำคลิป</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"><i class="fas fa-shopping-basket"></i> เมนู ซื้อ-แลก-<!--<i class="fas fa-gift"></i>-->รับ<span class="caret"></span></a>
						  <ul class="dropdown-menu" aria-labelledby="download">
              <!--li><a href="?warz=getitem"><i class="fas fa-gift"></i> รับไอเท็ม</a></li-->
              <!--li><a href="?warz=random"><i class="fa fa-random"></i> สุ่มไอเทม</a></li-->
              <li><a href="?warz=buyitem"><i class="fas fa-shopping-basket"></i> ซื้อไอเท็ม</a></li>
							<li><a href="?warz=vip"><i class="fas fa-shopping-basket"></i> แลกVIP</a></li>
							<!--li><a href="?warz=trade"><i class="fas fa-shopping-basket"></i> เติมเงินสะสมแลกไอเท็ม</a></li-->
						  </ul>
						<!--/li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span> ชื่อผู้เล่น<span class="caret"></span></a>
						  <ul class="dropdown-menu" aria-labelledby="download">
							<!--li><a href="?warz=rename"> <span class="glyphicon glyphicon-edit"></span> เปลี่ยนชื่อ ไทย-อังกฤษ</a></li-->
							<!--li><a href="?warz=recolorname"><span class="glyphicon glyphicon-edit"></span> เปลี่ยนสีของชื่อ</a></li-->
						  </ul>
						</li-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-users"></i> ผุ้เล่นออนไลน์ : ';echo $useronline;;echo '</a></li>
                        <li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> เมนู <span class="caret"></span></a>
						  <ul class="dropdown-menu" aria-labelledby="download">
						    <li><a href="?warz=rename"> <span class="glyphicon glyphicon-edit"></span> เปลี่ยนชื่อ ไทย-อังกฤษ</a></li>
							<li><a href="?warz=recolorname"><span class="glyphicon glyphicon-edit"></span> เปลี่ยนสีของชื่อ</a></li>
							<li><a href="?warz=';echo $Cpass ;;echo '"> <span class="glyphicon glyphicon-edit"></span> เปลี่ยนรหัสผ่าน</a></li>
							<li><a href="#" onclick="logoutx();"><span class="glyphicon glyphicon-off"></span> ออกจากระบบ</a></li>
						  </ul>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
        <script type="text/javascript">
        function logoutx() {
            swal({
                title: "คุณต้องการอกจากระบบใช่มั้ย ?",
                text: "หากกด OK จะทำการออกจากระบบทันที!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((okx) => {
            if (okx) {
                swal("คุณทำการออกจากระบบเรียบร้อยแล้ว !", {
                icon: "success",
                }).then(function() {
                window.location.href="logout.php"
            });
            } else {
                swal("คุณยังอยู่ต่อในระบบ!",{
                    icon: "success",
                });
            }
            });
        }

</script>'; ?>
