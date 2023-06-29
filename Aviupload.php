<!DOCTYPE html>
<html>
<style type="text/css">
  body {background-image: linear-gradient(#002ab5, #00ffa2); height: 42vw;}

</style>
<body>



<h1><?php

	$IsoName=$_FILES['fuResume']['name'];

	$FileName="../content/avatarTemplates/".$_FILES['fuResume']['name'];
	$TmpName=$_FILES['fuResume']['tmp_name'];

	$IsoName = substr($IsoName, 0, strlen($IsoName) - 9);

	$key =$_POST['user'];

	$FolderName = "";

	if($key != "" && !str_contains($key, "/")) {

		echo("Template Uploaded!");

		if (!file_exists('../content/avatarTemplates/'.$key."▞".$IsoName)) {
    	mkdir('../content/avatarTemplates/'.$key."▞".$IsoName, 0777, true);
    	$FolderName = '../content/avatarTemplates/'.$key."▞".$IsoName;

    	$FileName=$FolderName."/"."package.zip";

    	$IcoIsoName=$_FILES['ico']['name'];

		$IcoFileName=$FolderName."/"."icon.png";
		$IcoTmpName=$_FILES['ico']['tmp_name'];

		move_uploaded_file($TmpName,$FileName);
		move_uploaded_file($IcoTmpName,$IcoFileName);

		$zip = new ZipArchive;
		$res = $zip->open($FolderName."/"."package.zip");
		if ($res === TRUE) {
  			$zip->extractTo($FolderName);
  			$zip->close();
			} else {
  				echo ' - However, it failed to proccess on our end. Ensure only compiled templates from the sdk are used';
			}
    	}
    	$fh = fopen($FolderName.'/data.txt','r');

    	$properName = fgets($fh);

    	$properName = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $properName);
		// Remove any runs of periods (thanks falstro!)
		$properName = mb_ereg_replace("([\.]{2,})", '', $properName);

		fclose($fh);

    	//rename($FolderName, '../content/avatarTemplates/'.$key."▞".$properName);

	} else {

		echo("Template failed to upload...");

		if($key == "" | str_contains($key, "/")){
			echo("<br>Your author name is either empty or invalid.");
		}
	}

	#echo("File Uploaded!");
?></h1>
<h2 style="color: lime"><?php echo($IsoName); ?></h2>

<button onclick="document.location='../index.html'">Return to index</button> 
<button onclick="document.location='../content/avatarBuilder/index.html'">Jump to Avatar Creator</button>

</body>

</html>