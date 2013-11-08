    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    
    <div class="content"><!-- Start: MAIN CONTENT -->
        <div class="container"><!-- Start: container -->
            <div class="page-header">
            <h2>Advanced Search</h2>
          </div>
          <div class="row-fluid"> <!-- start:row-fluid -->
            <!-- <div class="sidebar section1 span3 kale">
                dfskgjklj
            </div>  -->
            <div class="section2 sidebar  advanced-box"> <!-- start:section2 -->

                  <form action="result"><!-- first form starts -->
                    <legend>Find Books</legend>
                    <label>Enter Keywords</label>
                    <input type="text" class="input-xxlarge" placeholder="Enter Keywords…">
                    <select >
                      <option value="All Category">All Category</option>
                			<?php 
                  				for($i=0;$i<sizeof($category);$i++){
                			?>
                                <option value="<?php echo $category[$i]->category_id;?>"><?php echo $category[$i]->name;?></option>
                             <?php   
                  				}
                			?>
                    </select>
                    <!--<label class="checkbox">
                      <input type="checkbox"> Check me out
                    </label>-->
                    <input type="submit" value="Search" class="btn">
                  </form> <!-- first form ends -->

                  <form action="result"><!-- Second form starts -->
                    <legend>Other Search Options</legend>
                    
                    
                    <!--<label class="checkbox">
                      <input type="checkbox"> Check me out
                    </label>-->
                    <label class="checkbox">
                      <input type="checkbox"> Price starting from 
                    </label>
                    $<input type="text" class="input-small"> to $<input type="text" class="input-small">
                    <label class="checkbox">
                      <input type="checkbox"> Only Items from 
                    </label>
                    <select >
                      <option>Pokhara</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select> <br />
                    <label class="checkbox">
                      <input type="checkbox"> Only from Authur
                    </label>
                    <select >
                       <option value="All Author">All Author</option>
                			<?php 
                  				for($i=0;$i<sizeof($details[0]);$i++){
                			?>
                                <option value="<?php echo $details[0][$i]['author'];?>"><?php echo $details[0][$i]['author'];?></option>
                             <?php   
                  				}
                			?>
                    </select> <br />
                    <label class="checkbox">
                      <input type="checkbox"> Only from Store
                    </label>
                    <select >
                      <option value="All Store">All Store</option>
                			<?php 
                  				for($i=0;$i<sizeof($details[1]);$i++){
                			?>
                                <option value="<?php echo $details[1][$i]['name'];?>"><?php echo $details[1][$i]['name'];?></option>
                             <?php   
                  				}
                			?>
                    </select> <br />
                    <button type="submit" class="btn">Search</button> <a href=""> Reset</a>
                  </form> <!-- Second form ends -->

            </div>
          </div> <!-- end:row-fluid -->
          
        </div> <!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    


    
          
                    <hr class="footer-divider" />
