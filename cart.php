<!-- <style>
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style> -->
<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Your Food Order</li>
        </ol>
      </div>
      <div class="table-responsive cart_info"> 
        <?php  

  // if (!isset($_SESSION['USERID'])){
  //     redirect("index.php"); 
  
check_message();  
 
?>
            
                         <table  class="table table-condensed" id="table" >
                         <thead> 
                          <tr class="cart_menu"> 
                             <td  >Product</td>
                             <td >Description</td>
                             <td  width="15%" >Price</td>
                             <td  width="15%" >Quantity</td> 
                             <td  width="15%" >Total</td>  
                             <td> Action</td>  
                          </tr>
                         </thead>  
                          
                             <?php
                            //date now
                            date_default_timezone_set('Asia/Manila');
                            $date_time_now = date('F j, Y H:i');
                            $date_now_compare1 = (strtotime($date_time_now));
                            //date now


                              if (!empty($_SESSION['gcCart'])){ 

                                echo '<script>totalprice()</script>';

                                  $count_cart = count($_SESSION['gcCart']);

                                for ($i=0; $i < $count_cart  ; $i++) { 
 
                                       $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                                                 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.`PROID` = '".@$_SESSION['gcCart'][$i]['productid']."'";
                                       $mydb->setQuery($query);
                                      $cur = $mydb->loadResultList();
                                
                                
                                 foreach ($cur as $result) {

                                ?>
                                <tr>
                                  <td>  
                                    <img src="<?php echo web_root. 'admin/products/'.$result->IMAGES; ?>"  onload="  totalprice() " width="50px" height="50px"> 
                                  <br/> 
                                        <?php    
                                          
                                              
                                            if (isset($_SESSION['CUSID'])){  

                                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist">Add to wishlist</a>
             ';
                                           
                                             }else{
                                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'">Add to wishlist</a>
             ';
                                            } 
                                  



                                          ?>




                                 </td>
                                  <td>  
                                    <?php echo  $result->PRODESC ; ?>
                                  </td>
                                  <td>
                                    <!-- <input type="hidden"    id ="PROPRICE<?php //echo $result->PROID;  ?>" name="PROPRICE<?php //echo $result->PROID; ?>" value="<?php //echo  $result->PRODISPRICE ; ?>" > -->
                                     
                                  &#8369  <?php 
                                  
                                  $date = date_create($result->DT_XPRD_DISCOUNT);
                                  $date_expired = date_format($date,"F j, Y g:ia");
                                  $date_expire_compare2 = (strtotime($date_expired));
                                  
                                  if ($date_now_compare1 <= $date_expire_compare2) {


                                    echo  $result->PRODISPRICE; 
                                    echo '<input type="hidden" id ="PROPRICE'.$result->PROID.'" name="PROPRICE'. $result->PROID.'" value="'.$result->PRODISPRICE.'" >';

                                  }else{

                                    echo  $result->PROPRICE; 
                                    echo '<input type="hidden" id ="PROPRICE'.$result->PROID.'" name="PROPRICE'. $result->PROID.'" value="'.$result->PROPRICE.'" >';

                                  }
                                  
                                  
                                  
                                  
                                  // echo  $result->PRODISPRICE ; 
                                  
                                  
                                  ?>

                                  



                                  </td>
                                  <td class="input-group custom-search-form" >
                                       <input type="hidden" maxlength="3" class="form-control input-sm"  autocomplete="off"  id ="ORIGQTY<?php echo $result->PROID;  ?>" name="ORIGQTY<?php echo $result->PROID; ?>" value="<?php echo $result->PROQTY; ?>"   placeholder="Search for...">
                                       <br>
                                       <div class="input-group quantity" style = "width:100px;">
                                       <div class="input-group-btn">
                                          <button class="btn btn-info btn-sm btn-minus" data-id="<?php echo $result->PROID;  ?>" type="button">
                                            <i class="glyphicon glyphicon-minus"></i>
                                          </button>
                                        </div>
                                        <!-- <input type="hidden" maxlength="3" data-id="<?php echo $result->PROID;  ?>" class="QTY form-control input-sm"  autocomplete="off"  id ="QTY<?php echo $result->PROID;  ?>" name="QTY<?php echo $result->PROID; ?>" value="<?php echo $_SESSION['gcCart'][$i]['qty']; ?>"   placeholder="Search for..."> -->

                                        <input type="number"  maxlength="3" data-id="<?php echo $result->PROID;  ?>" class="QTY form-control input-sm"  autocomplete="off"  id ="QTY2<?php echo $result->PROID;  ?>" name="QTY<?php echo $result->PROID; ?>" value="<?php echo $_SESSION['gcCart'][$i]['qty']; ?>"   placeholder="Search for..." readonly>

                                        <div class="input-group-btn">
                                          <button class="btn btn-info btn-sm btn-plus" data-id="<?php echo $result->PROID;  ?>"  type="button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                          </button>
                                                
                                        </div>
                                        </div>
                                        </td>
                                      
                                        <input type="hidden"    id ="TOT<?php echo $result->PROID;  ?>" name="TOT<?php echo $result->PROID; ?>" value="<?php echo  $result->PRODISPRICE ; ?>" >
                                   
                                     <td> &#8369 <output id="Osubtot<?php echo $result->PROID ?>"><?php echo   $_SESSION['gcCart'][$i]['price'] ; ?></output></td>

                                     <td>
                                       <span class="input-group-btn">
                                                <a title="Remove Item"  class="btn btn-danger btn-sm" id="btnsearch" name="btnsearch" href="cart/controller.php?action=delete&id=<?php echo $result->PROID; ?>">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </span>
                                      </td>
                                </tr>
       
         </script>


                            <?php  
                                 }
                               }
                               }else{ 
                                  echo "<h1>There is no item.</h1>";
                               } 
                            ?>  
                                
                      </table> 

     
                        <h3 align="right"> Total  &#8369<span id="sum">0</span></h3> 
    </div>
  </div>  
 
</section>
<section id="do_action">
    <div class="container">
      <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
      </div>
      <div class="row">
     <form action="index.php?q=orderdetails" method="post">
   <a href="index.php?q=product" class="btn btn-default check_out pull-left ">
   <i class="fa fa-arrow-left fa-fw"></i>
   Add New Order
   </a>

     <?php    
  
                     $countcart =isset($_SESSION['gcCart'])? count($_SESSION['gcCart']) : "0";
                   if ($countcart > 0){
  
                  if (isset($_SESSION['CUSID'])){  
               
                    echo '<button type="submit"  name="proceed" id="proceed" class="btn btn-default check_out btn-pup pull-right">
                            Proceed And Checkout
                            <i class="fa  fa-arrow-right fa-fw"></i>
                            </button>';
                 
                   }else{
                     echo   '<a data-target="#smyModal" data-toggle="modal" class="btn btn-default check_out signup pull-right" href="">
                              Proceed And Checkout
                              <i class="fa  fa-arrow-right fa-fw"></i>
                              </a>';
                  } 
                }



                ?>
 </form>
      </div>
    </div>
  </section><!--/#do_action-->
  <style>
  input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <script>

    $(document).ready(function(){
  

      $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            if (oldValue != '') {
                var newVal = parseFloat(oldValue) + 1;
               
            }else{ 
                 newVal = 1;
            }
           
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });



    });


  </script>

<!-- <input type="text" id="number" value="0"/>
   <input type="button" onclick="incrementValue()" min = "1" value="Increment Value" />
   <input type="button" onclick="dereValue()" value="De Value" /> -->