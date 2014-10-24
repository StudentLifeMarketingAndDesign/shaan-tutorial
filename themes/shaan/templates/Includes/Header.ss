<header class="header" role="banner">
	<div class="row">
		<% include HeaderLogo %>
		<ul class="main-nav nav-collapse">
			<% loop Menu(1) %>
			<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %><% if $Children %> has-dropdown<% end_if %>">
				<a href="$Link" title="Go to $Title.ATT">$MenuTitle</a>
				<!--<% if $Children %>
				<ul class="dropdown">
					<li><label>$MenuTitle</label></li>
					<% loop $Children %>
					<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %><% if $Children %> has-dropdown<% end_if %>">
						<a href="$Link" title="Go to $Title.ATT">$MenuTitle</a>
						<% if $Children %>
						<ul class="dropdown">
							<% loop $Children %>
							<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %>"><a href="$Link" title="Go to $Title.ATT">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
						<% end_if %>
					</li>
					<% end_loop %>
					<li><a href="$Link">See all &rarr;</a></li>
				</ul>
				<% end_if %>-->
			</li>
			<% end_loop %>
		</ul>


	</div>
</header>