    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
   <script>
  		function check(){
			var author = $("#author").attr('disabled');
			
			if(author=='disabled'){
				$("#author").attr('disabled', false);
			}else{
				$("#author").attr('disabled', true);
			}
			
		}
		
		function store(){
			var store = $("#store_name").attr('disabled');
			
			if(store=='disabled'){
				$("#store_name").attr('disabled', false);
			}else{
				$("#store_name").attr('disabled', true);
			}
		}
		
		function get_value(){
			var srch_txt = $("#search_txt").val();
			var category = $("#category").val();
			
			$("#srch").val(srch_txt);
			$("#cat").val(category);
		}
   </script> 
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

                  <form action="search" method="post"><!-- first form starts -->
                    <legend>Find Books</legend>
                    <label>Enter Keywords</label>
                    <input type="text" name="search_text" id="search_txt" class="input-xxlarge" placeholder="Enter Keywords…">
                    <select name="category" id="category">
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
                    <input type="submit" name="search" value="Search" class="btn btn-small search-btn" />
                  </form> <!-- first form ends -->

                  <form action="search" method="post" onSubmit="get_value();"><!-- Second form starts -->
                    <legend>Other Search Options</legend>
                    
                    
                    <!--<label class="checkbox">
                      <input type="checkbox"> Check me out
                    </label>-->
                    <!--<label class="checkbox">
                      <input type="checkbox"> Price starting from 
                    </label>-->
                    $<input type="text" class="input-small"> to $<input type="text" class="input-small">
                    <!--<label class="checkbox">
                      <input type="checkbox"> Only Items from 
                    </label>
                    <select >
                      <option>Pokhara</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>--><br />
                    <label class="checkbox">
                      <input type="checkbox" id="check_author" onClick="check();" > Only from Authur
                    </label>
                    <select name="author" id="author" disabled="disabled">
                       <option value="All Author">All Author</option>
                			<?php 
                  				for($i=0;$i<sizeof($details[0]);$i++){
                			?>
                                <option value="<?php echo $details[0][$i];?>"><?php echo $details[0][$i];?></option>
                             <?php   
                  				}
                			?>
                    </select> <br />
                    <label class="checkbox">
                      <input type="checkbox" id="check_store" onClick="store();"> Only from Store
                    </label>
                    <select name="store_name" id="store_name" disabled="disabled">
                      <option value="All Store">All Store</option>
                			<?php 
                  				for($i=0;$i<sizeof($details[1]);$i++){
                			?>
                                <option value="<?php echo $details[1][$i];?>"><?php echo $details[1][$i];?></option>
                             <?php   
                  				}
                			?>
                    </select> <br />
                    <input type="hidden" name="search_text" id="srch" />
                    <input type="hidden" name="category" id="cat" />
                    <input type="submit" name="search" value="Search" class="btn btn-small search-btn" /> <a href=""> Reset</a>
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
