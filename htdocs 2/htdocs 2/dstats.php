<?php
  include_once("includes/header.php"); 
  $con = mysqli_connect("localhost","root","","charts");
  if($con){
    // echo "connected";
  }
?>
<html>
<head>
<div class="crumb">
    </div>
    <div class="clear"></div>
  <div id="content_sec">
    <div class="col1">
      <div class="contact" style="font-size:14px;">
        <h4 class="heading colr">ABOUT RVCE</h4>
        <div style="font-size:12px;">
          <div class="cb-content">
                <!-- start sone content   -->
                  <p>R.V. College of Engineering (RVCE) established in 1963 is one of the earliest self-financing engineering colleges in the country. The institution is run by Rashtreeya Sikshana Samithi Trust (RSST) a not for profit trust. The trust runs over 25 institutions and RVCE is the flagship institute under the trust. RVCE is today recognized as one of India’s leading technical institution.</p>
                  <p>Here in RV college of engineering, we mainly focus on producing the best of the best, the cream of the lot and efficient student who are most definitely going to make a change in today’s world. At RV college of engineering we have 12 departments in engineering and their corresponding masters programs. 
                                  Each department has 10 teaching staff and 10 non teaching staff.</p>
                  <p> Here in RV college of engineering,CSE department has total 40 employees in which teaching is 20 and non-teaching 10 and help and front desk=10 </p>
                  <p> ISE department has total 20 employees in which teaching is 10 and non-teaching 5 and help and front desk=10 </p>
                      <p> EEE department has total 18 employees in which teaching is 10 and non-teaching 4 and help and front desk=14 </p>
                  <p> ECE department has total 16 employees in which teaching is 8 and non-teaching 5 and help and front desk=3 </p>
                  <p> IEM department has total 22 employees in which teaching is 10 and non-teaching 4 and help and front desk=8 </p>
                  <p> ME department has total 15 employees in which teaching is 7 and non-teaching 4 and help and front desk=4 </p>
                  <p> CV department has total 11 employees in which teaching is 7 and non-teaching 2 and help and front desk=2 </p>
                  <p> CHEM department has total 14 employees in which teaching is 6 and non-teaching 5 and help and front desk=3   </p>
                  <p> AEROSPACE department has total 15 employees in which teaching is 8 and non-teaching 4 and help and front desk=3    </p>
            <li>
                  <h4 class="heading colr">Department statistics</h4>
                    <!-- <div><img src="images/graph.png" style="width: 250px"></div> -->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['department', 'staff'],
         <?php
         $sql = "SELECT * FROM staff";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['department']."',".$result['staff']."],";
          }

         ?>
        ]);

        var options = {
          // title: 'Department and their staff'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
                    <!-- <p>Department stats</p> -->
                    </li>
          </div>
        </div>
      </div>
    </div>
    <div class="col2">
      <?php include_once("includes/sidebar.php"); ?> 
    </div>
  </div>
<?php include_once("includes/footer.php"); ?> 
</body>
</html>
