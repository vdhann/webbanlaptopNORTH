<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vuthibacdk12cntt2";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
        $sql = "SELECT * 
        FROM sanpham1
        order by rand() ";
    //Bước 3
    $result = mysqli_query($conn, $sql);
    ?>
 <!-- =====  PRODUCT TAB  ===== -->
 <div class="container">
     <!-- =====  SUB BANNER END  ===== -->
     <div class="row ">
        <div class="col-sm-12 mtb_10">
          <!-- =====  PRODUCT TAB  ===== -->
          <div id="product-tab" class="mt_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">IPAD THỜI THƯỢNG</h2>
            </div>
           
            <div class="tab-content clearfix box">
              <div class="tab-pane active" id="nArrivals">
              
                <div class="nArrivals owl-carousel"> <?php       $limit = 8; 
                            $count = 0; 
                            while ($row= mysqli_fetch_assoc($result)) { 
                                if ($count >= $limit) {
                                    break; 
                                }    
                        ?> 
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"> 
                        <a href="chitiet.php?masp=<?php echo $row["masp"] ?>"  >
                                        <img data-name="product_image" alt="iPod Classic" title="iPod Classic"  class="img-responsive" src="upload/<?php echo $row["img1"] ?>" alt="" class="card-image"  >
                          
                            <img src="upload/<?php echo $row["img2"] ?>" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                          <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <form action="cart.php" method="post" >
                                           
                                           <input type="submit"  name="addcart" class="add-to-cart">
                                           <input type="hidden" name="soluong" value="1">
                                           <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                           <input type="hidden" name="dongiamoi" value="<?php echo $row["dongiamoi"] ?> 000 VNĐ">
                                           <input type="hidden" name="img1" value="<?php echo $row["img1"] ?>">   
                                   </form>
                          </div>
                        </div>
                        <div class="caption product-detail text-center">
                          <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                          <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem"><?php echo $row["tensp"] ?></a></h6>
                          <span class="price"><span class="amount"><span class="currencySymbol"></span><?php echo $row["dongiamoi"] ?> 000 VNĐ</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <?php 
                            $count++;    
                            }     ?>  
               
                </div> 
              </div>
            </div>
          </div>
                        </div>
          <!-- =====  PRODUCT TAB  END ===== -->
          <a id="scrollup"></a>
  <script src="js/jQuery_v3.1.1.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.magnific-popup.js"></script>
  <script src="js/jquery.firstVisitPopup.js"></script>
  <script src="js/custom.js"></script>
<div id="brand_carouse" class="ptb_50 text-center">
        <div class="type-01">
          <div class="row">
            <div class="col-sm-12">
              <div class="brand owl-carousel ptb_20">
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="ass/images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="newsletters mb_50">
        <div class="row">
          <div class="col-sm-6">
            <div class="news-head pull-left">
              <h2>SIGN UP FOR NEWSLETTER</h2>
              <div class="new-desc">Be the First to know about our Fresh Arrivals and much more!</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="news-form pull-right">
              <form onsubmit="return validatemail();" method="post">
                <div class="form-group required">
                  <input name="email" id="email" placeholder="Enter Your Email" class="form-control input-lg" required="" type="email">
                  <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
                          </div>
                          </div>
                          </div>