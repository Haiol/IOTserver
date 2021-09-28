<?php
session_start();
if(!isset($_SESSION['user_code'])) //세션이 존재하지 않을 때
{
 header ('Location: ./login.php');
}
?> 

<?php
$connect = mysqli_connect("localhost", "kbu3", "1234", "member");
//$connect = mysqli_connect("localhost", "root", "", "test");
$sql = "SELECT temp,humm FROM `datawave` WHERE user_code = ".$_SESSION['user_code']." ORDER BY create_date DESC limit 1";
$result = mysqli_query($connect, $sql);  
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NETWORK3</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/main_border.css" rel="stylesheet">
    

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Network <sup>3</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link " href="history.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>History</span></a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                           
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                        //User Name
                                        echo $_SESSION['username'];
                                    ?>
                                </span>
                                <i class="fas fa-user"></i>
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ProfileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- End of Topbar -->
                <div class="container-fluid">
                
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">History</h1>
                        <div class="dropdown mb-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-calendar-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                데이터 보는 방식 변경!
                            </button>
                            <div class="dropdown-menu animated--fade-in"
                                aria-labelledby="dropdownMenuButton">
                                <button class="dropdown-item" id="day" href="#">하루</button>
                                <button class="dropdown-item" id="week" href="#">일주일</button>
                                <button class="dropdown-item"id="month"  href="#">달</button>
                            </div>
                        </div>
                    </div>
                    
                    
                
                    <!-- Content Row -->
                    <div class="row">
                
                        <div class="col-xl-8 col-lg-7">
                
                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Temperature & Humidity Gragh</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                
                            
                
                        </div>
                
                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Someone's data</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                
              
                    <!-- Page Heading -->
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resent Temperature & Humidity History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <!-- dataTable -->
                                    <thead>
                                        <tr>
                                            <th>IOT_Name</th>
                                            <th>Temperature</th>
                                            <th>Humidity</th>
                                            <th>create_date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>IOT_Name</th>
                                            <th>Temperature</th>
                                            <th>Humidity</th>
                                            <th>create_date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                       
                                        $sql2 = "SELECT * FROM `datawave` WHERE user_code = ".$_SESSION['user_code']." ORDER BY DATE(create_date) DESC limit 2000";
                                        $result2 = mysqli_query($connect, $sql2);
                                        while ($table = mysqli_fetch_array($result2)) 
                                            {   
                                                echo "<tr>";
                                                echo "<td>".$table['data_name']."</td>";
                                                echo "<td>".$table['temp']."</td>";
                                                echo "<td>".$table['humm']."</td>";
                                                echo "<td>".$table['create_date']."</td>";
                                                echo "</tr>";
                                                
                                            
                                            }
                                        
                                        ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nerwork 3 Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <?php
            $upate_user_userid="";
            $upate_user_email="";
            $upate_user_username="";
            $upate_user_password="";
            $sql4 = "SELECT  * from users WHERE user_code = ".$_SESSION['user_code'];
            $result4 = mysqli_query($connect, $sql4);
            echo $sql4;
            $row4=$result4->fetch_array(MYSQLI_ASSOC);
             
              
            $upate_user_userid='"'.$row4['userid'].'"';
            $upate_user_email='"'.$row4['email'].'"';
            $upate_user_username='"'.$row4['username'].'"';
            $upate_user_password='"'.$row4['password'].'"';
            
            
              
           
                    
        ?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify Profile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Would you like to modify your profile?

            <form action="mem_modify.php" method="post" target="iframe1" name="theForm">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                     </div>
                     <input name="id" id="id" class="n form-control" value= <?php echo $upate_user_userid?> type="text" readonly> 
                     <input name="chid" id="chid" value="0" type="hidden"> 
                 
                </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                 </div>
                <input name="email" id="email" class="form-control" placeholder="Email address" value= <?php echo $upate_user_email?> type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
                 <input name="name" id="name" class="form-control" placeholder="Full name"  value= <?php echo $upate_user_username?>type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="pwd1" id="pwd1" class="form-control" placeholder="Create password" value= <?php echo $upate_user_password?> type="password">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="pwd2" id="pwd2" class="form-control" placeholder="Repeat password" value= <?php echo $upate_user_password?> type="password">
                <input type="hidden" name="flag" id="flag" href="#" value=true >
            </div> <!-- form-group// -->                                      
                                                                       
        

                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit"class="btn btn-primary"  value="Modify">
                    
                </div>
                </form>
            </div>
      

        </div>
    </div>
    <iframe id="iframe1" name="iframe1"style="display:none" ></iframe>
     
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script for="pichart">
            <?php
        $sql2 = "SELECT user_code, COUNT(user_code) as cnt FROM datawave GROUP BY user_code HAVING COUNT(user_code)";
        $result2 = mysqli_query($connect, $sql2);

        $user_list_label="";
        $user_list_value="";

        while ($p = mysqli_fetch_array($result2)) 
        { 
            $user_list_label = $user_list_label.'"USER_CODE: ' . $p['user_code'] . '",';
            $user_list_value  = $user_list_value.'"' . $p['cnt'] . '",';
        
        }

        ?>
        
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [<?php echo $user_list_label;?>],
            datasets: [{
            data: [<?php echo $user_list_value;?>],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
            },
        });

    </script>

    <script  for="simplelineChart">
                <?php
        $sql3 = "SELECT  temp, humm, create_date from datawave WHERE user_code= ".$_SESSION['user_code']." ORDER BY create_date DESC LIMIT 20;";
       
        $result3 = mysqli_query($connect, $sql3);

        $user_data_temp="";
        $user_data_humm="";
        $user_data_date="";
        

        while ($p2 = mysqli_fetch_array($result3)) 
        { 
            $user_data_temp = $user_data_temp.'"' . $p2['temp'] . '",';
            $user_data_humm  = $user_data_humm.'"' . $p2['humm'] . '",';
            $user_data_date  = $user_data_date.'"' . $p2['create_date'] . '",';
        
        }

        ?>

        /***sd*** */
        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $user_data_date;?>],
            datasets: [{
            label: "Temp",
            lineTension: 0.3,
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",

            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php echo $user_data_temp;?>],
            },
            {
            label: "Humidity",
            lineTension: 0.3,
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)' ],
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",

            pointHitRadius: 10,
            pointBorderWidth: 2,
            /*inputing data* */
            data: [<?php echo $user_data_humm;?>],
            }
        ],
            
        },
        options: {
           
            maintainAspectRatio: false,
            layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
            },
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            //mode: 'index',
            caretPadding: 10,
            callbacks: {
               
            }
            }
        }
        });
        
        //데이터 변경
        $('#day').click(function(){
            <?php
            $sql3 = "SELECT  temp, humm, create_date from datawave WHERE user_code= ".$_SESSION['user_code']." ORDER BY create_date DESC LIMIT 20;";
           //$sql3 = "SELECT DATE(create_date) AS date , round(AVG(temp),1) as temp, round(AVG(humm),1) as humm from datawave WHERE user_code= ".$_SESSION['user_code']." GROUP BY date ORDER BY create_date DESC LIMIT 20;";
            $result3 = mysqli_query($connect, $sql3);
            $user_data_temp="";
            $user_data_humm="";
            $user_data_date="";
            while ($p2 = mysqli_fetch_array($result3)) 
            { 
                $user_data_temp = $user_data_temp.'"' . $p2['temp'] . '",';
                $user_data_humm  = $user_data_humm.'"' . $p2['humm'] . '",';
                $user_data_date  = $user_data_date.'"' . $p2['create_date'] . ' ",';
            
            }?>
            var config = myLineChart.config;
            var dataset = config.data.datasets;
            dataset[0].data = [<?php echo $user_data_temp;?>];
            dataset[1].data = [<?php echo $user_data_humm;?>];
            config.data.labels = [<?php echo $user_data_date;?>];
            myLineChart.update();
                
        });
        $('#week').click(function(){
            <?php
            //$sql3 = "SELECT  temp, humm, create_date from datawave WHERE user_code= ".$_SESSION['user_code']." ORDER BY create_date DESC LIMIT 10;";
           $sql3 = "SELECT DATE(create_date) AS date , round(AVG(temp),1) as temp, round(AVG(humm),1) as humm from datawave WHERE user_code= ".$_SESSION['user_code']." GROUP BY date ORDER BY create_date DESC LIMIT 20;";
            $result3 = mysqli_query($connect, $sql3);
            $user_data_temp="";
            $user_data_humm="";
            $user_data_date="";
            while ($p2 = mysqli_fetch_array($result3)) 
            { 
                $user_data_temp = $user_data_temp.'"' . $p2['temp'] . '",';
                $user_data_humm  = $user_data_humm.'"' . $p2['humm'] . '",';
                $user_data_date  = $user_data_date.'"' . $p2['date'] . '",';
            
            }?>
            var config = myLineChart.config;
            var dataset = config.data.datasets;
            dataset[0].data = [<?php echo $user_data_temp;?>];
            dataset[1].data = [<?php echo $user_data_humm;?>];
            config.data.labels = [<?php echo $user_data_date;?>];
            myLineChart.update();
        });


        $('#month').click(function(){
            <?php
            //$sql3 = "SELECT  temp, humm, create_date from datawave WHERE user_code= ".$_SESSION['user_code']." ORDER BY create_date DESC LIMIT 10;";
           $sql3 = "SELECT MONTH(create_date) AS month , AVG(temp) as temp, AVG(humm) as humm from datawave GROUP BY month ORDER BY create_date DESC LIMIT 20;";
        
            $result3 = mysqli_query($connect, $sql3);
            $user_data_temp="";
            $user_data_humm="";
            $user_data_date="";
            while ($p2 = mysqli_fetch_array($result3)) 
            { 
                $user_data_temp = $user_data_temp.'"' . $p2['temp'] . '",';
                $user_data_humm  = $user_data_humm.'"' . $p2['humm'] . '",';
                $user_data_date  = $user_data_date.'"' . $p2['month'] . '월" ,';
            
            }?>
            var config = myLineChart.config;
            var dataset = config.data.datasets;
            dataset[0].data = [<?php echo $user_data_temp;?>];
            dataset[1].data = [<?php echo $user_data_humm;?>];
            config.data.labels = [<?php echo $user_data_date;?>];
            myLineChart.update();
        });
                

        
    </script>
    

</body>
</html>