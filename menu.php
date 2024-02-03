<?php 

$query_days = "SELECT * FROM `tb_setting_days` WHERE id = 1";
$mydb->setQuery($query_days);
$day_sql = $mydb->loadResultList();
foreach ($day_sql as $singleday) { 

   $day_now = $singleday->day;

}
				  		$mydb->setQuery("SELECT * FROM `company_name` WHERE id = 1");
				  		$cur = $mydb->loadResultList();
              // $res = $mydb->executeQuery();
              // $rowss = $mydb->fetch_array($res);
						foreach ($cur as $results) {
            }
                        ?>
<section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
<?php
  $query_caro = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
  WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY > 0 AND  p.$day_now = 1";

$mydb->setQuery($query_caro);
$res = $mydb->executeQuery();
$maxrow = $mydb->num_rows($res);
$carousel = $mydb->loadResultList();
if ($maxrow > 0) { 
  $x_ol = 0;

      date_default_timezone_set('Asia/Manila');
            $date_time_now = date('F j, Y H:i');
						$date_now_compare1 = (strtotime($date_time_now));
            //date now
  foreach ($carousel as $car_row) {
 
  if ($car_row->PRODISCOUNT != 0) {
   
?>
              <li data-target="#slider-carousel" data-slide-to="<?= $x_ol ?>" class="<?php if($x_ol == 0){ echo "active"; }?> "></li>
<?php
 $x_ol++;
  }
  }
}
?>             
              <!-- <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
              <li data-target="#slider-carousel" data-slide-to="3"></li>
              <li data-target="#slider-carousel" data-slide-to="4"></li>
              <li data-target="#slider-carousel" data-slide-to="5"></li>
              <li data-target="#slider-carousel" data-slide-to="6"></li> -->
              
            </ol>
            
            <div class="carousel-inner">

            <?php
            

            if ($maxrow > 0) { 
           
            $x_caro = 0;
            foreach ($carousel as $car_row) {
              
                $date = date_create($car_row->DT_XPRD_DISCOUNT);
              $date_expired = date_format($date,"F j, Y g:ia");

              $date_expire_compare2 = (strtotime($date_expired));
              if ($car_row->PRODISCOUNT != 0) {
            ?>

              <div class="item <?php if($x_caro == 0){ echo "active"; }?> "> 
               <form   method="POST" action="cart/controller.php?action=add">
               <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $car_row->PROQTY; ?>">

<input type="hidden" name="PROID" value="<?php  echo $car_row->PROID; ?>">

                <div class="col-sm-6">                  
                  <h1><?= $car_row->PRODESC ?></h1>
              
                  <?php
                     
                     

                      
                        if ($date_now_compare1 <= $date_expire_compare2) {

                          // echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'<h6>Available until:<span class="label label-success">'.$date_expired.'</span></h6></td>';
                          $date_2222 = date_create($car_row->DT_XPRD_DISCOUNT);
                          $date_expired_2222 = date_format($date_2222,"F j, Y g:ia");

                          echo '
                          <h2>&#8369 '.$car_row->PRODISPRICE.'</h2>
                          <span style ="font-size:20px;">Discount until:'.$date_expired_2222.'</span>
                          <del><h2>&#8369 '.number_format($car_row->PROPRICE).'</h2></del>
                          ';
                          $orginal_price = $car_row->PRODISPRICE;
                         echo '<input type="hidden" name="PROPRICE" value="'.$car_row->PRODISPRICE.'">
                         ';
          
                        }else{
          
                          // echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'<h6>Expired: <span class="label label-danger">'.$date_expired.'</span></h6></td>';
                        
                          echo '
                          <h2>&#8369 '.$car_row->PROPRICE.'</h2>
                        
                          ';

                          echo '<input type="hidden" name="PROPRICE" value="'.$car_row->PROPRICE.'">';
                          $orginal_price = $car_row->PROPRICE;

                        }
                      
                        $x_caro++;
                      
                    
                      ?>


                  <h2> <button type="submit" name="btnorder"  class="btn btn-primary add-to-cart"><i class=""></i>Order Now</button></h2>
                 
                 
                </div>
                <div class="col-sm-6">
                  <img src="<?php  echo web_root.'admin/products/'. $car_row->IMAGES; ?>" class="" alt="" width="650px" height="440px" />
                  
                </div>
                  </form>
              </div>

            <?php    
              }
            }
            }
            ?>




          

            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
 <section id="advertisement">
    <div class="container">
     
    </div>
  </section>
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
         <?php include 'sidebar.php'; ?>
          </div><!--/category-productsr-->  
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
              <?php

              //query for days
              $query_days = "SELECT * FROM `tb_setting_days` WHERE id = 1";
              $mydb->setQuery($query_days);
              $day_sql = $mydb->loadResultList();
              foreach ($day_sql as $singleday) { 

                 $day_now = $singleday->day;

              }

             if(isset($_POST['search'])) { 
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND  p.$day_now = 1
                AND ( `CATEGORIES` LIKE '%{$_POST['search']}%' OR `PRODESC` LIKE '%{$_POST['search']}%' or `PROQTY` LIKE '%{$_POST['search']}%' or `PROPRICE` LIKE '%{$_POST['search']}%')";
                $title_of_foods = 'All foods';
                $condtion_if_exist = 0;

              }elseif(isset($_GET['category'])){
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND  p.$day_now = 1 AND CATEGORIES='{$_GET['category']}'";
                          $title_of_foods = $_GET['category'];
                          $condtion_if_exist = 0;

              }elseif (isset($_GET['suggested_food'])) { //for best sale
                $cus_id = $_SESSION['CUSID'];
            
                $query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O,    `tblsummary` S ,`tblcustomer` C 
                WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`= $cus_id AND p.$day_now = 1 AND PROQTY>0 AND S.`ORDEREDSTATS` = 'Confirmed' GROUP BY `PRODESC` ORDER BY QTY DESC";
                $title_of_foods = 'Suggested Foods';
                $condtion_if_exist = 0;

                # code...
              }elseif (isset($_GET['best_sale'])) {
                
                $query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O,    `tblsummary` S ,`tblcustomer` C 
                WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID` AND PROQTY>0 AND p.$day_now = 1 AND S.`ORDEREDSTATS` = 'Confirmed' GROUP BY `PRODESC` LIMIT 5";
                $title_of_foods = 'Best Sale';
                $condtion_if_exist = 1;

                # code...
              }else{
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY > 0 AND  p.$day_now = 1";
                                                    $title_of_foods = 'All foods';
                                                    $condtion_if_exist = 0;
              }
            //date now
            echo '<h2 class="title text-center">'.$title_of_foods.'</h2>';
            date_default_timezone_set('Asia/Manila');
            $date_time_now = date('F j, Y H:i');
						$date_now_compare1 = (strtotime($date_time_now));
            //date now

            $mydb->setQuery($query);
            $res = $mydb->executeQuery();
            $maxrow = $mydb->num_rows($res);

            if ($maxrow > 0) { 
            $cur = $mydb->loadResultList();
            $countssss = 0;

            foreach ($cur as $result) { 

              $date = date_create($result->DT_XPRD_DISCOUNT);
              $date_expired = date_format($date,"F j, Y g:ia");

              $date_expire_compare2 = (strtotime($date_expired));


              if ($condtion_if_exist == 1) {
                $set_best_sale_qty = 5;
                 $condition_5 = $result->QTY >= 5;
              }else{
                $set_best_sale_qty = 0;
                $condition_5 = 5 == 5;

              }

              if ($condition_5) {
                # code...
              
             $countssss++;
              ?>
            <form   method="POST" action="cart/controller.php?action=add">


            <?php //here ?>
            <!-- <input type="hidden" name="PROPRICE" value="<?php  //echo $result->PROPRICE; ?>"> -->
            <!-- <input type="hidden" name="PROPRICE" value="<?php  //echo $result->PRODISPRICE; ?>"> -->



            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img class = "img" src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                    
                      <?php
                      if ($result->PRODISCOUNT == 0) {
                       ?>
                            <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                            <del style = "display:none;"><h2>&#8369  <?= number_format($result->PROPRICE) ?></h2></del>

                       <?php

                            echo '<input type="hidden" name="PROPRICE" value="'.$result->PRODISPRICE.'">';
                            $orginal_price = $result->PRODISPRICE;
                      }else{

                      
                        if ($date_now_compare1 <= $date_expire_compare2) {

                          // echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'<h6>Available until:<span class="label label-success">'.$date_expired.'</span></h6></td>';
                          $date_2222 = date_create($result->DT_XPRD_DISCOUNT);
                          $date_expired_2222 = date_format($date_2222,"F j, Y g:ia");

                          echo '
                          <h2>&#8369 '.$result->PRODISPRICE.'</h2>
                          <span style ="font-size:10px;">Discount until:'.$date_expired_2222.'</span>
                          <del><h2>&#8369 '.number_format($result->PROPRICE).'</h2></del>
                          ';
                          $orginal_price = $result->PRODISPRICE;
                         echo '<input type="hidden" name="PROPRICE" value="'.$result->PRODISPRICE.'">
                         ';
          
                        }else{
          
                          // echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'<h6>Expired: <span class="label label-danger">'.$date_expired.'</span></h6></td>';
                        
                          echo '
                          <h2>&#8369 '.$result->PROPRICE.'</h2>
                        
                          ';

                          echo '<input type="hidden" name="PROPRICE" value="'.$result->PROPRICE.'">';
                          $orginal_price = $result->PROPRICE;

                        }
                      
                    
                      
                    }
                      ?>
                      <p><?php  echo    $result->PRODESC; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class=""></i>Order Now</button>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>&#8369 <?php  
                        
                          
                              //echo '<br>';
                              echo $orginal_price; 
                              //echo $result->PRODISPRICE; 
                           
                       
                        
                        
                        
                        ?></h2>
                        <p><?php  echo    $result->PRODESC; ?></p>
                        <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class=""></i>Order Now</button>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                   <li>
                              <?php     
                            if (isset($_SESSION['CUSID'])){  

                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                             }else{
                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                            }  
                            ?>

                    </li> 
                  </ul>
                </div>
              </div>
            </div>
          </form>
       <?php  
       
      }else{
        //echo '<h3 style ="text-align:center">No best sale for now</h3>';

        //$none_best_sale = 1;
        //echo $result->QTY;
         $countssss;

      }

      } 

      
      if ($countssss == 0) {
                    

        echo '<h3 style ="text-align:center">No best sale for now</h3>';


      }


            }else{ 

              echo '<h1>No Products Available</h1>';

            }?> 
         

          </div><!--features_items-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Best sale</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active"> 
                         
                <h3 style ="text-align:center">No best sale for now</h3>
                </div>


                <!-- <div class="item">  
                  <?php 
                   $query_3="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O,    `tblsummary` S ,`tblcustomer` C 
                   WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND PROQTY>0 AND p.$day_now = 1 AND S.`ORDEREDSTATS` = 'Confirmed' GROUP BY `PRODESC` LIMIT 3,6";

                    // $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    // WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND p.$day_now = 1 limit 3,6";
                    //set here by 3 best sell with confirm and set a day
                    $mydb->setQuery($query_3);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                          <?php
                      if ($result->PRODISCOUNT == 0) {
                       ?>

                            <del style = "display:none;"><h2>&#8369  <?= number_format($result->PROPRICE) ?></h2></del>

                       <?php


                      }else{

                      
                      ?>
                      <del><h2>&#8369  <?= number_format($result->PROPRICE) ?></h2></del>

                      <?php 
                      
                    }
                      ?>
                          <p><?php  echo    $result->PRODESC; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div> -->
              </div>
               <!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>       -->
            </div>
          </div><!--/recommended_items-->

          <div class="suggested_items"><!--! suggested items-->

          <?php
          if (isset($_GET['suggested_food'])) {
          ?>
            <h2 class="text-center"><a href = "index.php?q=product" class = "btn btn-primary" style = "text-transform: uppercase;">View all food's</a></h2>
          <?php
          }else{

            if (!isset($_SESSION['CUSID'])) {
             
                "hello";

            }else{
          ?>
            <h2 class="text-center"><a href = "index.php?q=product&suggested_food=1" class = "btn btn-primary" style = "text-transform: uppercase;">View all Suggested food's</a></h2>
          <?php
            }
          }
          ?>         
         
                  

          </div><!--/suggested items-->

        </div>
      </div>
    </div>
  </section>
  

  <style>
.img {
    height: 280px;
    background-size: cover;
}
  </style>
  