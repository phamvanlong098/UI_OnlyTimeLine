<?php
	require_once('../lib/functions.php');

	$d = initializeApp('streamline');	
	$ni = sizeof($d['items']);
	$iu = array($ni);	

	for($i=0;$i<$ni;$i++){
		$itemid = $d['items'][$i];
		$idata 	= fetchItemData($itemid);
	}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $d['title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<!--test template style-->
	<!-- <style>html{height:100%}*{margin:0;padding:0}body{font:normal 15px 'trebuchet ms',arial,sans-serif;background:#FFF url(background.png) repeat;color:#777}p{padding:0 0 20px 0;line-height:1.7em}img{border:0}h1,h2,h3,h4,h5,h6{font:bold 28px 'century gothic',arial,sans-serif;color:#068900;margin:0 0 15px 0;padding:15px 0 5px 0}h2{font:normal 115% 'century gothic',arial,sans-serif;color:#068900}h4,h5,h6{margin:0;padding:0 0 5px 0;font:normal 25px arial,sans-serif;color:#068900}h5,h6{font:italic 21px arial,sans-serif;padding:0 0 15px 0;color:#000}h6{color:#362C20}a,a:hover{outline:none;text-decoration:underline;color:tomato}a:hover{text-decoration:none}.left{float:left;width:auto;margin-right:10px}.right{float:right;width:auto;margin-left:10px}.center{display:block;text-align:center;margin:20px auto}blockquote{margin:20px 0;padding:10px 20px 0 20px;border:1px solid #E5E5DB;background:#FFF}ul{margin:2px 0 22px 17px}ul li{list-style-type:circle;margin:0 0 6px 0;padding:0 0 4px 5px}ol{margin:8px 0 22px 20px}ol li{margin:0 0 11px 0}#main,#logo,#menubar,#site_content,#footer{margin-left:auto;margin-right:auto}#header{min-height:240px}#logo{width:80%;position:relative;margin-bottom:45px}#logo h1,#logo h2{font:normal 300% 'century gothic',arial,sans-serif;border-bottom:0;text-transform:none;margin:0}#logo_text h1,#logo_text h1 a,#logo_text h1 a:hover{padding:22px 0 0 0;color:#000;letter-spacing:.1em;text-decoration:none}#logo_text h1 a .logo_colour{color:#068900}#logo_text h2{font-size:15px;padding:4px 0 0 0;color:#676767}#menubar{width:80%;height:72px;padding:0;background:transparent url(transparent.png) repeat}ul#menu,ul#menu li{float:left;margin:0;padding:0}ul#menu li{list-style:none}ul#menu li a{letter-spacing:.1em;font:normal 15px arial,sans-serif;display:block;float:left;height:37px;padding:29px 26px 6px 26px;text-align:center;color:#000;text-transform:uppercase;text-decoration:none;border-bottom:2px solid #068900;background:transparent}ul#menu li a:hover,ul#menu li.selected a,ul#menu li.selected a:hover{color:#FFF;background:#068900}#site_content{width:80%;overflow:hidden;margin:0 auto 0 auto;padding:20px 20px 20px 20px;background:transparent url(transparent_light.png) repeat}.sidebar{float:right;width:190px;padding:0 15px 20px 15px}.sidebar ul{width:178px;padding:4px 0 0 0;margin:4px 0 30px 0}.sidebar li{list-style:none;padding:0 0 7px 0}.sidebar li a,.sidebar li a:hover{padding:0 0 0 40px;display:block;background:transparent url(link.png) no-repeat left center}.sidebar li a.selected{color:#444;text-decoration:none}#content{text-align:left;padding:0}#content ul{margin:2px 0 22px 0}#content ul li{list-style-type:none;background:url(bullet.png) no-repeat;margin:0 0 6px 0;padding:0 0 4px 25px;line-height:1.5em}#footer{width:900px;font:normal 15px 'lucida sans unicode',arial,sans-serif;height:33px;padding:24px 0 5px 0;text-align:center;background:transparent url(transparent.png) repeat;color:#FFF;text-transform:uppercase;letter-spacing:.1em}#footer a{color:#FFF;text-decoration:none}#footer a:hover{color:#FFF;text-decoration:underline}footer{background:#068900;height:90px}footer h2{color:#fff;font-size:28px;width:80%;margin:auto}.search{color:#5D5D5D;border:1px solid #BBB;width:134px;padding:4px;font:100% arial,sans-serif}#colours{height:0;text-align:right;padding:66px 16px 0 300px}.form_settings{margin:15px 0 0 0}.form_settings p{padding:0 0 4px 0}.form_settings span{float:left;width:200px;text-align:left}.form_settings input,.form_settings textarea{padding:5px;width:299px;font:15px arial;border:1px solid #E5E5DB;background:#FFF;color:#47433F}.form_settings .submit{font:15px arial;border:1px solid;width:99px;margin:0 0 0 212px;height:33px;padding:2px 0 3px 0;cursor:pointer;background:#068900;color:#FFF}.form_settings textarea,.form_settings select{font:15px arial;width:299px}.form_settings select{width:310px}.form_settings .checkbox{margin:4px 0;padding:0;width:14px;border:0;background:none}.separator{width:100%;height:0;border-top:1px solid #D9D5CF;border-bottom:1px solid #FFF;margin:0 0 20px 0}table{margin:10px 0 30px 0}table tr th,table tr td{background:#3B3B3B;color:#FFF;padding:7px 4px;text-align:left}table tr td{background:#F0EFE2;color:#47433F;border-top:1px solid #FFF}</style>

	<style>.scroll-indicator-controller{position:fixed;top:50vh;transform:translate(0,-50%);right:10px;z-index:999}.scroll-indicator-controller.indi-mobile>div span{display:none}@media (min-width:1025px){.scroll-indicator-controller{right:20px}}.scroll-indicator-controller>div{width:20px;height:20px;position:relative;border-radius:50%;border:1px solid tomato;background:rgba(0,0,0,.25);margin:0 0 10px 0;cursor:pointer;transition:background .4s ease;will-change:transition}.scroll-indicator-controller>div span{color:tomato;position:absolute;right:calc(100% + 8px);white-space:nowrap;top:50%;font-family:arial,sans-serif;font-size:16px;line-height:17px;width:0;overflow:hidden;opacity:0;transform:translateY(-50%) translateX(10px);transition:all .4s ease;will-change:transition}@media (hover:none){.scroll-indicator-controller>div span{display:none}}.scroll-indicator-controller>div span:after{content:"-----";padding-left:5px;letter-spacing:-2px;font-family:arial,sans-serif;vertical-align:text-top;line-height:14px}@media (hover:hover),(-ms-high-contrast:none),(-ms-high-contrast:active){.scroll-indicator-controller>div:hover span{width:auto;opacity:1;overflow:visible;transform:translateY(-50%) translateX(0)}}.scroll-indicator-controller>div.active{background:tomato;border-color:rgba(0,0,0,.25)}@supports (-ms-ime-align:auto){.scroll-indicator-controller>div span{transition:opacity .4s ease}}
		#itemcontent{
			box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px; 
			border-radius: 20px 20px 20px 20px;
			padding: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style> -->

	<style>
			.wrapper {
		min-height: 100vh;
		font-family: "Roboto Slab", serif;
		font-weight: 300;
		color: #fff;
		position: relative;
		}

		.title {
		margin: 0;
		background-color: rgba(0, 0, 0, 0.918);
		color: #fff;
		text-align: center;
		font-family: "Roboto Slab", serif;
		font-weight: 300;
		height: 100px;
		display: flex;
		justify-content: center;
		align-items: center;
		}

		section img {
		/* width: 100vw; */
		height: 100vh;
		filter: brightness(0.5);
		z-index: 0;
		border: 10px solid #000;
		}

		section {
		height: 100vh;
		font-size: 40px;
		font-weight: 100;
		background-color: rgba(0, 0, 0, 0.918);
		display: flex;
		justify-content: center;
		align-items: center;
		}
		/* section:nth-child(1) {
		background: white;
		}
		section:nth-child(2) {
		background: #F64747;
		}
		*/
		/* section:nth-child(3) {
		background: #22A7F0;
		}
		section:nth-child(4) {
		background: #F9690E;
		}
		section:nth-child(5) {
		background: #9B59B6;
		}
		section:nth-child(6) {
		background: #03C9A9;
		}
		section:nth-child(7) {
		background: #ffcc00;
		}
		section:nth-child(8) {
		background: #F9690E;
		}
		section:nth-child(9) {
		background: #22A7F0;
		}
		section:nth-child(10) {
		background: #F64747;
		}
		section:nth-child(11) {
		background: #F9690E;
		}
		section:nth-child(12) {
		background: #9B59B6;
		}
		section:nth-child(13) {
		background: #03C9A9;
		}
		section:nth-child(14) {
		background: #F9690E;
		}
		section:nth-child(15) {
		background: #9B59B6;
		}
		section:nth-child(16) {
		background: #03C9A9;
		}
		section:nth-child(17) {
		background: #ffcc00;
		}
		section:nth-child(18) {
		background: #F9690E;
		}
		section:nth-child(19) {
		background: #F64747;
		}
		section:nth-child(20) {
		background: #22A7F0;
		}  */

		.nav__wrapper {
		position: fixed;
		height: 100%;
		padding: 30px;
		display: flex;
		flex-flow: column nowrap;
		justify-content: flex-start;
		z-index: 1;
		}
		.nav {
		margin: 0 0 100px 30px;
		}
		.nav__counter {
		font-size: 24px;
		transition: all 0.15s ease-out;
		}
		.nav__title {
		/* display: none; */
		font-size: 20px;
		font-weight: 300;
		margin: 0 0 0.25em;
		width: 300px;
		height: 0;
		overflow: hidden;
		opacity: 0;
		transition: height 0.3s ease-out, opacity 0.2s ease-out;
		}
		.nav__body {
		font-weight: 100;
		font-size: 18px;
		font-size: 18px;
		width: 300px;
		height: 0;
		overflow: hidden;
		opacity: 0;
		transition: height 0.3s ease-out, opacity 0.2s ease-out;
		}
		.nav li {
		position: relative;
		transition: all 0.3s ease-out;
		margin-bottom: 1em;
		}
		.nav li:after {
		content: "";
		display: block;
		border-left: 2px solid white;
		border-top: 2px solid white;
		height: 250px;
		width: 20px;
		position: absolute;
		left: -30px;
		top: 15px;
		}
		.nav li a {
		display: block;
		padding: 0;
		color: #fff;
		text-shadow: 1px 1px 2px #000;
		transition: all 0.15s ease-out;
		}
		.nav li a:hover {
		background-color: transparent;
		padding-left: 1em;
		}
		.nav li a:focus {
		background-color: transparent;
		}
		.nav li.active {
		pointer-events: none;
		padding-left: 1em;
		}
		.nav li.active:after {
		width: 35px;
		height: 400px;
		top: 35px;
		}
		.nav li.active .nav__counter {
		font-size: 48px;
		}
		.nav li.active .nav__title {
		height: 40px;
		opacity: 1;
		overflow: visible;
		}
		.nav li.active .nav__body {
		height: 100px;
		opacity: 1;
		overflow: visible;
		}
	</style>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body data-spy="scroll" data-target="#navbar-example">


  <div class="wrapper" >
    <h1 class="title">Bác Hồ - vị lãnh tụ kính yêu của dân tộc Việt Nam</h1>
    <nav class="nav__wrapper" id="navbar-example">
      <ul class="nav">

        <li role="presentation" class="active">
          <a href="#section1" pid="1">
            <span class="nav__counter">25-12-1920</span>
            <h3 class="nav__title">Đại hội lần thứ XVIII của Đảng Xã hội Pháp </h3>
            <p class="nav__body">Lãnh tụ Nguyễn Ái Quốc dự Đại hội lần thứ XVIII của Đảng Xã hội Pháp ở Tours, năm 1920.</p>
          </a>
        </li>

        <li role="presentation">
          <a href="#section2" pid="2">
            <span class="nav__counter">2/9/1945</span>
            <h3 class="nav__title">Bác đọc bản tuyên ngôn độc lập</h3>
            <p class="nav__body">Người đọc bản Tuyên ngôn Độc lập khai sinh ra nước Việt Nam Dân chủ Cộng hòa vào ngày 2/9/1945 tại quảng trường Ba Đình lịch sử. </p>
          </a>
        </li>

        <li role="presentation">
          <a href="#section3" pid="3">
            <span class="nav__counter">03</span>
            <h3 class="nav__title">Section 3 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        
        <li role="presentation">
          <a href="#section4" pid="4">
            <span class="nav__counter">04</span>
            <h3 class="nav__title">Section 4 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        
        <li role="presentation">
          <a href="#section5" pid="5">
            <span class="nav__counter">05</span>
            <h3 class="nav__title">Section 5 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        
        <li role="presentation">
          <a href="#section6" pid="6">
            <span class="nav__counter">06</span>
            <h3 class="nav__title">Section 6 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>

        <li role="presentation">
          <a href="#section7" pid="7">
            <span class="nav__counter">07</span>
            <h3 class="nav__title">Section 7 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        <li role="presentation">
          <a href="#section8" pid="8">
            <span class="nav__counter">08</span>
            <h3 class="nav__title">Section 8 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        <li role="presentation">
          <a href="#section9" pid="9">
            <span class="nav__counter">09</span>
            <h3 class="nav__title">Section 9 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>
        <li role="presentation">
          <a href="#section10" pid="10">
            <span class="nav__counter">10</span>
            <h3 class="nav__title">Section 10 Title</h3>
            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
          </a>
        </li>

        
      </ul>
    </nav>
<?php
		for($i=0;$i<$ni;$i++){
			$itemid = $d['items'][$i];
			$idata 	= fetchItemData($itemid);
			echo '<section class="section section1" id="section1">';
			echo htmlItem($idata,'itemcontent');
			echo '</section>';
		}
?>       
	</div>
</body>
<!--Easy Scroll Dots js-->
<!-- <script>function dotsThrottle(t,e,o){let n,i,d,l=null,c=0;o||(o={});const s=function(){c=!1===o.leading?0:Date.now(),l=null,d=t.apply(n,i),l||(n=i=null)};return function(){const a=Date.now();c||!1!==o.leading||(c=a);const r=e-(a-c);return n=this,i=arguments,r<=0||r>e?(l&&(clearTimeout(l),l=null),c=a,d=t.apply(n,i),l||(n=i=null)):l||!1===o.trailing||(l=setTimeout(s,r)),d}}let dotFixedNavPresent=!1,dotFixedNavId="",dotFixedNavUp=!1,dotOffset=0;function easyScrollDots(t){let e=document.querySelectorAll(".scroll-indicator");if(!0===t.fixedNav&&(dotFixedNavPresent=!0),dotFixedNavId=""!==t.fixedNavId&&t.fixedNavId,!0===t.fixedNavUpward&&(dotFixedNavUp=!0),t.offset>0&&(dotOffset=t.offset),e.length){const t='<div class="scroll-indicator-controller"><span></span></div>';document.querySelector("body").lastElementChild.insertAdjacentHTML("afterend",t);const o=document.querySelector(".scroll-indicator-controller");void 0===window.orientation&&-1===navigator.userAgent.indexOf("IEMobile")||o.classList.add("indi-mobile");const n=Array.prototype.slice.call(e);n.forEach(function(t,e){const n=t.getAttribute("id"),i=t.getAttribute("data-scroll-indicator-title");let d="";0==e&&(d="active"),o.lastElementChild.insertAdjacentHTML("afterend",'<div class="'+d+'" data-indi-controller-id="'+n+'" onclick="scrollIndiClicked(\''+n+"');\"><span>"+i+"</span><div></div></div>")});const i=o.querySelectorAll("[data-indi-controller-id]"),d=dotsThrottle(function(){let t={};n.forEach(function(e){const o=e.getAttribute("id"),n=e.getBoundingClientRect().top;t[o]=n});const e=Object.keys(t).map(function(e){return t[e]});Object.keys(t).forEach(function(n){t[n]==function(){const t=e.filter(function(t){return t>-150});return Math.min.apply(null,t)}()&&(Array.prototype.forEach.call(i,function(t){t.classList.contains("active")&&t.classList.remove("active")}),o.querySelector('[data-indi-controller-id="'+n+'"]').classList.add("active"))})},300);window.addEventListener("scroll",d)}}function scrollIndiClicked(t){if(window.jQuery){const e=$("html, body");if(!0===dotFixedNavPresent&&dotFixedNavId.length){const o=document.getElementById(dotFixedNavId).clientHeight,n=$("#"+t);if(!0===dotFixedNavUp){e.animate({scrollTop:n.offset().top-dotOffset},700);const t=document.body.getBoundingClientRect().top;setTimeout(function(){document.body.getBoundingClientRect().top>t&&e.animate({scrollTop:n.offset().top-o-dotOffset},400)},400)}else e.animate({scrollTop:n.offset().top-o-dotOffset},700)}else e.animate({scrollTop:$("#"+t).offset().top-dotOffset},700)}else if(!0===dotFixedNavPresent&&dotFixedNavId.length){const e=document.getElementById(dotFixedNavId).clientHeight,o=document.getElementById(t);if(!0===dotFixedNavUp){window.scrollTo({top:o.offsetTop-dotOffset,left:0,behavior:"smooth"});const t=document.body.getBoundingClientRect().top;setTimeout(function(){document.body.getBoundingClientRect().top>t&&window.scrollTo({top:o.offsetTop-e-dotOffset,left:0,behavior:"smooth"})},400)}else window.scrollTo({top:o.offsetTop-e-dotOffset,left:0,behavior:"smooth"})}else window.scrollTo({top:document.getElementById(t).offsetTop-dotOffset,left:0,behavior:"smooth"})}</script>

<script>
easyScrollDots({
  'fixedNav': false,
  'fixedNavId': '',
  'fixedNavUpward': false,
  'offset': 0
}); -->
<!-- </script> -->
<script>
	// SMOOTH SCROLLING SECTIONS
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			console.log(target)
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});

	document.onscroll = function() {
		let activeSection = document.querySelector(".active");
		let activeNumber = activeSection.children[0].getAttribute("pid");
		let nav = document.querySelector(".nav__wrapper");
		if(activeNumber < 7) {
			nav.style.justifyContent = "flex-start";
		}
		else {
			nav.style.justifyContent = "flex-end";
		}
	}

</script>
</body>
</html>
