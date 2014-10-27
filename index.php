<?php /*
		 *  Project Dynamic Navigation 
		 */
	 
?>
<!--
  ________ __   .__        __                         _______  ______________________
 /  _____/|  | _|__| ____ |  | _______    ____        \      \ \_   _____/\__    ___/
/   \  ___|  |/ /  |/  _ \|  |/ /\__  \  /    \       /   |   \ |    __)_   |    |   
\    \_\  \    <|  (  <_> )    <  / __ \|   |  \     /    |    \|        \  |    |   
 \______  /__|_ \__|\____/|__|_ \(____  /___|  /  /\ \____|__  /_______  /  |____|   
        \/     \/              \/     \/     \/   \/         \/        \/            
    .___                                .__                                    .__                 __   .__                 
  __| _/___.__.  ____  _____     _____  |__|  ____         ____  _____  ___  __|__|  ____ _____  _/  |_ |__|  ____    ____  
 / __ |<   |  | /    \ \__  \   /     \ |  |_/ ___\       /    \ \__  \ \  \/ /|  | / ___\\__  \ \   __\|  | /  _ \  /    \ 
/ /_/ | \___  ||   |  \ / __ \_|  Y Y  \|  |\  \___      |   |  \ / __ \_\   / |  |/ /_/  >/ __ \_|  |  |  |(  <_> )|   |  \
\____ | / ____||___|  /(____  /|__|_|  /|__| \___  >     |___|  /(____  / \_/  |__|\___  /(____  /|__|  |__| \____/ |___|  /
     \/ \/          \/      \/       \/          \/           \/      \/          /_____/      \/                        \/ 
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Dynamic Navigation by Gkiokan</title>
        
        <link rel='stylesheet' type='text/css' href='assets/css/bootstrap.min.css'>
            
        <script src='assets/js/jquery-1.11.1.min.js'></script>
        <script src='assets/js/bootstrap.min.js'></script>
        <style>
             html, body { height: 100%; display:block; position: relative; } 
				.main { position: relative; display: block; height: 100%; }
				.section { min-height: 100%; width: 100%; display: block; position: relative; padding-top:50px; }
				
				.navi { list-style:none; margin:0px; padding: 0px; text-align: center; background: #ac9962; }
				.navi li { display: inline-block; }
				.navi li a  { padding: 20px 10px; display: block; color: #fff; }
				.navi li a:hover { background: #7f7456; }
				
				.main_navi { position: fixed; top:0px; left:0px; right: 0px; z-index:100; display: none; }
        </style>
    </head>
    <body>
        
	 <?php
		  function random_color_el(){ return rand(1,255); }		  
		  function random_background(){
				$r = random_color_el();
				$g = random_color_el();
				$b = random_color_el();
				$final = "background:rgb($r,$g,$b)";
				return $final;
		  }
		  
		  function test_section_build($count){
				$build = array();
				for($i=1;$i<$count;$i++){
					 $bg = random_background();
					 $uid = "Link $i";
					 $build[$i]['build'] = "<div id='$i' class='section section_id_$i' style='$bg'><div class='container'><h1>$uid</h1></div></div>";
					 $build[$i]['title'] = $uid;
				}
				return $build;
		  }
		  
		  function build_content($input){
				foreach($input as $key => $value){ echo $value['build']; }
		  }
		  
		  function build_navi($input, $home=false){
				echo "<ul class='navi'>";
				if($home) echo "<li><a href='#0'>Home</a></li>";
				
				foreach($input as $key => $value){
					 echo "<li><a href='#{$key}'>{$value['title']}</a></li>";
				}
				echo "</ul>";
		  }
		  
		  // Init Build
		  $build = test_section_build(4);
		  
		  
	 ?>
	 <div class='main_navi'>
		  <?php build_navi($build, true); ?>
	 </div>
		  
    <div class='main'>
		  <div id='0' class='section section_id_0' style='background: rgb(244,244,244);'>
				<div class='container text-center'><h1>Here start's your test Enviroment</h1>
					 <br><br>
					 <div style='display: block; width:150px; height:150px; margin: 0px auto; background: cyan;'> Some Logo should go here </div>
					 <br>
					 <br>
				</div>
					 <div class='content_navi'>
						  <?php build_navi($build); ?>
					 </div>
				
				<div class='container text-center'>
					 <h2>Some Text and Content ...</h2>
					 <br>
					 Once in a while...<br>
					 Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. <br>
					 Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. <br>
					 A small river named Duden flows by their place and supplies it with the necessary regelialia. 		<br>
				</div>				
		  </div>
		  <?php build_content($build); ?>
	 </div>
	 
	 
	 <script>
		  $(function(){
				var main_navi = $('.main_navi');
				var content_navi = $('.content_navi');
				
				$('a').on('click', function(e){
					 e.preventDefault();
					 var src = $(this).attr('href');
					 var src_pos = $(src).offset().top;
					 $('body').animate({ scrollTop:src_pos},300);
					 return false;
				})
				
				
				$(window).scroll(function(){
					 var pos = $(window).scrollTop();
					 
					 if (pos>100) {
						  main_navi.slideDown();
						  content_navi.css({ opacity:0 });
					 } else {
						  main_navi.slideUp();
						  content_navi.css({ opacity:1 });
					 }
					 
				});
		  })
	 </script>
	 </body>
</html>