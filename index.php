<!DOCTYPE html>
<html>
<title>URL shortener</title>
<meta name="robots" content="noindex, nofollow">
</html>
<body>
<form method="post" action="shorten.php" id="shortener">
<label for="longurl">URL to shorten</label> <input type="text" name="longurl" id="longurl"> <input type="submit" value="Shorten">
</form>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
	$('#shortener').submit(function () {
		$.ajax({data: {longurl: $('#longurl').val()}, url: 'shorten.php', complete: function (XMLHttpRequest, textStatus) {
			$('#longurl').val(XMLHttpRequest.responseText);
		}});
		return false;
	});
});
</script>
<br/>
<p>Click and drag the hyperlink (below) to your bookmark toolbar (above) to create a "bookmarklet" for your shortening service</p>
<p>
<?php 
  $name_parts = explode('.', $_SERVER['HTTP_HOST']);
  $bookmark = $name_parts[0];
  echo "<a href=\"javascript:void(location.href='http://" . $_SERVER['HTTP_HOST'] . "/shortlink.php?longurl='+encodeURIComponent(location.href))\">" . $bookmark . "</a>" 
?>
</p>
</body>
</html>