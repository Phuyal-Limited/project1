<!-- Start: FOOTER -->
    <footer>
      <!-- <div class="container">
        <div class="row">
          <div class="span2">
            <h4><i class="icon-star icon-white"></i> Products</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="product.html">lorem ipsum</a></li>
                <li><a href="product.html">lorem ipsum</a></li>
                <li><a href="product.html">lorem ipsum</a></li>
                <li><a href="all_products.html">lorem ipsum</a></li>
              </ul>
            </nav>
          </div>
          <div class="span2">
            <h4><i class="icon-beaker icon-white"></i> About</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="our_works.html">lorem ipsum</a></li>
                <li><a href="patnerships.html">lorem ipsum</a></li>
                <li><a href="leadership.html">lorem ipsum</a></li>
                <li><a href="news.html">lorem ipsum</a></li>
                <li><a href="events.html">lorem ipsum</a></li>
                <li><a href="blog.html">lorem ipsum</a></li>
              <ul>
            </nav>          
          </div>
          <div class="span2">
            <h4><i class="icon-thumbs-up icon-white"></i> Support</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="faq.html">lorem ipsum</a></li>
                <li><a href="contact_us.html">lorem ipsum</a></li>            
              </ul>
            </nav>
            <h4><i class="icon-legal icon-white"></i>lorem ipsum</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="#">lorem ipsum</a></li>
                <li><a href="#">lorem ipsum</a></li>
                <li><a href="#">lorem ipsum</a></li>
                <li><a href="#">lorem ipsum</a></li>      
              </ul>
            </nav>            
          </div>
          <div class="span3">
            <h4><i class="icon-cogs icon-white"></i> Services</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="service.html">lorem ipsum</a></li>
                <li><a href="service.html">lorem ipsum</a></li>
                <li><a href="service.html">lorem ipsum</a></li>
                <li><a href="all_services.html">lorem ipsum</a></li>              
              </ul>
            </nav>
          </div>      
          <div class="span3">
            <h4>Susdribe</h4>
            <form>
              <input type="text" name="email" placeholder="Email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div> -->
      <!-- <hr class="footer-divider"> -->
      <div class="container">
        <div class="footer-copyright">
            <p>
              &copy; 2013, <a href="">Nepal Reads</a> All Rights Reserved.
            </p>
        </div>
      </div>
    </footer>
    <!-- End: FOOTER -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/hideshow.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js');?>"></script>
    <script type="text/javascript">
      $('#myTab a').click(function (e) {
                    
            e.preventDefault();
            $(this).tab('show');
          });

                 

          $(".click-for-info").click(function() {
         
            $( ".show-info" ).show( "slow" );
          });
          $( ".close-button" ).click(function() {
            $( ".show-info" ).hide( 1000 );
          });
    </script>
  </body>
</html>