	<script>
	window.___gcfg = {lang: 'en-US'};
	(function(w, d, s) {
	  function go(){
		var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.src = url; js.id = id;
		  fjs.parentNode.insertBefore(js, fjs);
		};
		load('//connect.facebook.net/en/all.js#xfbml=1&appId=1438477833042163', 'fbjssdk');
		load('https://apis.google.com/js/plusone.js', 'gplus1js');
		load('//platform.twitter.com/widgets.js', 'tweetjs');
	  }
	  if (w.addEventListener) { w.addEventListener("load", go, false); }
	  else if (w.attachEvent) { w.attachEvent("onload",go); }
	}(window, document, 'script'));
	</script>
	<script type="text/javascript">
		(function() {
			var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
			li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
		})();
	</script>
	<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
	
	<div class="share-post">
	<ul>
		<li>
			<a href="https://twitter.com/share" 
			class="twitter-share-button" data-url="<?php the_permalink(); ?>" 
			data-text="<?php the_title(); ?>" 
			data-lang="en">tweet</a>
		</li>
		<li>
			<div id="fb-root"></div>
			<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
		</li>
		<li style="width:80px;"><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
		</li>
		<li><su:badge layout="2"></su:badge>

		</li>
		<li>
			
			<script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
		</li>
		<li class="pull-right btn-next-prev">
		<?php next_post_link('%link', '<i class="fa fa-chevron-left"></i>', TRUE); ?> 
		<?php next_post_link('%link', '<i class="fa fa-chevron-right"></i>', TRUE); ?> 
		
		

	
		</li>
	</ul>
	</div>