<script type="text/javascript">

	function showLoader(){
	
	$("#resultado").load("?q='.$searchme.'&tipo='.type.'&page=" + this.id, hideLoader);
	
};
</script>

<script type="text/javascript">
$(function() {
    $(compact-pagination).pagination('selectPage', 35);
});
</script>
	<div class="pagination-holder clearfix">
			<div id="compact-pagination"></div>
	</div>
	<link rel="stylesheet" type="text/css" href="http://flaviusmatis.github.io/simplePagination.js/hl.css" />
	<link rel="stylesheet" type="text/css" href="http://flaviusmatis.github.io/simplePagination.js/simplePagination.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://flaviusmatis.github.io/simplePagination.js/hl-all.js"></script>
<script type="text/javascript" src="jquery.simplePagination.js.php?q=<?php echo $_GET['q'];?>&tipo=<?php echo $_GET['tipo'];?>&page=<?php echo $_GET['page'];?>"></script>
<script type="text/javascript" src="script.js"></script>
</body>
<div id="resultado"></div> 