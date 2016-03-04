<!-- PRELOADER -->
<img id="preloader" src="images/preloader.gif" alt="" />
<!-- //PRELOADER -->
<!-- <div class="preloader_hide"> -->



  <?php 
  include 'cities.php';
include 'connect.php';

  ?>

<style>


.btn-danger:hover {
    color: #FFF;
    background-color: rgb(212, 44, 44);
    border-color: #FFF;
}

.btn-danger{
	color:rgb(212, 44, 44); 
	background-color:transparent; 
	border-color:#D43F3A;

}


.live:hover{
	background-color: black;
	color: white;
}


</style>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
function change(strr)
{
	console.log(strr.id);
	document.getElementById("citi").value=strr.id;
}
$(document).ready(function(){
    $(document).click(function(e){
        if ($(e.target).is('#livesearch,#livecity')) {
            return;
        }
        else
        {
            document.getElementById("livesearch").style.display="none";
            document.getElementById("livecity").style.display="none";
        }
    });
});
</script>
	<!-- PAGE -->
	<div id="page">
	
		<!-- HEADER -->
		<header>
			
			<!-- MENU BLOCK -->
			<div class="menu_block">
			
				<!-- CONTAINER -->
				<div class="container clearfix">
					
					<!-- LOGO -->
					<div class="pull-left"><br>
						<a href="profile.php" ><img src="images/k.png" alt="Karmyo logo" height="115" width="130"/></a>


					</div><!-- //LOGO -->
					






					<!-- SEARCH FORM -->
					
					<script>
					function showresult(str){
                     if(str.length<3)
                     {
                     	document.getElementById("livesearch").style.display="none";
                     	document.getElementById("livesearch").style.border="0px";
                     	
                        return;
                     }


                     if (window.XMLHttpRequest)
                      {
    
              			xmlhttp=new XMLHttpRequest();
 				 	   }          
 					 else 
 					 {  // code for IE6, IE5
    					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  					 }
  					xmlhttp.onreadystatechange=function() {
    			if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    			{
    				
    				if(!xmlhttp.responseText){
    					document.getElementById("livesearch").style.display="block";
    			  document.getElementById("livesearch").innerHTML="No Suggestion Found";
     		 document.getElementById("livesearch").style.border="1px solid #A5ACB2";
     		 
    				}
    				else{
    				console.log(xmlhttp.responseText);
    				document.getElementById("livesearch").style.display="block";
    			  document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
     		 document.getElementById("livesearch").style.border="1px solid #A5ACB2";
     		 
    				} }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
					
					</script>
					



					<div id="search-form" class="pull-right">
						<form method="GET" action="search.php">
						
							<input id="main-search" autocomplete="off" onkeyup="showresult(this.value)" name="search" placeholder="Search events" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" type="search" value="Search" onFocus="if (this.value == 'Search') this.value = '';" onBlur="if (this.value == '') this.value = 'Search';" />
						    <div id="livesearch" style="border: 1px solid white;background: white;color: black;">
						    	
						    </div>
					</form></div><!-- SEARCH FORM -->

		

					
					
	<style>
	
		
		a:hover, a:link, a:visited, a:active
		{
	  		text-decoration: none;
	  		color: black;
		}
	#cit,#nav
	{
		clear:both;
	}
	#nav
	{
		
		text-align: left;
		 position: absolute;
    top: 100%;
    right: 0px;
    width: auto;
	}
	</style>
					
					
					<!-- MENU -->
					<div class="pull-right">
					<div class="row">
					<div class="col-md-1"  style="padding: 32px 0px 32px 32px;"><i class="fa fa-map-marker"></i></div>
					<div class="col-md-3" style="padding: 32px 1px 32px 0px;">
					
					
						           <input style="padding: 2px; font-weight:800; border:1px; font-size: 14px;" placeholder="Enter Your City" type="text" name="citi" id="citi" onkeyup="showcity(this.value)"/>
						           <div id="livecity" style="border: 1px solid white;background: white;color: black;"></div>
					</div>

						  <div class="col-md-8" style="padding: 0px 1px 32px 0px;">         
						<nav class="navmenu">
							<ul>


								 
								<!--   <li class="scroll_btn"><a href="#about" >About Us</a></li>  -->
						        <?php if(!(isset($_SESSION['id']))){?>

								
								

								<li class="scroll_btn"><a href="login1.php" >Login</a></li>
								<!-- <li class="scroll_btn"><a href="signup.php" >Sign Up</a></li> -->
								<li class="scroll_btn"><a href="#" >Stories</a></li>
								

								<?php }
								
								?>
								
								
								
								<!--<li class="scroll_btn"><a href="index.php" >Stories</a></li>-->
								<li class="scroll_btn"><a href="event.php"><span class="btn btn-danger" >Initiate Good Act</span></a></li>
								
						          <script>
						          function showcity(str)
						          {
						          	 if(str.length<3)
                     {
                     	document.getElementById("livecity").style.display="none";
                     	document.getElementById("livecity").style.border="0px";
                        return;
                     }


                     if (window.XMLHttpRequest)
                      {
    
              			xmlhttp=new XMLHttpRequest();
 				 	   }          
 					 else 
 					 {  // code for IE6, IE5
    					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  					 }
  					xmlhttp.onreadystatechange=function() {
    			if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    			{
    				
    				if(!xmlhttp.responseText){
    					document.getElementById("livecity").style.display="block";
    			  document.getElementById("livecity").innerHTML="No Suggestion Found";
     		 document.getElementById("livecity").style.border="1px solid #A5ACB2";
    				}
    				else{
    				console.log(xmlhttp.responseText);
    				document.getElementById("livecity").style.display="block";
    			  document.getElementById("livecity").innerHTML=xmlhttp.responseText;
     		 document.getElementById("livecity").style.border="1px solid #A5ACB2";
    				} }
  }
  xmlhttp.open("GET","livecity.php?q="+str,true);
  xmlhttp.send();
}


						          </script>
								
								
								
								<?php
								
								if(isset($_SESSION['id'])) { ?>
								<!-- <li class="scroll_btn"><a href="logout.php" >Logout</a></li> -->
								<li class="scroll_btn">
						        
						        <div class = "btn-group">
   								
   							    <img src="<?php echo $_SESSION['image'];?>" role="presentation" alt="" class="img-circle"  width="40px" height="45px" data-toggle="dropdown">
							   


							   <ul class = "dropdown-menu" role="menu">
							      <a href = "profile.php" style="padding: 7px; font-weight: 800px; font-size: 12px;"><li>Profile</li></a>
							      <a href = "index.php" style="padding: 7px; font-weight: 800px; font-size: 12px;"><li>Home</li></a>
							      <a href = "event.php" style="padding: 7px; font-weight: 800px; font-size: 12px;"><li>Create Event</li></a>
							    
							      <a href = "logout.php" style="padding: 7px; font-weight: 800px; font-size: 12px;"><li>Logout</li></a>
							   </ul>

							   

							 </div>
						        
						        </li>

								<?php } ?>
								
								
						          
						          
						         
						        

     
                                                      
							</ul>
							
							
							
							
						</nav>
						</div>
						</div>

					</div><!-- //MENU -->
				</div><!-- //MENU BLOCK -->
			</div><!-- //CONTAINER -->
		</header><!-- //HEADER -->







