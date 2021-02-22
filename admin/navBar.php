				<?php 

				function getCurrentDirectory() {
					$path = dirname($_SERVER['PHP_SELF']);
					$position = strrpos($path,'/') + 1;
					return substr($path,$position);
				}
				?>
				<nav class="navbar navbar-default navbar-static-top"> 
				<div class="container-fluid"> 
					<div class="navbar-header" style="background-color:#bbb2b2;"> 
						<img class="navbar-brand" src="../../assets/images/logo/logo-white.png">
					</div> 
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8"> 
							<ul class="nav navbar-nav"> 
								<li <?php echo getCurrentDirectory() == 'home' ? "class='active'" : ""; ?> >
									<a href="../home">Home</a>
								</li> 
								<li <?php echo getCurrentDirectory() == 'artists' ? "class='active'" : ""; ?>>
									<a href="../artists">Artists</a>
								</li> 
								<li <?php echo getCurrentDirectory() == 'albums' ? "class='active'" : ""; ?>>
									<a href="../albums">Albums</a>
								</li> 
								<li <?php echo getCurrentDirectory() == 'genres' ? "class='active'" : ""; ?>>
									<a href="../genres">Genres</a>
								</li> 
								<li <?php echo getCurrentDirectory() == 'songs' ? "class='active'" : ""; ?>>
									<a href="../songs">Songs</a>
								</li>
								<li <?php echo getCurrentDirectory() == 'users' ? "class='active'" : ""; ?>>
									<a href="../users">Users</a>
								</li>
								<li>
									<a href="../../">Return to SyncPhonic</a>
								</li>  
								<li>
									<a href="../../includes/handlers/ajax/logout.php">Logout</a>
								</li>   
							</ul> 
						</div>
				</div> 
				</nav>