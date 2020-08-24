
<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
              <th>
                <form id="form-Name1" method="post" action="customer-list.php">
                  <input type="hidden" name="sortType" value="name"/>
                    <div onclick="document.getElementById('form-Name1').submit();">
                      <a>Name</a>
                    </div>
                </form>
              </th>
               <th>Email</th>
               <th>Address</th>
               <th>
                  <form id="form-Name2" method="post" action="customer-list.php"/>
                    <input type="hidden" name="sortType" value="city">
                      <div onclick="document.getElementById('form-Name2').submit();">
                      <a>City</a>
                    </div>
                  </form>
                </th>
               <th>
                  <form id="form-Name3" method="post" action="customer-list.php">
                    <input type="hidden" name="sortType" value="country">
                      <div onclick="document.getElementById('form-Name3').submit();">
                        <a>Country</a>
                      </div>
                  </form>
                </th>
             </tr>
            
            <?php include 'includes/database.inc.php';
    //echo $test;
    //call connect function and retrieve pdo obj
              $query;

              $myPdoH = setConnectionInfo();

              $nameQuery = 'SELECT firstName,lastName ,email, address, city ,country FROM Customers order by lastName';
              $cityQuery = 'SELECT firstName,lastName ,email, address, city ,country FROM Customers order by city';
              $countryQuery = 'SELECT firstName,lastName ,email, address, city ,country FROM Customers order by country';

              if(isset($_POST['sortType'])){

                $sortValue = $_POST['sortType'];
                 //echo "$sortValue";
                if($sortValue == "name")
                {
                  $query = $nameQuery;
                }
                if($sortValue == "city"){
                  $query = $cityQuery;
                }
                if($sortValue == "country"){
                  $query = $countryQuery;
                }
              }
              else{
                $query = $nameQuery;
              }
              

              $dataRow = $myPdoH->query($query);
                while($individualRow = $dataRow->fetch()){
                      echo"<tr>";
                          // echo"<td><a href=\"BookRepCRM.php?cID=".$customers_array[$x][0]."\">".$customers_array[$x][1]."</a></td>";
                        echo"<td>".$individualRow['firstName'] ." ". $individualRow['lastName']."</td>";
                        echo"<td>".$individualRow['email'] ."</td>";
                        echo"<td>".$individualRow['address'] ."</td>";
                        echo"<td>".$individualRow['city'] ."</td>";
                        echo"<td>".$individualRow['country'] ."</td>";



                     echo"</tr>";

                }
                $myPdoH= NULL;
              ?>


           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">

               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">

            </ul>
         </div>         
      </div>  <!-- end left navigation rail --> 


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>