<?php
session_start();
    include("connection/connect.php"); 
    error_reporting(0);
    

    include_once 'product-action.php'; 
    include_once 'checkout-action.php'; 
    
    
    
                     
    ?>
    
    <!DOCTYPE html>
     <html lang="en" style="background-color:white;">
    
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Products</title>
    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> </head>
    
    <body>
        
            <header id="header" style="display: contents" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" style="height:100px"alt=""> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                           <ul class="nav navbar-nav">
                                <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                  
                                
    							<?php
                    if(empty($_SESSION["user_id"]))
                      {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                        <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>
                        <button type="button" class="btn btn-info btn-lg" style="    border: transparent;
                            background-color: transparent;
                            padding: 10px;
                            color: maroon;" data-toggle="modal" data-target="#myModal"> <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span></button>
                            ';?>
    
    
                            <?php
                      }
                    else
                      {?>
                      <li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>  
                  <li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>
                  <button type="button" class="btn btn-info btn-lg" style="    border: transparent;
                            background-color: transparent;
                            padding: 10px;
                            color: maroon;" data-toggle="modal" data-target="#myModal"> <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span></button>
                        <?php
    
    $item_total = 0;
    
     $ress= mysqli_query($db,"select * from livestock where rs_id='$_GET[res_id]'");
    $rows=mysqli_fetch_array($ress);
     
     
    if ($_SESSION["cart_item"] == $item)  
    {
      $item_total += ($item["price"]*$item["quantity"]); 
    ?>	
                      
    							
                  
                  <?php
                                          if($item_total==0){
                                          ?>
                
    <?php } else  { ?>
        
      
    <?php } ?>
    <li class="nav-item"><?php echo "TOTAL PHP".$item_total; ?></li>
    
    <?php } ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="padding-top: 10px;">Your Cart</h4>
          </div>
          <div class="modal-body">
          <div class="container m-t-30">
                  <div class="row">
                      <div  style="    width: 100%;" class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                          
                           <div class="widget widget-cart">
                                  <div class="widget-heading">
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="order-row bg-white">
                                      <div class="widget-body">
                                      
    <?php
    
    $item_total = 0;
    
     $ress= mysqli_query($db,"select * from livestock where rs_id='$_GET[res_id]'");
    $rows=mysqli_fetch_array($ress);
     
     
    foreach ($_SESSION["cart_item"] as $item)  
    {
    ?>									
                                      
                <div style="overflow-y: auto;"class="title-row">
          
                <?php echo $item["title"]; ?><a style="display:inline-flex;" href="pro_duct.php?res_id=<?php echo $_GET['res_id'];?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                            <i class="fa fa-trash pull-right"></i></a>
                 </div>
                                          
                <div class="form-group row no-gutter">
                <div class="col-xs-8">
                    <input type="text" class="form-control b-r-0" style="width: max-content;" value=<?php echo "PHP".$item["price"]; ?> readonly id="exampleSelect1">
                </div>
                 
                <div class="col-xs-4">
                      <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                </div>
                                        
      <?php
    $item_total += ($item["price"]*$item["quantity"]); 
    }
    ?>								  
                                      
                                      </div>
                                  </div>
                             
                                  <div class="widget-body">
                                      <div class="price-wrap text-xs-center">
                                          <p>TOTAL</p>
                                          <h3 class="value"><strong><?php echo "PHP".$item_total; ?></strong></h3>
                                          <p></p>
                                          <?php
                                          if($item_total==0){
                                          ?>
    
                                          
                                          <a data-toggle="modal" data-target="#Checkout"style="background-color: #b98717; color:white;
                                          border-radius: 15px;border: 0;" class="btn btn-danger btn-lg disabled">Checkout</a>
    
                                          <?php
                                          }
                                          else{   
                                          ?>
                                          <a data-toggle="modal" data-target="#Checkout"style="background-color: #b98717; color:white;
                                          border-radius: 15px;border: 0;" class="btn btn-success btn-lg active">Checkout</a>
                                          <?php   
                                          }
                                          ?>
    
                                      </div>
                                  </div>
                                  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    					
    
    <!-- Checkout -->
    <div class="modal fade" id="Checkout" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
       	
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" style="margin-right: 20px;"class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="padding-top: 10px;">Checkout</h4>
          </div>
          <div class="modal-body">
         
        <div class="container m-t-30">
    			<form action="" method="post">
                    <div class="widget clearfix">
                        
                        <div class="widget-body" style="padding-bottom: 250px;">
                            <form method="post" action="js/notification.js">
                                <div class="row">
                                    
                                    <div class="col-sm-12">
                                        <div class="cart-totals margin-b-20">
                                            <div class="cart-totals-title">
                                                <h4>Cart Summary</h4> </div>
                                            <div  style="     color: black;"class="cart-totals-fields">
    										
                                                <table class="table">
    											<tbody>
                                              
    												 
    											   
                                                        <tr>
                                                            <td>Cart Subtotal</td>
                                                            <td> <?php echo "".$item_total; ?></td>
                                                        </tr>
                                                     
                                                        <tr>
                                                            <td class="text-color"><strong>Total</strong></td>
                                                            <td class="text-color"><strong> <?php echo "PHP".$item_total; ?></strong></td>
                                                        </tr>
                                                    </tbody>
    												
    												
    												
    												
                                                </table>
                                            </div>
                                        </div>
                                        <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <li>
    
                                                        <span class="custom-control-description">Cash on Pickup</span>
                                                    </label>
                                                   
                                                </li>
                                                <li>
                                                
                                                          <span class="custom-control-description">Not be able to pick up within 24hrs. will automatically disregard your reservation.</span>
                                                    </label>
                                                </li>
                                             
                                            </ul>
                                            <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submits" style="background-color: #181818; border-color: orange"  class="btn btn-success btn-block" value="ORDER NOW"> </p>
                                        </div>
    									</form>
                                    </div>
                                </div>
                               
                        </div>
                    </div>
    				 </form>
                </div>
                
    </div>
      </div>
      </div></div>
    <!-- end of checkout -->
    
    				
    						<?php	}
    
    						?>
    							 
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <section>
          
    
            </section>
            
            <div style="padding-top: 0px;
        /* margin-top: -72px; */
        box-shadow: rgb(157 81 24 / 37%) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 3px;  " class="page-wrapper">
               
    			<?php $ress= mysqli_query($db,"select * from livestock where rs_id='$_GET[res_id]'");
    									     $rows=mysqli_fetch_array($ress);
    										  
    										  ?>
                                               <?php  
                                      $stmt = $db->prepare("select * from pro_duct where rs_id='$_GET[res_id]'");
                                      $stmt->execute();
                                      $products = $stmt->get_result();
                                                       
                                                       ?>
              
                <div class="breadcrumb">
                    <div class="container">
                    <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
                    <div style= "
        background-color: #a34d0d00;
        border-radius: 6px;
    ;"class="profile">
                        <div class="grid product">
                            <div class="column-xs-12 column-md-7">
                                <div class="product-gallery">
                                    <div class="product-image">
                                        <figure class="active"><?php echo '<img src="admin/Pro_img/'.$rows['image'].'" alt="livestock logo">'; ?></figure>
                                    </div>
                            </div></div>
                                    <div style="    display: flex;
                                    -ms-flex-wrap: wrap;
                                    flex-wrap: wrap;" class="column-xs-12 column-md-5">
                                <div style="width:100%;    display: contents;" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                    <div class="pull-left right-text white-txt">
                                        <h1 style="color:black;    font-family: sans-serif;"><?php echo $rows['title']; ?></h1>
                                         <p style="color: gray;overflow-y: auto;height: 59px;"><?php echo $rows['address']; ?></p>  
                                         <h2 style="    border-top: solid gray 1px;
                                          color: brown;
                                          font-weight: 600;
                                          font-size: inherit;
                                          padding-top: 7px;"> Variety </h2>
                                                                      </div>
                                    
                                    <?php  
                                      $stmt = $db->prepare("select * from pro_duct where rs_id='$_GET[res_id]'");
                                      $stmt->execute();
                                      $products = $stmt->get_result();
                                      if (!empty($products)) 
                                      {
                                      foreach($products as $product)
                                          {
                                          
                                                       ?>           
                                 
                      </div> 
                          
         <div class="variety">
                              
                                <div class="row" style="
          background-color: #f2eee3;
     
        border-radius: 7px;
        padding: 10px;
        width: 95%;
      
        display: flex;
        overflow: auto;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;">
                                          
                                          <form method="post" style="width: 100%;" action='pro_duct.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>      
                                  
                                              <div class="rest-descr">
                                               <div>   <h6 style="
                                                  font-size: 28px;
                                                  font-weight: 600;width: max-content;
                                                  ">
                                              
                                              <?php echo $product['title']; ?></h6></div>
                                              <?php
                                                  if($product['stock'] == 0){
                                                     echo'Stock: OUT OF STOCK';
                                                     ?>
                                                   <div class="php">
                                                    <div style="display: flex;flex-wrap: wrap;"class="price">
                                                     <h2 style="font-size: 22px;font-weight: 550;color: #ee4d2d;"><span>PHP<?php echo $product['price']; ?></span></h2>
                                                    </div>      
                                            <div style="text-align: right;"class="priceaddtocart"> 
                                                   
                                                   
                                                       
                                                  <?php }else{
                                                    
                                                    
                                                   ?>
                                                   <p>Stock:  <?php echo $product['stock']; ?></p>
                                                   <div class="php">
                                            <div style="display: flex;flex-wrap: wrap;"class="price">
                                                     <h2 style="font-size: 22px;font-weight: 550;color: #ee4d2d;"><span>PHP<?php echo $product['price']; ?></span></h2>
                                                    </div>      
                                            <div style="text-align: right;"class="priceaddtocart"> 
                                                   
                                            <input class="b-r-0"  type="number" name="quantity" min="0" value="1" size="2" />
                                                
                                              <input type="submit" class="variety-product" style="margin-left:30px;" value="Add To Cart" />
                                             
                                                      
    
                                                      <?php 
                                                      }?>
                                                  </p>
    
                                              </div>
                             
                                         
                                
                                          </div>
                                          </form>
                                          </div>   
                                          
                                         <?php }}
                                          ?>       
                </section>
             <script>const cartButton = document.querySelectorAll(".cart__button");
    cartButton.forEach((button) => {
      button.addEventListener("click", cartClick);
    });
    
    function cartClick() {
      let button = this;
      button.classList.add("clicked");
    }
    
    </script>
    <script
        src="https://kit.fontawesome.com/3431c04d0c.js"
        crossorigin="anonymous"></script> 
    <style>
    /*=============== Google Fonts ===============*/
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    
    .cart__button {
      position: relative;
      width: 200px;
      height: 62px;
      border-radius: 10px;
      background-color: #b57433;
      font-size: 1rem;
      font-weight: 500;
      color: #fff;
      cursor: pointer;
      overflow: hidden;
      transition: 0.3s ease-in-out;
    }
    
    .cart__button:hover {
      background-color: #b57433;
    }
    
    .cart__button:active {
      transform: scale(0.9);
    }
    
    .cart__button .fa-shopping-cart {
      position: absolute;
      z-index: 2;
      top: 50%;
      left: -10%;
      font-size: 1.5rem;
      transform: translate(-50%, -50%);
    }
    
    .cart__button .fa-box {
      position: absolute;
      z-index: 3;
      top: -20%;
      left: 52%;
      font-size: 0.875rem;
      transform: translate(-50%, -50%);
    }
    
    .cart__button span {
      position: absolute;
      left: 50%;
      z-index: 3;
      top: 50%;
      transform: translate(-50%, -50%);
    }
    
    .cart__button span.add__to-cart {
      opacity: 1;
    }
    
    .cart__button span.added {
      opacity: 0;
    }
    
    .cart__button.clicked .fa-shopping-cart {
      animation: cart 1.5s ease-in-out forwards;
    }
    
    .cart__button.clicked .fa-box {
      animation: box 1.5s ease-in-out forwards;
    }
    
    .cart__button.clicked span.add__to-cart {
      animation: txt1 1.5s ease-in-out forwards;
    }
    
    .cart__button.clicked span.added {
      animation: txt2 1.5s ease-in-out forwards;
    }
    
    @keyframes cart {
      0% {
        left: -10%;
      }
    
      40%,
      60% {
        left: 50%;
      }
    
      100% {
        left: 110%;
      }
    }
    
    @keyframes box {
      0%,
      40% {
        top: -20%;
      }
    
      60% {
        top: 40%;
        left: 52%;
      }
    
      100% {
        top: 40%;
        left: 112%;
      }
    }
    
    @keyframes txt1 {
      0% {
        opacity: 1;
      }
    
      20%,
      100% {
        opacity: 0;
      }
    }
    
    @keyframes txt2 {
      0%,
      80% {
        opacity: 0;
      }
    
      100% {
        opacity: 1;
      }
    }
    </style>
            <script>
    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>
    <script>
            let isToggled = false;
            const toggleButton = document.getElementById('colorToggle');
            const form = document.getElementById('myForm');
            const resultDiv = document.getElementById('result');
    
            function toggleColor() {
                isToggled = !isToggled;
    
                if (isToggled) {
                    toggleButton.classList.add('toggled-button');
                    toggleButton.textContent = 'Toggle Color (Toggled)';
                    form.classList.add('visible-form');
                    form.classList.remove('hidden-form');
                } else {
                    toggleButton.classList.remove('toggled-button');
                    toggleButton.textContent = 'Toggle Color';
                    form.classList.remove('visible-form');
                    form.classList.add('hidden-form');
                }
            }
    
            function displayFormData(event) {
                event.preventDefault();
                const quantityInput = parseInt(document.getElementById('quantity').value);
                if (!isNaN(quantityInput)) {
                    resultDiv.innerHTML = `Quantity: ${quantityInput}`;
                } else {
                    resultDiv.innerHTML = 'Invalid input. Please enter a valid number.';
                }
            }
        </script>   
    <script>
            // JavaScript to toggle the form visibility
            const toggleButton = document.getElementById('toggleButton');
            const formContainer = document.getElementById('formContainer');
    
            toggleButton.addEventListener('click', () => {
                if (formContainer.style.display === 'none' || formContainer.style.display === '') {
                    formContainer.style.display = 'block';
                } else {
                    formContainer.style.display = 'none';
                }
            });
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
      
      <style> @import url("https://fonts.googleapis.com/css?family=Pontano+Sans");
    .container {
      margin: auto;
      padding: 0 1rem;
      max-width: 71.25rem;
      width: 100%;
    }
    
    .grid {
      display: flex;
      flex-direction: column;
      flex-flow: row wrap;
    }
    .grid > [class*=column-] {
      display: block;
    }
    
    .first {
      order: -1;
    }
    
    .last {
      order: 12;
    }
    
    .align-top {
      align-items: start;
    }
    
    .align-center {
      align-items: center;
    }
    
    .align-bottom {
      align-items: end;
    }
    
    .column-xs-1 {
      flex-basis: 8.3333333333%;
      max-width: 8.3333333333%;
    }
    
    .column-xs-2 {
      flex-basis: 16.6666666667%;
      max-width: 16.6666666667%;
    }
    
    .column-xs-3 {
      flex-basis: 25%;
      max-width: 25%;
    }
    
    .column-xs-4 {
      flex-basis: 33.3333333333%;
      max-width: 33.3333333333%;
    }
    
    .column-xs-5 {
      flex-basis: 41.6666666667%;
      max-width: 41.6666666667%;
    }
    
    .column-xs-6 {
      flex-basis: 50%;
      max-width: 50%;
    }
    
    .column-xs-7 {
      flex-basis: 58.3333333333%;
      max-width: 58.3333333333%;
    }
    
    .column-xs-8 {
      flex-basis: 66.6666666667%;
      max-width: 66.6666666667%;
    }
    
    .column-xs-9 {
      flex-basis: 75%;
      max-width: 75%;
    }
    
    .column-xs-10 {
      flex-basis: 83.3333333333%;
      max-width: 83.3333333333%;
    }
    
    .column-xs-11 {
      flex-basis: 91.6666666667%;
      max-width: 91.6666666667%;
    }
    
    .column-xs-12 {
      flex-basis: 100%;
      max-width: 100%;
    }
    
    @media (min-width: 48rem) {
      .column-sm-1 {
        flex-basis: 8.3333333333%;
        max-width: 8.3333333333%;
      }
    
      .column-sm-2 {
        flex-basis: 16.6666666667%;
        max-width: 16.6666666667%;
      }
    
      .column-sm-3 {
        flex-basis: 25%;
        max-width: 25%;
      }
    
      .column-sm-4 {
        flex-basis: 33.3333333333%;
        max-width: 33.3333333333%;
      }
    
      .column-sm-5 {
        flex-basis: 41.6666666667%;
        max-width: 41.6666666667%;
      }
    
      .column-sm-6 {
        flex-basis: 50%;
        max-width: 50%;
      }
    
      .column-sm-7 {
        flex-basis: 58.3333333333%;
        max-width: 58.3333333333%;
      }
    
      .column-sm-8 {
        flex-basis: 66.6666666667%;
        max-width: 66.6666666667%;
      }
    
      .column-sm-9 {
        flex-basis: 75%;
        max-width: 75%;
      }
    
      .column-sm-10 {
        flex-basis: 83.3333333333%;
        max-width: 83.3333333333%;
      }
    
      .column-sm-11 {
        flex-basis: 91.6666666667%;
        max-width: 91.6666666667%;
      }
    
      .column-sm-12 {
        flex-basis: 100%;
        max-width: 100%;
      }
    }
    @media (min-width: 62rem) {
      .column-md-1 {
        flex-basis: 8.3333333333%;
        max-width: 8.3333333333%;
      }
    
      .column-md-2 {
        flex-basis: 16.6666666667%;
        max-width: 16.6666666667%;
      }
    
      .column-md-3 {
        flex-basis: 25%;
        max-width: 25%;
      }
    
      .column-md-4 {
        flex-basis: 33.3333333333%;
        max-width: 33.3333333333%;
      }
    
      .column-md-5 {
        flex-basis: 41.6666666667%;
        max-width: 41.6666666667%;
      }
    
      .column-md-6 {
        flex-basis: 50%;
        max-width: 50%;
      }
    
      .column-md-7 {
        flex-basis: 58.3333333333%;
        max-width: 58.3333333333%;
      }
    
      .column-md-8 {
        flex-basis: 66.6666666667%;
        max-width: 66.6666666667%;
      }
    
      .column-md-9 {
        flex-basis: 75%;
        max-width: 75%;
      }
    
      .column-md-10 {
        flex-basis: 83.3333333333%;
        max-width: 83.3333333333%;
      }
    
      .column-md-11 {
        flex-basis: 91.6666666667%;
        max-width: 91.6666666667%;
      }
    
      .column-md-12 {
        flex-basis: 100%;
        max-width: 100%;
      }
    }
    @media (min-width: 75rem) {
      .column-lg-1 {
        flex-basis: 8.3333333333%;
        max-width: 8.3333333333%;
      }
    
      .column-lg-2 {
        flex-basis: 16.6666666667%;
        max-width: 16.6666666667%;
      }
    
      .column-lg-3 {
        flex-basis: 25%;
        max-width: 25%;
      }
    
      .column-lg-4 {
        flex-basis: 33.3333333333%;
        max-width: 33.3333333333%;
      }
    
      .column-lg-5 {
        flex-basis: 41.6666666667%;
        max-width: 41.6666666667%;
      }
    
      .column-lg-6 {
        flex-basis: 50%;
        max-width: 50%;
      }
    
      .column-lg-7 {
        flex-basis: 58.3333333333%;
        max-width: 58.3333333333%;
      }
    
      .column-lg-8 {
        flex-basis: 66.6666666667%;
        max-width: 66.6666666667%;
      }
    
      .column-lg-9 {
        flex-basis: 75%;
        max-width: 75%;
      }
    
      .column-lg-10 {
        flex-basis: 83.3333333333%;
        max-width: 83.3333333333%;
      }
    
      .column-lg-11 {
        flex-basis: 91.6666666667%;
        max-width: 91.6666666667%;
      }
    
      .column-lg-12 {
        flex-basis: 100%;
        max-width: 100%;
      }
    }
    @supports (display: grid) {
      .grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-template-rows: auto;
      }
      .grid > [class*=column-] {
        margin: 0;
        max-width: 100%;
      }
    
      .column-xs-1 {
        grid-column-start: span 1;
        grid-column-end: span 1;
      }
    
      .column-xs-2 {
        grid-column-start: span 2;
        grid-column-end: span 2;
      }
    
      .column-xs-3 {
        grid-column-start: span 3;
        grid-column-end: span 3;
      }
    
      .column-xs-4 {
        grid-column-start: span 4;
        grid-column-end: span 4;
      }
    
      .column-xs-5 {
        grid-column-start: span 5;
        grid-column-end: span 5;
      }
    
      .column-xs-6 {
        grid-column-start: span 6;
        grid-column-end: span 6;
      }
    
      .column-xs-7 {
        grid-column-start: span 7;
        grid-column-end: span 7;
      }
    
      .column-xs-8 {
        grid-column-start: span 8;
        grid-column-end: span 8;
      }
    
      .column-xs-9 {
        grid-column-start: span 9;
        grid-column-end: span 9;
      }
    
      .column-xs-10 {
        grid-column-start: span 10;
        grid-column-end: span 10;
      }
    
      .column-xs-11 {
        grid-column-start: span 11;
        grid-column-end: span 11;
      }
    
      .column-xs-12 {
        grid-column-start: span 12;
        grid-column-end: span 12;
      }
    
      @media (min-width: 48rem) {
        .column-sm-1 {
          grid-column-start: span 1;
          grid-column-end: span 1;
        }
    
        .column-sm-2 {
          grid-column-start: span 2;
          grid-column-end: span 2;
        }
    
        .column-sm-3 {
          grid-column-start: span 3;
          grid-column-end: span 3;
        }
    
        .column-sm-4 {
          grid-column-start: span 4;
          grid-column-end: span 4;
        }
    
        .column-sm-5 {
          grid-column-start: span 5;
          grid-column-end: span 5;
        }
    
        .column-sm-6 {
          grid-column-start: span 6;
          grid-column-end: span 6;
        }
    
        .column-sm-7 {
          grid-column-start: span 7;
          grid-column-end: span 7;
        }
    
        .column-sm-8 {
          grid-column-start: span 8;
          grid-column-end: span 8;
        }
    
        .column-sm-9 {
          grid-column-start: span 9;
          grid-column-end: span 9;
        }
    
        .column-sm-10 {
          grid-column-start: span 10;
          grid-column-end: span 10;
        }
    
        .column-sm-11 {
          grid-column-start: span 11;
          grid-column-end: span 11;
        }
    
        .column-sm-12 {
          grid-column-start: span 12;
          grid-column-end: span 12;
        }
      }
      @media (min-width: 62rem) {
        .column-md-1 {
          grid-column-start: span 1;
          grid-column-end: span 1;
        }
    
        .column-md-2 {
          grid-column-start: span 2;
          grid-column-end: span 2;
        }
    
        .column-md-3 {
          grid-column-start: span 3;
          grid-column-end: span 3;
        }
    
        .column-md-4 {
          grid-column-start: span 4;
          grid-column-end: span 4;
        }
    
        .column-md-5 {
          grid-column-start: span 5;
          grid-column-end: span 5;
        }
    
        .column-md-6 {
          grid-column-start: span 6;
          grid-column-end: span 6;
        }
    
        .column-md-7 {
          grid-column-start: span 7;
          grid-column-end: span 7;
        }
    
        .column-md-8 {
          grid-column-start: span 8;
          grid-column-end: span 8;
        }
    
        .column-md-9 {
          grid-column-start: span 9;
          grid-column-end: span 9;
        }
    
        .column-md-10 {
          grid-column-start: span 10;
          grid-column-end: span 10;
        }
    
        .column-md-11 {
          grid-column-start: span 11;
          grid-column-end: span 11;
        }
    
        .column-md-12 {
          grid-column-start: span 12;
          grid-column-end: span 12;
        }
      }
      @media (min-width: 75rem) {
        .column-lg-1 {
          grid-column-start: span 1;
          grid-column-end: span 1;
        }
    
        .column-lg-2 {
          grid-column-start: span 2;
          grid-column-end: span 2;
        }
    
        .column-lg-3 {
          grid-column-start: span 3;
          grid-column-end: span 3;
        }
    
        .column-lg-4 {
          grid-column-start: span 4;
          grid-column-end: span 4;
        }
    
        .column-lg-5 {
          grid-column-start: span 5;
          grid-column-end: span 5;
        }
    
        .column-lg-6 {
          grid-column-start: span 6;
          grid-column-end: span 6;
        }
    
        .column-lg-7 {
          grid-column-start: span 7;
          grid-column-end: span 7;
        }
    
        .column-lg-8 {
          grid-column-start: span 8;
          grid-column-end: span 8;
        }
    
        .column-lg-9 {
          grid-column-start: span 9;
          grid-column-end: span 9;
        }
    
        .column-lg-10 {
          grid-column-start: span 10;
          grid-column-end: span 10;
        }
    
        .column-lg-11 {
          grid-column-start: span 11;
          grid-column-end: span 11;
        }
    
        .column-lg-12 {
          grid-column-start: span 12;
          grid-column-end: span 12;
        }
      }
    }
    * {
      box-sizing: border-box;
    }
    *::before, *::after {
      box-sizing: border-box;
    }
    
    body {
      font-family: "Pontano Sans", sans-serif;
      font-size: 1.125rem;
      line-height: 1.5;
      margin: 0;
      padding: 0;
      color: #888;
      background: #f2eee3;
      text-rendering: optimizeLegibility;
    }
    
    ul {
      padding: 0;
      margin: 0;
      list-style: none;
    }
    ul li {
      margin: 0 1.75rem 0 0;
    }
    
    a {
      color:black;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    a:hover {
      color: #333;
    }
    a.active {
      color: #333;
    }
    
    h1, h2, h3, h4 {
      color: #333;
      font-weight: normal;
      margin: 1.75rem 0 1rem 0;
    }
    
    h1 {
      font-size: 2.5rem;
    }
    
    h2 {
      font-size: 2.125rem;
      margin: 0;
    }
    
    h3 {
      font-size: 2rem;
    }
    
    h4 {
      font-size: 1.5rem;
      margin: 1rem 0 0.5rem 0;
    }
    
    section {
      display: block;
    }
    
    img {
      max-width: 100%;
      height: auto;
      -o-object-fit: cover;
         object-fit: cover;
    }
    
    nav {
      display: block;
    }
    nav li {
      font-size: 1.125rem;
      margin: 0;
    }
    
    .flex-nav ul {
      position: absolute;
      z-index: 1;
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;
      display: none;
      width: 100%;
      left: 0;
      padding: 1rem;
      background: #f2eee3;
      text-align: center;
    }
    .flex-nav ul.active {
      display: flex;
    }
    .flex-nav ul li {
      margin: 0.5rem 0;
    }
    
    .toggle-nav {
      display: flex;
      justify-content: flex-end;
      font-size: 1.125rem;
      line-height: 1.7;
      margin: 1rem 0;
    }
    .toggle-nav i {
      font-size: 1.5rem;
      line-height: 1.4;
      margin: 0 0 0 0.5rem;
    }
    
    #highlight {
      color: #333;
      font-size: 1.125rem;
      text-transform: uppercase;
    }
    
    .price {
      margin: 0;
    }
    
    .breadcrumb-list {
      display: flex;
      flex-wrap: wrap;
      padding: 0;
      margin: 1rem 0 0 0;
      list-style: none;
    }
    .breadcrumb-list li {
      font-size: 0.85rem;
      letter-spacing: 0.125rem;
      text-transform: uppercase;
    }
    
    .breadcrumb-item.active {
      color: #333;
    }
    .breadcrumb-item + .breadcrumb-item::before {
      content: "/";
      display: inline-block;
      padding: 0 0.5rem;
      color: #d5d5d5;
    }
    
    .description {
      border-top: 0.0625rem solid #e3dddd;
      margin: 2rem 0;
      padding: 1rem 0 0 0;
    }
    
    .add-to-cart {
      position: relative;
      display: inline-block;
      background: #3e3e3f;
      color: #fff;
      border: none;
      border-radius: 0;
      padding: 1.25rem 2.5rem;
      font-size: 1rem;
      text-transform: uppercase;
      cursor: pointer;
      transform: translateZ(0);
      transition: color 0.3s ease;
      letter-spacing: 0.0625rem;
    }
    .add-to-cart:hover::before {
      transform: scaleX(1);
    }
    .add-to-cart::before {
      position: absolute;
      content: "";
      z-index: -1;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: #565657;
      transform: scaleX(0);
      transform-origin: 0 50%;
      transition: transform 0.3s ease-out;
    }
    
    .container {
      margin: auto;
      padding: 0 1rem;
      max-width: 75rem;
      width: 100%;
    }
    
    .grid > [class*=column-] {
      padding: 1rem;
    }
    .grid.menu, .grid.product {
      border-bottom: 0.0625rem solid #e3dddd;
    }
    .grid.menu > [class*=column-] {
      padding: 0.5rem 1rem 0.5rem 1rem;
    }
    .grid.product {
      padding: 0 0 1.5rem 0;
    }
    .grid.second-nav > [class*=column-] {
      padding: 0.5rem 1rem;
    
    }
    
    footer {
      padding: 1rem 0;
      text-align: center;
    }
    
    .product-image {
      display: none;
    }
    
    .image-list li {
      margin: 0;
    }
    
    @media (min-width: 62rem) {
      .product-image img, .image-list img {
        width: 100%;
      }
    
      .product-image {
        display: block;
      }
      .product-image img {
        height: 52vh;
      }
      .product-image img.active {
        display: block;
        margin: 0 0 0.75rem 0;
      }
    
      .image-list {
        display: flex;
        overflow: hidden;
      }
      .image-list li {
        margin: 0 0.75rem 0 0;
        flex-basis: 100%;
      }
      .image-list li:nth-child(3) {
        margin: 0;
      }
      .image-list img {
        height: 10rem;
        width: 100%;
        transition: opacity 0.3s ease;
        cursor: pointer;
      }
      .image-list img:hover {
        opacity: 0.7;
      }
    
      nav ul {
        justify-content: flex-end;
      }
    
      .toggle-nav {
        display: none;
        background-color: #f2eee3;
      }
    
      .flex-nav {
        display: block;
      }
      .flex-nav ul {
        display: flex;
        flex-direction: row;
        position: relative;
        justify-content: flex-end;
      }
      .flex-nav ul li {
        font-size: 1.125rem;
        margin: 0 1.5rem 0 0;
      }
      .flex-nav ul li:nth-child(4) {
        margin: 0;
      }
    }
    @-webkit-keyframes fadeImg {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    @keyframes fadeImg {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    </style> 
    </body>
    
    </html>
