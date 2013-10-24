<?php 
  include 'header.php';
?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
        <div class="row">
          <div class="col-md-8">
            <h3>Virtual Book Store Nepal</h3>
          </div>
          <div class="col-md-4">
            <form class="navbar-form" action="" method="POST">
              <div class="form-group">
              <input type="text" class="form-control search-query" placeholder="Search" autofocus required>
              </div>
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <h4>Categories</h4><hr />
            <?php 
				for($x=0;$x<sizeof($category);$x++){
					$y = $x+1;
			?>
            <h4><a href="#"><?php echo $category[$x]->name;?></a><br /></h4>
            <?php
				}
			?>
            
          </div>
          <div class="col-md-9">
            <div class="tabbable">
              <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Latest</a></li>
                <li><a href="#tabs1-pane2" data-toggle="tab">Featured</a></li>
                <li><a href="#tabs1-pane3" data-toggle="tab">Best Seller</a></li>
                <li><a href="#tabs1-pane4" data-toggle="tab">Trending</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs1-pane1">
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tabs1-pane2">
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tabs1-pane3">
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tabs1-pane4">
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <a href="#" class="thumbnail">
                        <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
              <div class="col-md-5">
                <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>" width="100%" height="200">
              </div>
              <div class="col-md-7">
                <div class="col-md-7">
                  <h4>Popular Books</h4>
                  <hr />
                  <ul>
                    <li>Lorem Ipsom</li>
                    <li>Lorem Ipsom</li>
                    <li>Lorem Ipsom</li>
                    <li>Lorem Ipsom</li>
                  </ul>
                </div>
                <div class="col-md-5">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>" width="100%" height="170">
                </div>
              </div>
            </div>
            <div class="row">
              <br />
              <h3>
                "Lorem Ipum Dolor Sit amet, consectetur adipiscing elit. Sed at ante."
              </h3>
              <br />
            </div>
            <div class="row">
              Sort By: 
              <select>
                <option value="Newest">Newest</option>
                <option value="Trending">Trending</option>
                <option value="Best Selling">Best Selling</option>
                <option value="Trending">Trending</option>
              </select> 
              <hr />
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
            </div>
            <div class="row">&nbsp;</div>
                        <div class="row">
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
              <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img alt="Generic placeholder thumbnail" src="<?php echo base_url('assets/img/Book.png');?>">
                </a>
                <p>Book Title</p>
                <p>Auther Name</p>
                <p>Rs. 500/-</p>
              </div>
            </div>
          </div>
        </div>
    </div> <!-- /container -->
    <?php
      include 'footer.php';
    ?>