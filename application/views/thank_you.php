    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    
    <div class="content">
        <div class="container">
      <div class="row-fluid"> <!-- buyer:details starts -->
          <div class="thank-you ">
              <div class="thank-you-content">
                  <div class="thank-you-head kale">
                  Thank you for your payment.
                  </div>
                  <div class="thank-you-details">
                    <p><span>Congratulation! Your payment was sent.</span> You have sucessfully paid for this transaction.</p>
                    <p>Order details have been sent to you@gmail.com. Your <span>confirmation</span> code is <?php echo $message;?>.</p>
                  </div>                   
              </div>
          </div>
        </div> <!-- buyer:details ends -->
        <div class="row-fluid  cart-buttons">
          <div><p><a href="">Button</a></div>
        </div>
    </div>
    </div>

    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
