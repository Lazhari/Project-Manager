<!-- Muon jQuery Sticky Dropdown Menu 1.0 -->
	<header class="muon">
	
		<div class="navigation-wrapper">
		
			<!-- Logo -->
			<a href="<?php echo base_url(); ?>" class="muon-logo" title="Back to homepage">Your logo</a>
			
			<!-- Root navigation block -->
			<nav>
			
				<!-- Root menu level -->
				<ul>
					
					<!-- Root menu items -->
					<li><a href="<?php echo base_url(); ?>" class="muon-no-submenu">Home</a></li>
					<li><a href="#">outil rapide</a>
					
						<!-- Submenu block divided to five blocks -->
						<nav class="muon-five-columns">
						
							<!-- Submenu -->
							<ul>
								<li><h1>Liquid Layout</h1></li>
								<li><a href="index-2.html">Index Page 1</a></li>
							</ul>
							<ul>
								<li><h1>Fixed Layout</h1></li>
								<li><a href="index_fixed.html">Index Page 1</a></li>
							</ul>
							<ul>
								<li><h1>Other Pages</h1></li>
								<li><a href="login.html">Login Page</a></li>
							</ul>
							<!-- Submenu -->
							
							<!-- Submenu -->
							<ul class="muon-wo-subheader muon-circles">
	
								<!-- Submenu items -->
								<li><a href="#">Webdesigntuts+</a></li>
							</ul>
	
							<!-- Submenu -->
							<ul class="muon-wo-subheader muon-circles">
	
								<!-- Submenu items -->
								<li><a href="#">VandelayDesign</a></li>
							</ul>
							
						</nav>
						<!-- End of submenu block -->
						
					</li>
					
					<!-- Root menu item -->
					<li><a href="#">Notification</a><span class="small-notification">14</span>
	
						<!-- Submenu block divided to five blocks -->
						<nav class="muon-five-columns">
						
							<!-- Submenu -->
							<ul>
							
								<!-- Submenu header -->
								<li><h1>Messages</h1></li>
								
								<!-- Submenu items -->
								<li><a href="#">Envato</a></li>
							</ul>
							
							<!-- Submenu -->
							<ul class="muon-w-subheader muon-box-list">
	
								<!-- Submenu header -->
								<li><h1>Liste des projets</h1></li>
	
								<!-- Submenu items -->
								<li><a href="#">Appstorm</a></li>
							</ul>
							
							<!-- Submenu -->
							<ul class="muon-wo-subheader muon-box-list">
	
								<!-- Submenu items -->
								<li><a href="#">FreelanceSwitch</a></li>
							</ul>
	
							<!-- Submenu -->
							<ul class="muon-wo-subheader muon-box-list">
	
								<!-- Submenu items -->
								<li><a href="#">Psdtuts+</a></li>
								<li><a href="#" class="muon-outside">Aetuts+</a></li>
							</ul>
							
							<!-- Submenu -->
							<section>
								<h1>Header H1</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam.</p>
							</section>
							
						</nav>
						<!-- End of submenu block -->
						
					</li>
	
					<!-- Root menu item -->
					<li><a href="#">Profil</a>
	
						<!-- Submenu block divided to two blocks -->
						<nav class="muon-two-columns">
	
							<!-- Submenu -->
							<ul class="muon-thumbnail-list muon-no-wrap">
								<li><h1>Image content</h1></li>
								<li>
									<img alt="Sample Image" src="img/_sample-data/sample_image_1.png">
									<h2>Some image examples</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. <a class="muon-thumbnail-list-more">Read more &raquo;</a></p>
								</li>
								<li>
									<img alt="Sample Image" src="img/_sample-data/sample_image_2.png">
									<h2>One more example</h2>
									<p>Sed pharetra placerat est suscipit sagittis. Phasellus aliquam malesuada blandit. <a class="muon-thumbnail-list-more">Read more &raquo;</a></p>
								</li>
							</ul>
							
							<!-- Submenu -->
							<section>
								<h1>Header H1</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam.</p>
							</section>
							
						</nav>
						<!-- End of submenu block -->
						
					</li>
	
					<!-- Root menu item -->
					<li><a href="#">Users</a>
					
						<!-- Submenu block divided to three blocks -->
						<nav class="muon-three-columns">
						
							<!-- Submenu form element -->
							<form>
								<fieldset>
									<legend>Lorem ipsum dolor</legend>
									<p><label>Login</label><input type="text" value="" name=""></p>
									<p><label>Password</label><input type="password" value="" name=""></p>
									<button type="submit" class="gray">Submit</button>
								</fieldset>
							</form>
	
							<!-- Submenu -->
							<section>
								<h1>Header H1</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam.</p>
								<h2>Header H2</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse et dignissim metus. Maecenas id augue ac metus tempus aliquam.</p>
							</section>
	
							<!-- Submenu -->
							<section>
								<h1>Header H1</h1>
								<p>Nunc lacus leo, varius id adipiscing vitae, imperdiet et odio. Etiam rhoncus nibh augue. Aenean convallis aliquam fermentum. Donec sit amet ipsum at augue eleifend mattis a in mi. Praesent dictum metus sed erat condimentum vel tristique risus vehicula. Sed placerat est non dolor molestie ut consequat massa pellentesque.</p>
								
							</section>
							
						</nav>
						<!-- End of submenu block -->
						
					</li>
	
				<!-- End of root menu level -->
				</ul>
				
			<!-- End of root navigation block -->
			</nav>
			
			<!-- User list -->
			<ul class="muon-user-list">
				<li class="muon-user-data">Bienvenue, <a href="<?php echo site_url('profil') ?>"><?php if (isset($username)): ?>
					<?php echo $username ?>
				<?php endif ?></a></li>
				<li><a class="muon-signup" title="Messages" href="#">Messages</a></li>
				<li><a class="muon-settings" title="Settings" href="#">Settings</a></li>
				<li><a class="muon-logout" title="Logout" href="<?php echo site_url('connexion/logout') ?>">Se deconnecter</a></li>
			</ul>
			
		</div>
	
	</header>
	<!-- End of Muon Header -->	