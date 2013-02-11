<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7510678-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  window.onload = function(){

  	/* TITLE LINK */
  	$('.title-link').on('click', function(e){
  		_gaq.push(['_trackEvent', 'TitleLink', 'click']);
  	});

  	/* MENU */
  	$('.menu-item a').on('click', function(e){
  		_gaq.push(['_trackEvent', 'Menu', 'click']);
  	});

  	/* Slider Controls */
  	$('.sliderNav a').on('click', function(e){
  		_gaq.push(['_trackEvent', 'SliderNav', 'click']);
  	});

  	/* Slider Scroll */
  	$('.sliderNav a').on('scroll', function(e){
  		_gaq.push(['_trackEvent', 'SliderScroll', 'scroll']);
  	});

  	/* Work Page Items */
  	$('.featuredwork a').on('click', function(e){
  		_gaq.push(['_trackEvent', 'WorkClick', 'click']);
  	});

  }
  

</script>