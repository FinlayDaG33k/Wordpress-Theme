<?php
function img_func($atts, $content = null){
	$a = shortcode_atts( array(
		'src' => $content,
		'url' => '',
		'caption' => '',
  ), $atts );

  $img  = "<div class=\"row\">";
	$img .= "<div class=\"col-sm-4\">";
	$img .= "<div class=\"col-sm-12 thumbnail text-center\">";
	$img .= "<img class=\"img-responsive\" src=\"".$a['src']."\">";
	if(!empty($a['caption'])){
		$img .= "<div class=\"caption\"><h4>".htmlentities($a['caption'])."</h4></div>";
	}
	$img .= "</div>";
	$img .= "</div>";
	$img .= "</div>";
	return $img;
}
add_shortcode( 'img', 'img_func' );

function wimg_func($atts, $content = null){
  $a = shortcode_atts( array(
    'src' => $content,
    'url' => '',
    'caption' => '',
  ), $atts );
  try{
    $tmpfname = tempnam("/tmp", "img_"); // Create a temporary file
    /* Download our image into the temporary file */
    $img = file_get_contents($a['src']); // Download the image
    file_put_contents($tmpfname, $img); // save it to our tempoerary file

    /* Load our images */
    $watermark = get_home_path().'/wp-content/uploads/2016/08/logo-FDG-300-01.png';
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
    ob_start(); // create an output buffer
    imagejpeg($im); // Add our image to the output buffer
    $outputBuffer = ob_get_clean(); // Get our output buffer into a variable and clear the buffer

    /* do some clean ups */
    imagedestroy($im);
    imagedestroy($stamp);
    imagedestroy($newStamp);

    $base64 = base64_encode($outputBuffer); // Base64 encode our image

    // Create our final output
    $imgid = generateRandomString();
    ?>
      <!-- Our actual visible image -->
      <div class="row">
        <div class="col-sm-4">
          <div class="col-sm-12 thumbnail text-center">
            <a href="#" data-toggle="modal" data-target="#<?= htmlentities($imgid); ?>">
              <img class="img-responsive" src="data:image/jpeg;base64,<?= $base64; ?>">
              <?php if(!empty($a['caption'])){ ?>
                <div class="caption">
                  <h4><?= htmlentities($a['caption']); ?></h4>
                </div>
              <?php } ?>
            </a>
          </div>
        </div>
      </div>
      <!-- A modal that shows up when a user clicks the image -->
      <div class="modal" id="<?= htmlentities($imgid); ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>
                <img src="data:image/jpeg;base64,<?= $base64; ?>">
              </p>
            </div>
            <div class="modal-footer">
              <?php if(!empty($a['caption'])){ ?>
                <p>
                  <span class="form-control-static pull-left"><?= htmlentities($a['caption']); ?></span>

                </p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php
  } catch(Exception $e) {
    jslog($e);
  }
  return; // Just cleanly return
}
add_shortcode( 'wimg', 'wimg_func' );
