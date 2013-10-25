<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Nepal Reads</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title" id="dashboard-title"><a href="">Dashboard</a></h1>
			<h2 class="section_title"id="logo-back"><a href="index.php">Nepal <span>Reads</a></span></h2><div class="btn_view_site"><a href="index.php">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bibek KC (<a href="#">3 Messages</a>)</p>
			<a class="logout_user" href="#" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Nepal Reads</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text"  placeholder="Quick Search">
		</form>
		<hr/>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_edit_article"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_categories"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_tags"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_view_users"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_profile"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_photo"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_audio"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_video"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="index.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Nepal Reads</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<div class="clear"></div>
		<article class="module width_full">
			<header><h3>Publish a Book</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Book Title</label>
							<input type="text">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>ISBN Number</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Authur</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Publisher</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Year Of Publication</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>language</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Marked Price</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Discounts</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Category</label>
							<select style="width:92%;">
								<option>Computers</option>
								<option>Business</option>
								<option>History</option>
								<option>Religion</option>
								<option>History</option>
								<option>Health & fitness</option>
								<option>Science</option>
								<option>Fiction</option>
								<option>Non-fiction</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
						<fieldset>
							<label>Description</label>
							<textarea rows="12"></textarea>
						</fieldset>
				</div>
			<footer>
				<div class="submit_link">
					<select>
						<option>Draft</option>
						<option>Published</option>
					</select>
					<input type="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
		</article><!-- end of post new book entry -->
		
		<div class="spacer"></div>
	</section>


</body>

</html>