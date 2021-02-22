<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('index.php');" class="logo">
			<img src="assets/images/logo/logo-big-white.png">
		</span>


		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("search.php");' class="navItemLink">Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
			
				<span role="link" tabindex="0" onclick="openPage('browse.php');" class="navItemLink">💽 Browse</span>
			</div>
			
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('trending.php');" class="navItemLink">📈 Trending</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php');" class="navItemLink">🎼 Your Music</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('getPremium.php');" class="navItemLink">🌠 Premium</span>
			</div>
          
          	<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('settings.php');" class="navItemLink"><?php echo "🎛️ Settings" //$userLoggedIn->getFirstAndLastName(); ?></span>
			</div>
          
          <?php if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') { ?>
          	<div class="navItem">
				<span role="link" tabindex="0" onclick="window.open('admin/home')" class="navItemLink">⚙️ Admin Panel</span>
			</div>
		<?php } ?>
		</div>




	</nav>
</div>