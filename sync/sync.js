
/*
   =============================================================================== 
   sync is a JavaScript function for syncing a string with the server
   ............................................................................... 
   Version: 1.0 - 2015/10 - http://dieletztedomain.de/ 
   ------------------------------------------------------------------------------- 
   Copyright (c) 2015 Michael Jentsch 
   http://www.opensource.org/licenses/mit-license.php 
   =============================================================================== 
*/ 

(function() { 
  var syncInterval = 500; // 1000 = 1 sec.
  var checksum = 0;
  var lastchecksum = 0;
  var docVersion = 0;
  function sync ()
  {
    var code = $("#summernote").code();
    if (code)
    {
      checksum = crc32 (code);
      if (checksum != lastchecksum)
      {
        // console.log (checksum + " " + lastchecksum);
        localStorage.setItem(doccrc32 + "_version", docVersion);
        localStorage.setItem(doccrc32, code);
        $.post( "sync.php", { crc32: doccrc32, htmlcode: code, version: docVersion } );
        docVersion ++;
      }
      lastchecksum = checksum;
    }
    window.setTimeout (sync, syncInterval);
  }
  sync();
})();
