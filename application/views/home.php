    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <!-- Start: container -->
        <div class="container">
          <div class="row-fluid">
            <?php 
              include("sidebar.php");
            ?>
            <!-- start:section2 -->
            <div class="section2 sidebar span9">
                
                <div class="row-fluid">
                  <form action="search" method="post">
                      <input class="span7" type="text" name="search_text" placeholder="Search...">
                      <select name="category" id="category" class="span3">
                        
                			<option value="All Category">All Category</option>
                			<?php 
                  				for($i=0;$i<sizeof($category);$i++){
                			?>
                                <option value="<?php echo $category[$i]->category_id;?>"><?php echo $category[$i]->name;?></option>
                             <?php   
                  				}
                			?>
                      </select>
                      <input type="submit" name="search" value="Search" class="btn btn-small search-btn" />
                      <a href="advance_search">Advanced</a>
                  </form>
                </div>

                <div class="row-floid">
                  
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Newest</a></li>
                    <li><a href="#profile" data-toggle="tab">Featured</a></li>
                    <li><a href="#messages" data-toggle="tab">Best-selling</a></li>
                    <li><a href="#settings" data-toggle="tab">Trending</a></li>
                  </ul>
                   
                  <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                        
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                           
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->



                    
                </div> <!-- end thumbnails -->


                </div> <!-- end-row-fluid -->
                    </div>
                    <div class="tab-pane" id="profile">Second Tab</div>
                    <div class="tab-pane" id="messages">Third Tab</div>
                    <div class="tab-pane" id="settings">Forth tab</div>
                  </div>
 


                </div>
                <div class="row-fluid sortby">
                  Sort By:
                  <select style="width:150px;">
                              <option>Newest</option>
                              <option>Featured</option>
                              <option>Best Selling</option>
                              <option>Trending</option>
                          </select>
                    <hr  />
                </div>
                <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                        
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->



                    
                </div> <!-- end thumbnails -->


                </div> <!-- end-row-fluid -->
                <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                        
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->



                    
                </div> <!-- end thumbnails -->


                </div> <!-- end-row-fluid -->
                <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                        
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <div class="span2">
                          <div class="thumbnail">
                            <a href="product.php"><img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker"></a>
                            <div class="caption">
                              <h5><a href="product.php">Kara Walker</a></h5>
                              <p>Fourth Edition</p>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="#" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->



                    
                </div> <!-- end thumbnails -->


                </div> <!-- end-row-fluid -->
 



            </div>
            <!-- end:section2 -->
          </div>
        </div>
      <!-- End: container -->
    </div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
