 <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">           
                <div class="col-sm-12">                         
                    <h2 class="title text-center">Contact <strong>Us</strong></h2>                                                      
                    <div id="gmap" class="contact-map">
                    </div>
                </div>                  
            </div>      
            <div class="row">   
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
				  		$mydb->setQuery("SELECT * FROM `company_name`  WHERE id = 1");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $results) {
            }
            ?>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p><?= $results->company_name ?> Inc.</p>
                            <p>Malacampa, Camiling, Tarlac, Philippines</p>
                            <p>Mobile: +639 968 5387</p>
                            <p>Fax: 1-714-252-0026</p>
                            <p>Email: <?=  strtolower($results->company_name) ?>@gmail.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>              
            </div>  
        </div>  
    </div><!--/#contact-page-->