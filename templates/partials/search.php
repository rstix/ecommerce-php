<form class="search-filter" action="/templates/pages/search_filter.php" method="GET">
	<input type="text" name="query" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>"  placeholder="Enter your search keywords" />
	<button class="btn-green" type="submit">search</button>
</form>