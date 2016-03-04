<?php 
include 'header.php' ;
?>


<style>

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 504px;
}


</style>


<body onload="nf()" >



		<?php 
include 'navbar.php' ;
?>



<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://lh3.googleusercontent.com/-XUYqkGjxFx4/VH7RbY-CwaI/AAAAAAAAEno/dtlXnpkKxv8/s640-no/10843672_808353339206676_1138168143_o.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Taras Palasyuk
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-heart"></i> Follow</button>
					<button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-comment"></i> Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active" onclick="nf()">
							<button class="btn btn-danger btn-block">
							<i class="fa fa-newspaper-o"></i>
							News Feed </button>
						</li><br>
                        <li onclick="abt()">
                            <button class="btn btn-danger btn-block">
                            <i class="fa fa-user"></i>
                            About </button>
                            </a>
                        </li><br>
						
						<br><br>
						
						
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content" id="newsfeed">
			   nws
            </div>
            <div class="profile-content" id="about">
			  abt
            </div>
            <div class="profile-content" id="edit">
			   ed
            </div> 
		</div>
		
		
		


	</div>
</div>
<br>
<br>

</body>


<script>
		function abt()
		{

			
			document.getElementById("edit").style.display="none";
			document.getElementById("about").style.display="block";
			document.getElementById("newsfeed").style.display="none";


		}
		function nf()
{
			document.getElementById("edit").style.display="none";
			document.getElementById("about").style.display="none";
			document.getElementById("newsfeed").style.display="block";
		}
		function edt()
		{
			document.getElementById("edit").style.display="block";
			document.getElementById("about").style.display="none";
			document.getElementById("newsfeed").style.display="none";
		}

		</script>



</html>