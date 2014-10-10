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
			<h4>Configured link tracking</h4>
			<h5>Targeting</h5>
			<h6>_blank</h6>
			<div class="normal">
			  <a href="/abcdef" target="_blank">Internal link <code>target="_blank"</code></a><br/>
			  <a href="http://www.complex.com" target="_blank">External link <code>target="_blank"</code></a><br/>
			</div>
			<h6>_self</h6>
			<div class="normal">
			  <a href="/abcdef" target="_self">Internal link <code>target="_blank"</code></a><br/>
			  <a href="http://www.complex.com" target="_self">External link <code>target="_blank"</code></a><br/>
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
	<a href="http://www.google.com" id="touch">Touch me</a>
    
    <div>
		<hr/><hr/>
		<h2>Test Level: <em>Boss</em></h2>
		<hr/>
		<hr/>
		<div class="row thirds gutter narrow pad-bottom short"> 
			 <div class="column one">
				<a href="http://i.imgur.com/dsDO3.gif" class="level boss click one">
					<span>One Click EX:</span>
					<img src="http://i.imgur.com/dsDO3.gif" width="100%"/>
				 </a>
			</div>
			<div class="column two">
				<a href=" http://i.imgur.com/YeXDp.gif" class="level boss click two">
					<span>DBL click EX:</span>
					<img src="http://i.imgur.com/YeXDp.gif" width="100%"/>
				</a>
			</div>
			<div class="column three">
				<a href="http://i.imgur.com/Tyz0s.gif" class="level boss load">
					<span>onLoad EX:</span>
					<img src="http://i.imgur.com/Tyz0s.gif" width="100%"/>
				</a>
			</div>
		</div>
	</div>