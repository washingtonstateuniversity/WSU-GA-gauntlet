<?php /*
Template Name: General GA setup
*/ ?>
<?php 
$themePath = get_stylesheet_directory_uri(); // we want the child theme url
?>
<?php get_header(); ?>
	<style>
        .level.boss{display:inline-block;border:1px solid #999;width:100; }
        .level.boss span{display:inline-block;float:left;border:1px solid #999; width:100%;}
        .level.boss img{min-width: 100%;}
        code,pre{font-size: .85em; white-space: pre-wrap; white-space: -moz-pre-wrap; white-space: -pre-wrap;white-space: -o-pre-wrap; word-wrap: break-word;line-height: .95em;font-family: monospace;color: rgb(30,10,10);}
        .inlinecode{display:inline-block;}
	</style>

<main>

<?php get_template_part('parts/headers'); ?>

<section class="row side-right gutter pad-bottom tall">

	<div class="column one">

 <hr/><hr/>
    <h1>jTrack -- a Google Analytics Plugin || Examples</h1>
    
   
    
    <hr/><hr/>
    <h4 style="color:rgb(255,184,28)">Note: all clicks are suppressed to keep only the GA events and actions </h4>
    <hr/>
    <h2>Deferred loading of Google Analytics</h2>
    <code>
    <pre>
// Load Google Analytics script and track page views
&lt;script type="text/javascript"&gt;
    $.jtrack({ 
    	load_analytics:{
            account:'UA-xxx-xxx',
    	    options:{onload: true, status_code: 200}
        }
    });
&lt;/script&gt;
    </pre>
    </code>
		
	<blockquote>Why have a choice? Why postpone the GA from loading before the page loads? If you only want to count when a user truly saw the page, then that <code class="inlinecode">onload</code> option is the way to go. This approach will help reduce false click traffic. </blockquote>
		

	<h2>General link tracking tests</h2>
	<div class="row halves gutter narrow pad-bottom short"> 
		<div class="column one">
			<h4>Internal/external link tracking</h4>
			<div class="normal">
			  <a href="/abcdef">Internal link</a><br/>
			  <a href="http://www.complex.com">External link</a><br/>
			  <a href="http://beastieboys.com/" target="_blank">External link in new window</a><br/>
			  <a href="#">Named link</a><br/>
			  <a href="javascript:void(0)">JavaScript link</a>
			</div>
		</div>
		<div class="column two">
			<h4>Metadata extraction using callbacks</h4>
			<div class="sidebar">
			  <a href="http://www.sidebar.com">Sidebar link</a>
			</div>
			<div class="footer">
			  <a href="http://www.footer.com">Footer link</a>
			</div>
			<div class="complex">
			  <a href="http://www.complex.com" class="complex">Complex link</a>
			</div>
		</div>
	</div>
    
    <h3>Mouse over event tracking</h3>
    <a href="http://www.google.com" id="hover">Hover over me</a>
    
    <div>
    <hr/><hr/>
    <h2>Test Level: <em>Boss</em></h2>
    <hr/>
    <hr/>
	<div class="row thirds gutter narrow pad-bottom short"> 
		 <div class="column one">
			<a href="http://i.imgur.com/dsDO3.gif" class="level boss click one">
				<span>One Click EX:</span>
				<img src="http://i.imgur.com/dsDO3.gif" />
			 </a>
		</div>
		<div class="column two">
			<a href=" http://i.imgur.com/YeXDp.gif" class="level boss click two">
				<span>DBL click EX:</span>
				<img src="http://i.imgur.com/YeXDp.gif" />
			</a>
		</div>
		<div class="column three">
			<a href="http://i.imgur.com/Tyz0s.gif" class="level boss load">
				<span>onLoad EX:</span>
				<img src="http://i.imgur.com/Tyz0s.gif" />
			</a>
		</div>
	</div>
     <hr/> 
      
      
    </div>



    <h2>Custom event tracking</h2>

    <pre><code>
$(function(){
    $('a#custom-event').click(function() {
        $.jtrack.trackEvent('category', 'action', 'label', 'value');
        //or
        /*
        $(this).jtrack({
            category : function(element) {},
            action : function(element) {},
            label : function(element) {},
            value : function(element) {},
            //more options are available 
        });
        */
    });
});
    </code></pre>

<hr/>
	<h2>Extended test</h2>
<p><strong>Internal  links</strong> <br />
  From  the left nav </p>
<ul type="disc">
  <li><a href="http://trademarks.wsu.edu/" target="_blank">Trademark Licensing</a></li>
  <li><a href="http://photos.wsu.edu/" target="_blank">Photos Online</a></li>
  <li><a href="http://marketing.wsu.edu/" target="_blank">Marketing Communications</a></li>
</ul>
<p><strong>Downloads</strong><br />
  From <a href="http://identity.wsu.edu/brandrefresh/default.aspx">http://identity.wsu.edu/brandrefresh/default.aspx</a>:</p>
<h5>Download Brand  Identity Standards <strong>PDF</strong> <strong><a href="http://identity.wsu.edu/brandrefresh/pdf/WSU_Brand_2011.pdf">Download</a></strong>&nbsp;(3.7 MB)</h5>
<h5>Brand  Identity Presentation <strong>PowerPoint <a href="http://identity.wsu.edu/brandrefresh/brandrefresh.ppt">Download</a></strong>&nbsp;(16.2 MB) </h5>
<ul>
  <li>From <a href="http://identity.wsu.edu/downloads/pullman/tagline-signnatures.aspx">http://identity.wsu.edu/downloads/pullman/tagline-signnatures.aspx</a></li>
  <li><a href="http://identity.wsu.edu/downloads/files/tagline-signatures/wsuTLsignatures/PullmanTLSigsWindows/wsuTLSig1cW.zip">EPS Win</a></li>
  <li><a href="http://identity.wsu.edu/downloads/files/tagline-signatures/wsuTLsignatures/PullmanTLSigsWindows/wsuTLSig4cW.tif">TIFF Win</a></li>
  <li><strong>Zip files</strong> from: <a href="http://identity.wsu.edu/web/downloads/default.aspx">http://identity.wsu.edu/web/downloads/default.aspx</a></li>
</ul>
<h5>WSU color palette  Photoshop swatches&nbsp;<a href="http://identity.wsu.edu/web/downloads/PhotoshopSwatches-v3.zip">Download</a></h5>
<h5>Site identifier Photoshop starter  file&nbsp;<a href="http://identity.wsu.edu/web/downloads/SiteIdentifier-v3.zip">Download</a></h5>
<p><strong>Outbound links</strong><br />
  From: <a href="http://identity.wsu.edu/web/resources/default.aspx">http://identity.wsu.edu/web/resources/default.aspx</a> <br />
  <strong>CSS Section</strong></p>
<ul>
  <li>A List Apart<a href="http://www.alistapart.com/" target="_blank"><br />
    alistapart.com</a><br />
    <a href="http://www.alistapart.com/articles/practicalcss/" target="_blank">alistapart.com/articles/practicalcss</a></li>
  <li>css-discuss Wiki<a href="http://css-discuss.incutio.com/?page=FrontPage" target="_blank"><br />
    css-discuss.incutio.com/?page=FrontPage</a></li>
  <li><a href="http://css-discuss.incutio.com/?page=AvoidingHacks" target="_blank">css-discuss.incutio.com/?page=AvoidingHacks</a></li>
  <li>CSS layout  techniques<br />
    <a href="http://www.glish.com/css/" target="_blank">glish.com/css</a></li>
  <li>Max Design:  Standards Based Web Design<br />
    <a href="http://maxdesign.com.au/" target="_blank">maxdesign.com.au</a></li>
  <li>MeyerWeb<u><a href="http://meyerweb.com/eric/css/" target="_blank"><br />
    meyerweb.com/eric/css</a></u></li>
  <li>Real World Style  CSS tips, tricks &amp; techniques<a href="http://realworldstyle.com/" target="_blank"><br />
    realworldstyle.com</a></li>
  <li>Stop Design<u><a href="http://www.stopdesign.com/articles/" target="_blank"><br />
    http://www.stopdesign.com/articles/</a></u></li>
  <li>W3 Schools CSS  tutorial<br />
    <u><a href="http://www.w3schools.com/css/" target="_blank">w3schools.com/css</a></u></li>
  <li>WC3 Consortium  CSS resources<u><a href="http://www.w3.org/Style/CSS/" target="_blank"><br />
    w3.org/Style/CSS</a></u></li>
</ul>
<p><strong>Email links:</strong><br />
  From: <a href="http://identity.wsu.edu/contacts/default.aspx">http://identity.wsu.edu/contacts/default.aspx</a></p>
<ul>
  <li><a href="mailto:identity@lists.wsu.edu">identity@lists.wsu.edu</a></li>
  <li><a href="mailto:foo@wsu.edu">foo@wsu.edu</a></li>
</ul>
	
	
	

	</div><!--/column-->

	<div class="column two">

		<aside>
	<a href="#" id="debug">Set debug to <i>true</i></a>
     <h1>Running code</h1>
    <script type="text/javascript">

    $(document).ready(function(){
		$.get('<?=$themePath?>/track/test.txt',function(d){$('#jsonfeed').html(d);});
		eval($('#codeblob').html());
    });
    </script>

    <pre><code id="codeblob">
$(function(){
    /*
    example of a json feed controlling the triggers since this is something that is cached this is a  super easy way to control may distrobutions with out having users that don't know, have to make edits
    */
	$.jtrack.defaults.debug = false;
    $.getJSON('<?=$themePath?>/track/test.txt' , function(data){
        $.jtrack({
            load_analytics:{
                account:'UA-25040747-1',
                options:{
                    onload: false,
                    status_code: 200
                }
            },
            // this can be hard codded here or set do be feed in like so
            trackevents:data
        });
    });
	$('a#debug').on('click',function(){
		var newstate = $.jtrack.defaults.debug==true?false:true;
		$.jtrack.defaults.debug = newstate;
		$(this).find('i').text(newstate==true?"false":"true");
	});
    //few other examples
    $('.normal a').jtrack();
    $('.sidebar a').jtrack({
        category : 'sidebar'
    });
    $('.complex a').jtrack({
        category : function(element) {
            element.removeClass('tracked');
            return "A special Cat to use";
        }
    });


    //this sets the examples from doing anything but the google stuff
    $('a').on('click',function(e){
        e.preventDefault();
    });
});
    </code></pre>
        <h3>Json Feed <em>(loaded from track/test.txt)</em></h3>
    <pre><code id="jsonfeed">
    </code></pre>
			
				<h2>Sidebar</h2>
				<ul>
					<li>Fight, fight, fight for Washington State! Win the victory!</li>
					<li>Win the day for Crimson and Gray! Best in the West, we know you'll all do your best, so</li>
					<li>On, on, on, on! Fight to the end! Honor and Glory you must win! So</li>
					<li>Fight, fight, fight for Washington State and victory!</li>
					<li>W-A-S-H-I-N-G-T-O-N-S-T-A-T-E-C-O-U-G-S! <strong>GO COUGS!!</strong></li>
				</ul>
				<small>The song appears in the 1985 film <i>Volunteers</i>, sung by John Candy's character Tommy Tuttle from Tacoma, Washington, and later used as a war cry by the Communists.</small>
		</aside>

	</div><!--/column-->

</section>

</main>

<?php get_footer(); ?>