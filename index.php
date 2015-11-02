<?php
require_once ("php/config.php");
require_once ("php/functions.php");

$id = getDocId ();
$doccrc32 = getDocCRC32 ();
$contents = $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="<?php echo BASEURL; ?>jquery/jquery-1.9.1.min.js"></script> 
<link  href="<?php echo BASEURL; ?>bootstrap/bootstrap.min.css" rel="stylesheet"> 
<script src="<?php echo BASEURL; ?>bootstrap/bootstrap.min.js"></script> 
<link  href="<?php echo BASEURL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link  href="<?php echo BASEURL; ?>summernote/summernote.css" rel="stylesheet">
<script src="<?php echo BASEURL; ?>summernote/summernote.js"></script>
<script src="<?php echo BASEURL; ?>crc32/crc32.js"></script>
<script src="<?php echo BASEURL; ?>sync/sync.js"></script>
<title><?php echo $id; ?></title>
</head>
<body>

<div id="summernote"><?php echo $contents;?></div>

<script>

var doccrc32 = "<?php echo $doccrc32; ?>";


$(document).ready(function() {
  $('#summernote').summernote({
    height: window.innerHeight - 49,
    focus: true,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']],
      ],
  });
  // var contents = localStorage.getItem(doccrc32, contents);
  $.get( "get.php", 
    { crc32: doccrc32 }, 
    function( data ) {
      $("#summernote").code(data);
      // alert( "Load was performed." );
    });
});

</script>

</body>
</html>
