<?php
	if(!empty($_GET['img']) && !empty($_GET['watermark'])){
		$tmpfname = tempnam("/tmp", "img_"); // Create a temporary file
		/* Download our image into the temporary file */
		$img = file_get_contents($_GET['img']); // Download the image
		file_put_contents($tmpfname, $img); // save it to our tempoerary file

		/* Load our images */
		$watermark = $_GET['watermark'];
		$stamp = imagecreatefrompng($watermark);
		$im = imagecreatefromstring(file_get_contents($tmpfname)); // Let's just have PHP handle the dirty type detection


		/* Rescale our watermark */
		if(imagesx($im) > imagesy($im)){
		  // if the width of the main image is bigger than the height
		  $newStampDimensions = array((imagesx($im) / 100) * 6.25,(imagesx($im) / 100) * 6.25);
		}else{
		  // if the height of the main image is bigger than the width
		  $newStampDimensions = array((imagesy($im) / 100) * 12.5,(imagesy($im) / 100) * 12.5);
		}

		$newStamp = imagecreatetruecolor($newStampDimensions[0], $newStampDimensions[1]);
		imagealphablending($newStamp, false);
		imagesavealpha($newStamp,true);
		imagecopyresampled($newStamp, $stamp, 0, 0, 0, 0, $newStampDimensions[0], $newStampDimensions[1], imagesx($stamp), imagesy($stamp)); // resize the watermark


		/* Calculate watermark positions */
		$loc_right = imagesx($im) - imagesx($newStamp);
		$loc_bottom = imagesy($im) - imagesy($newStamp);


		imagecopy($im, $newStamp, $loc_right,  $loc_bottom, 0, 0, imagesx($newStamp), imagesy($newStamp)); // add the watermark
		header('Content-type: image/jpeg');
		imagejpeg($im); // Add our image to the output buffer

		/* do some clean ups */
		imagedestroy($im);
		imagedestroy($stamp);
		imagedestroy($newStamp);
	}else{
		echo "Image and\or watermarklocation can't be empty!";
	}
