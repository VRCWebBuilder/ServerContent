<!DOCTYPE html>
<html>

<?php
	$files = glob('../content/avatarTemplates/*');
	echo "TEMPLATEDATA";
	foreach($files as $file) {
		$substring = substr($file, 27, 9999);
		if(is_dir($file)){
			echo $substring."<br>";
		}
	}
	echo "TEMPLATEDATA";
?>

<script>
	let queryString = window.location.search;
	let queryLimit = queryString.slice(1,99999);

	let filePath = "../content/avatarTemplates/" + queryLimit;
</script>

</body>

</html>