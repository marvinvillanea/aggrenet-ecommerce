  <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
 
                 <?php 
                      $mydb->setQuery("SELECT * FROM `tblcategory`");
                      $cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
                      echo ' <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"><a href="index.php?q=product&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></h4>
                            </div>
                          </div>';
                      }
                  ?>
              
            </div><!--/category-products-->
            <h2 class= "d-none">Food Recommendation</h2>

            <div class="panel-group category-products d-none" id="accordian"><!--category-productsr-->
                          <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a href="index.php?q=product&best_sale=1">Best Sale</a>
                              </h4>
                            </div>
                          </div>
                          <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a href="index.php?q=product&suggested_food=1">Suggested Food</a>
                              </h4>
                            </div>
                          </div>
            </div><!--/category-products-->

            <div class="shipping text-center"><!--shipping-->
              <img src="images/home/ship.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>

 