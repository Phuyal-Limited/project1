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
                      <input type="submit" name="search" value="Search" class="search-btn" />
                      <a href="advance_search">Advanced</a>
                  </form>
                </div>

                <div class="row-fluid showcases">
                  
                  <ul class="nav nav-tabs showcase-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Newest</a></li>
                    <li><a href="#profile" data-toggle="tab">Featured</a></li>
                    <li><a href="#messages" data-toggle="tab">Best-selling</a></li>
                    <li><a href="#settings" data-toggle="tab">Trending</a></li>
                  </ul>
                   
                  <div class="tab-content showcase">
                    <div class="tab-pane active" id="home">
                        <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                    <?php
                      $size = sizeof($newest[0]);
                      if($size>6){
                        $size=6;
                      }
                      for($i=0;$i<$size;$i++){

                    ?>
                      <div class="span2">
                          <div class="thumbnail">
                            <a href="books/<?php echo $newest[0][$i]['book_id'];?>"><img style="height:145px;" src="<?php echo $newest[1][$i]['path'];?>" alt="<?php echo $newest[1][$i]['alt'];?>"></a>
                            
                          </div> <!-- end-thumbnail -->
                      </div> <!-- end span -->

                    <?php
                      }
                    ?>

                    
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

                <?php
                  $sz = sizeof($home_data[0]);
                  if($sz==0){
          
                  }else{
                    $sz = $sz-1;
                  }
                  $row = $sz/6;
                  $counter = 0;
                  $i = 0;
                  for($x=0;$x<=$row;$x++){
            
                  ?>
                <div class="row-fluid ">
                    <div class="thumbnails index-thumb">
                        
                    <?php 
                    $size = sizeof($home_data[0]);
                
                    if($home_data[0] == array()){
                      echo 'No Books Available.';
                    }else{
                      while($i<$size){
                
                      $counter++;
                      $img = $home_data[1][$i]['path'];
                      //echo $img;exit();
                      $alt = $home_data[1][$i]['alt'];
                  ?> 
                    <div class="span2">
                          <div class="thumbnail">
                            <img src="<?php echo $img;?>" alt="<?php echo $alt;?>">
                            <div class="caption" style="height:140px;">
                              <h5><?php echo $home_data[0][$i]['book_name'];?></h5>
                              <p><?php echo $home_data[0][$i]['edition'];?> Edition</p>
                              <p>By:<a href=""><?php echo $home_data[0][$i]['author'];?></a> <br /></p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="books/<?php echo $home_data[0][$i]['book_id']?>" >Read more</a>
                          </p>
                        </div>
                      </div> <!-- end-thumbnail -->
                    </div> <!-- end span -->
                    <?php
                      $i++; 
                      if($counter==6){
                        $counter=0;
                        break;
                      }
                  }
                }
          ?>
                  </div> <!-- end thumbnails -->
                </div> <!-- end-row-fluid -->
               <?php 
                      }
                  ?>
                
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
    
    
