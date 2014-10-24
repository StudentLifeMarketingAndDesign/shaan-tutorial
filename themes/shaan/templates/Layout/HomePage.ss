
<div class="row">
	
		<!-- $Content -->
		<!-- $Form -->

		

	<div class="large-8 columns">
		<div class="mission-statement">
			<% loop $LatestNews %>
   			 <% include ArticleTeaser %>
			<% end_loop %>

		</div>
	</div>
	

	<div class="large-4 columns">
		<div id="BrowserPoll">
		    <h2>Browser Poll</h2>
    		<% if $BrowserPollForm %>
        		$BrowserPollForm
    		<% else %>
    	<ul>
        	<% loop $BrowserPollResults %>
        <li>
            <div class="browser">$Browser: $Percentage%</div>
            <div class="bar" style="width:$Percentage%">&nbsp;</div>
        </li>
        	<% end_loop %>
    	</ul>
    		<% end_if %>
		</div>
	</div>

	
</div>

<div class="row board-list">
	<div class="large-12 columns">
		<h4 class="subtitle">Our Employees</h4>
		<a href="{$baseUrl}about-us/" class="text-center"><small>View all board members</small></a>
		<br>
		<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-5">
			<% loop RandomStaffMembers(5) %>
				<li>
					<% if $Photo %>
						<a href="$Link" class="staff-link">
							<img src="$Photo.CroppedImage(230,230).URL" alt="$FirstName $LastName" class="staff-img">
						</a>
					<% else %>
						<a href="$Link" class="staff-link">
							<img src="{$ThemeDir}/images/placeholder.gif" alt="$FirstName $LastName" class="staff-img">
						</a>
					<% end_if %>
					<p class="staff-name">
						<a href="$Link">$FirstName $LastName</a>
					</p>
				</li>
			<% end_loop %>
		</ul>
	</div>

</div>
