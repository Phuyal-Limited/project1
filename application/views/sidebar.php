<div class="sidebar section1 span3" >
              <!-- Start: SIDEBAR/CATEGORIES -->
              <div class="page-header">
                  <h2>Categories</h2>
                </div>
                <ul>
                <?php 
					for($x=0;$x<sizeof($category);$x++){
						$y = $x+1;
				?>
           		<li><a href="http://nepalreads.com/category/<?php echo $category[$x]->category_id;?>"><?php echo $category[$x]->name;?></a></li>
            	<?php
					}
				?>
                  
                </ul>
            </div>

            <!-- END: SIDEBAR -->