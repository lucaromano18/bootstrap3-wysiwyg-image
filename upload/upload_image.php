<?php
	$_PATH_UPLOAD = "../../../dist/img/editor/";
    //echo $_PATH_UPLOAD;
	$_PATH_UPLOAD_FOR_VIEW = "/dist/img/editor/";
	$_IMAGES = array();
	if($_FILES) {
		$fileName = "uploaded-file-".time()."-".rand().".".pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION); // The file name
		$fileTmpLoc = $_FILES["image1"]["tmp_name"];
		$fileType = $_FILES["image1"]["type"];
		$fileSize = $_FILES["image1"]["size"];
		$fileErrorMsg = $_FILES["image1"]["error"];
		
		if (!$fileTmpLoc) {
			die("error");
		}
		if(move_uploaded_file($fileTmpLoc, $_PATH_UPLOAD."$fileName")) {
			$_IMAGES["path"] = $_PATH_UPLOAD_FOR_VIEW.$fileName;
			$_IMAGES["name"] = $_FILES["image1"]["name"];
			die(json_encode($_IMAGES));
		} else  {
			die("failed");
		}
	}
?>

