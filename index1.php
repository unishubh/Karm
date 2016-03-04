<?php
session_start(); 
include 'header.php' ;
//if(isset($_GET['city'])
//$ci=$_GET['city'];

?>
<body>



		<?php 
include 'navbar.php' ;
?>


<style>

/*
Fade content bs-carousel with hero headers
Code snippet by maridlcrmn (Follow me on Twitter @maridlcrmn) for Bootsnipp.com
Image credits: unsplash.com
*/

/********************************/
/*       Fade Bs-carousel       */
/********************************/
.fade-carousel {
    position: relative;
    height: 50vh;
}
.fade-carousel .carousel-inner .item {
    height: 50vh;
}
.fade-carousel .carousel-indicators > li {
    margin: 0 2px;
    background-color: #f39c12;
    border-color: #f39c12;
    opacity: .7;
}
.fade-carousel .carousel-indicators > li.active {
  width: 10px;
  height: 10px;
  opacity: 1;
}

/********************************/
/*          Hero Headers        */
/********************************/
.hero {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 1px 1px 0 rgba(0,0,0,.75);
      -webkit-transform: translate3d(-50%,-50%,0);
         -moz-transform: translate3d(-50%,-50%,0);
          -ms-transform: translate3d(-50%,-50%,0);
           -o-transform: translate3d(-50%,-50%,0);
              transform: translate3d(-50%,-50%,0);
}
.hero h1 {
    font-size: 6em;    
    font-weight: bold;
    margin: 0;
    padding: 0;
}

.fade-carousel .carousel-inner .item .hero {
    opacity: 0;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s; 
}
.fade-carousel .carousel-inner .item.active .hero {
    opacity: 1;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s;    
}

/********************************/
/*            Overlay           */
/********************************/
.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: #080d15;
    opacity: .0;
}

/********************************/
/*          Custom Buttons      */
/********************************/
.btn.btn-lg {padding: 10px 40px;}
.btn.btn-hero,
.btn.btn-hero:hover,
.btn.btn-hero:focus {
    color: #f5f5f5;
    background-color: #1abc9c;
    border-color: #1abc9c;
    outline: none;
    margin: 20px auto;
}

/********************************/
/*       Slides backgrounds     */
/********************************/
.fade-carousel .slides .slide-1, 
.fade-carousel .slides .slide-2,
.fade-carousel .slides .slide-3 {
  height: 100vh;
  background-size: 1366px 350px;
  /*background-position: center center;*/
  background-repeat: no-repeat;
}
.fade-carousel .slides .slide-1 {
  background-image: url("images/banner1.jpg");
}
.fade-carousel .slides .slide-2 {
  background-image: url("images/banner1.jpg");
}
.fade-carousel .slides .slide-3 {
  background-image: url("images/banner1.jpg");
}

/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
    .hero { width: 980px; }    
}
@media screen and (max-width: 640px){
    .hero h1 { font-size: 4em; }    
}

#amon{
overflow: hidden;
height : 340px;
width: 380px;
border: 2px solid rgb(198, 198, 198);
}

</style>
		
		<!-- HOME -->
		<section id="home" class="padbot0">
				
			<!-- TOP SLIDER -->
						<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
			  <!-- Overlay -->
			  <div class="overlay"></div>

			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
			    <li data-target="#bs-carousel" data-slide-to="1"></li>
			    <li data-target="#bs-carousel" data-slide-to="2"></li>
			  </ol>
			  
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			    <div class="item slides active">
			      <div class="slide-1"></div>
			      <div class="hero">
			        <!-- <hgroup>
			            <h1 style="font-weight: 500;"><i>Good Graffiti</i></h1>        
			            <h3>14 Feb 2016</h3>
			        </hgroup> -->
			        <!-- <button class="btn btn-hero btn-lg" role="button">See all features</button> -->
			      </div>
			    </div>
			    <div class="item slides">
			      <div class="slide-2"></div>
			      <div class="hero">        
			       <!--  <hgroup>
			            <h1 style="font-weight: 500;"><i>Good Graffiti</i></h1>        
			            <h3>Charity Art Fest</h3>
			        </hgroup>   -->     
			        <!-- <button class="btn btn-hero btn-lg" role="button">See all features</button> -->
			      </div>
			    </div>
			    <div class="item slides">
			      <div class="slide-3"></div>
			      <div class="hero">        
			       <!--  <hgroup>
			            <h1 style="font-weight: 500;"><i>Good Graffiti</i></h1>        
			            <h3>Navi Mumbai</h3>
			        </hgroup> -->
			        <!-- <button class="btn btn-hero btn-lg" role="button">See all features</button> -->
			      </div>
			    </div>
			  </div> 
			</div>
		</section><!-- //HOME -->
		
		<script src="validate.js"></script>
		<!-- ABOUT -->
		<section id="about">
			
			<!-- SERVICES -->
			
			<div class="container">
         
          <div class="page-header">
            <h2>Top Events</h2>
          </div>
          <div class="row-fluid" >
            <table class="thumbnails" >
		<tr style="padding: 10px;">
              <?php
			      $q="SELECT users.name AS uname,event.name AS fname,eid,cause,ngo,description,url,location,sdate,edate FROM users JOIN event ON users.id=uid ORDER BY eid DESC LIMIT 6 ";
			     $query=$conn->prepare($q);
					$i=0;
					  $query->execute();
					    $query->execute(array(':name' => "Jimbo"));
					    $d=$query->fetch();
					    while($d)
					    {
					if($i==3){
					echo '</tr><tr>';
					$i=0;
					}
					$i++;
			      $vid=$d['url'];
			      $ty=$d['eid'];
                 ?>
              <td class="span4" style="padding: 10px;">
            
               
                <div class="thumbnail" id = "amon" >
                  
                  <!--<img src="img/placeholder-360x200.jpg" alt="product name">-->
                   <?php
        if($vid[0]!='e')
       {
       ?>
       <iframe src="<?php echo $vid; ?>" style="height: 230px; width:100%" ></iframe>
       <?php
       }
       else
       {
       ?>
                  <img scrolling="no" style="height: 230px; width:100%"
			src=<?php echo $vid; ?>>
			
			<?php 
			}
			?>


					<a href="<?php echo 'locate.php?event='.$ty;?>">
                  <div class="caption">
                    <h3><?php echo $d['fname']; ?></h3>
                    <b style="font-size: 14px;">
                      <?php 
                      
                      echo $d['sdate'].' to '.$d['sdate'];

                      ?>
                    	</b>
                  </div>
                  <div class="widget-footer">
                   

                  </div>
                 </a>
                </div>
                
     
              </td>
              <?php
              $d=$query->fetch();
            }
               ?>
		</tr>
               </table>
               </div>   
               
      <!-- End: PRODUCT LIST -->
    </div>
    


    
<?php 
include 'footer.php' ;
?>






			
		</section><!-- //ABOUT -->
		
		


	



	
	
	

<!-- </div> -->
</body>


</html>