<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Uploader</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="upload.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="config.js"></script>
<script type="text/javascript">
var global_magisterLudi = '7871dd06c2534d84d1cc3f44d0e6cefa',
global_auth_hash = '7f00ca56375a7c2836ca99ccb5e42aa6',
global_auth_token = '',
global_flickr_secret = 'c773f0accd45ed9c',
global_slideShowVersion = '6708',
global_slideShowCodeVersion = '34351',
global_slideShowVersionV2 = '33427',
global_slideShowCodeVersionV2 = '49745',
global_slideShowTextVersion = '58886',
global_slideShowVersionV3 = '59913',
global_nsid = '11539862@N04',
global_ispro = 1,
global_dbid = '11507723',
global_name ='none',
global_expire ='0',
global_icon_url ='http://swift/xampp/YUI',
global_tag_limit = '75',
global_collection_depth_limit = 5,
global_stewartVersion = '59809',
global_contact_limit = '3000',
global_eighteen = 1,
global_group_limit = 10,
global_photos_ids_limit = 20,
one_photo_show_belongs = 0,
prefs_isset_viewgeo = 0,
disable_stewart = 0;
disable_geo = 0;
var global_rper = 0;
var global_intl_lang = 'en-us';
var _images_root = _site_root;
var _intl_images_root = _site_root;
var do_bbml = 0;
var AdnanCounter = 1;
</script>
<script type="text/javascript" src="global.js"></script>
<script type="text/javascript" src="fold_main.js"></script>
<!--<script type="text/javascript" src="video.js"></script>-->
<!--<script type="text/javascript" src="swfobject.js"></script>-->
<!--<script type="text/javascript" src="slideshow3.js"></script>-->
<script type="text/javascript" src="s_output_en-us.js"></script>
<script type="text/javascript">
var global_joinDate = F.convert_unix_time_stamp('1187239590');
var global_time_stamp = '080916100732';


fixMaxWidth_getWidth = (navigator.userAgent.match(/MSIE 6/i)?function(el) {
  return el.currentStyle['max-width'];
}:function(el){
  return el.currentStyle['maxWidth'];
});

fixMaxWidth = function(el) {
  try {
    el.runtimeStyle.behavior = 'none';
    var mw = fixMaxWidth_getWidth(el);
    var nmw = parseInt(mw,10) || 10000;
    var cW = parseInt(el.offsetWidth);
    var cH = parseInt(el.offsetHeight);
    var ratio = (cH/cW);
    if (el.offsetWidth>nmw) {
      el.style.width = (nmw+'px');
      if (!isNaN(cH) && cH) {
        el.style.height = (Math.ceil(nmw*ratio)+'px');
      }
    }
  } catch(e) {
    // oh well
  }
}



// Dean Edwards/Matthias Miller/John Resig

/* for Mozilla/Opera9 */
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", F._window_onload_dom, false);
}

/* for Internet Explorer */
/*@cc_on @*/
/*@if (@_win32)
    document.write("<script id=__ie_onload defer src=javascript:void(0)><\/script>");
    var script = document.getElementById("__ie_onload");
    script.onreadystatechange = function() {
        if (this.readyState == "complete") {
            F._window_onload_dom(); // call the onload handler
        }
    };
/*@end @*/

/* for Safari */
if (/WebKit/i.test(navigator.userAgent)) { // sniff
    F.onload_dom_timer = setInterval(function() {
        if (/loaded|complete/.test(document.readyState)) {
            F._window_onload_dom(); // call the onload handler
        }
    }, 10);
}




</script>
<!--[if IE]>
<style type="text/css">

img.notsowide {
 behavior:expression(fixMaxWidth(this));
}

</style>
<![endif]-->
<script type="text/javascript">
var _api_root = "http://swift/xampp/YUI";
var _bytes_used = parseFloat("456587");
var _bytes_left = parseFloat("104401013");
var _show_tooltips = "0";
var _use_stats = "0";
var _default_content_type_restricted = 0;
var _meringue_mode = 0;

var _upload_max_photo_size = _upload_Total_max_limit; // Max size of a single file       (in MB)
var _upload_max_video_size = _upload_Total_max_limit; // Max size of a single file          "

var _video_offline = false;
var _upload_api_root = "http://swift/xampp/YUI";
</script>
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="js.js"></script>
<!--<script type="text/javascript" src="ylc_1.9.js"></script>-->
</head>
<body>
<div id="beacon"></div>
<a name="top"></a>
<div id="Main" >
  <h1>Upload</h1>
  <div id="yuploadcontrol">
    <!-- movie goes here -->
  </div>
  <!-- free only -->
  <div id="bandwidth" class="usage">
    <p id="bandwidth-left" style="display:none;">You've used <span id="bandwidth-used">0%</span> of your 100 MB limit this month - that leaves <span id="bandwidth-left">99.56 MB</span>. <a href="/upgrade/" onClick="ult_upgrade_click('U1101256');">Upgrade</a>?</p>
  </div>
  <div id="uploadr" class="step1">
    <!-- step 1 -->
    <div class="step1">
      <div class="instructions">
        <ul class="instructions">
          <li id="step1" class="enabled">
            <p>Step 1:</p>
            <div class="enabled"><a id="upload-add-files" href="javascript:void(0);">Select your Files</a></div>
            <div class="disabled">Choose photos</div>
          </li>
          <li>
            <p>Step 2:</p>
            <div><span>Upload files</span></div>
          </li>
        </ul>
      </div>
      <!-- /step 1 -->
    </div>
    <!-- step 2 -->
    <div class="step2">
      <div id="uploadr-messages" class="uploadr-messages">
        <ul>
          <li id="upload-oversize" class="oversize warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
            <p style="color:#CC3333"><strong>Your %filecount file(s)</strong> exceed <strong><script type="text/javascript">document.write(_upload_Total_max_limit);</script> MB Total</strong> upload limit, and will not be uploaded. Please remove some files.</span></p>
            <div class="clear"></div>
          </li>
          <li id="upload-no-video" class="no-video warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
            <p></p>
            <div class="clear"></div>
          </li>
          <li id="upload-overlimit" class="overlimit warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
            <p></p>
            <div class="clear"></div>
          </li>
        </ul>
      </div>
      <div id="moderation_container"></div>
      <div id="restricted"></div>
      <div id="wholeform">
        <!-- upload form -->
        <form action="about:blank" method="post" onSubmit="return false" id="upload_form">
          <div id="upload-container" class="upload-container free">
            <div class="ad">
              <div class="ad-content">
                <div id="ad-element"></div>
              </div>
            </div>
            <div class="upload-table-wrapper">
              <div id="upload-table" class="upload">
                <div class="head">
                  <ul>
                    <li>
                      <div class="name">File</div>
                      <div class="size" style="width:100px; text-align:center;">Title*</div>
                      <div class="size" style="width:100px; text-align:center;">Tags*</div>
                      <div class="size">Size</div>                      
                      <div class="select">Remove?</div>                      
                    </li>
                  </ul>
                  <div class="clear"></div>
                </div>
                <div class="uploadr-bg">
                  <div id="uploadr-scroll" class="uploadr-scroll">
                    <ul id="uploadr-list" class="body">
                      <!-- item template  -->
                      <li id="tmpl-upload-item" class="default">                      	
                        <div class="name">%filename</div>                        
                        <div class="size" style="width:100px; text-align:left;"><input style="width:100px; border: 1px solid #CCCCCC;" name="fileTitle[]" type="text"><span class="icon"></span></div>
                        <div class="size" style="width:100px; text-align:left;"><input style="width:100px; border: 1px solid #CCCCCC;" name="fileTags[]" type="text"><span class="icon"></span></div>
                        <div class="size">%filesize<span class="icon"></span></div>                        
                        <div class="select"><a href="#" class="remove">&nbsp;</a></div>                        
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="foot">
                  <ul>
                    <li>
                      <div class="name">
                        <div id="upload-total-bytes">Total: %bytes</div>
                        <div id="upload-total-files" class="plural"> <span class="single">%files file</span> <span class="plural">%files files</span> <span class="upload-add-more"><span class="divider">|</span><a href="#" id="upload-add-more" onClick="return F.uploadr.selectFiles(event)">Add More</a></span></div>
                      </div>
                      <div class="select"></div>
                    </li>
                  </ul>
                  <div class="clear">&nbsp;</div>
                </div>
                <div id="uploadr-status" class="uploadr-status">
                  <div>
                    <!-- progress bar drawn here -->
                  </div>
                </div>
                <div id="upload-templates">
                  <ul>
                    <li class="title-status">(%percentuploaded% complete) %pagetitle</li>
                    <li class="title-processing">(Processing...) %pagetitle</li>
                  </ul>
                </div>
                <div class="clear"></div>
                <div id="upload-controls">
                  <div id="upload-buttons">
                    <p class="default" style="display:block;"><a id="start-upload" class="bab" onClick="return false"><strong>Upload Videos</strong></a></p>
                    <p id="cancel-uploading" class="default" style="display:none;"><a class="bab" onClick="javascript: F.uploadr.cancelUpload(); return false;"><strong>Cancel</strong></a></p>
                  </div>
                  <p class="default-only cancel-upload" style="clear:left;position:relative">
                    <!-- pos:rel for Safari redraw fix -->
                    Or, <a href="account.php">cancel</a> and go to Your Account.</p>
                </div>
                <!-- post-upload messages -->
                <div id="uploadr-complete-messages" class="uploadr-messages">
                  <ul>
                    <li id="uploadr-ok" class="ok">
                      <p><img src="http://l.yimg.com/g/images/upload/circle-checkmark-ok.png" /><strong>Finished!</strong> Next: <a href="watch_videos.php">watch your videos</a> or <a href="index.php">Upload more videos</a></p>
                    </li>
                    <li id="uploadr-cancelled" class="one-failed">
                      <p><img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" /><strong>Cancelled!</strong> Fade up? <a href="index.php">Try again</a>, or <a href="account.php">just keep going?</a></p>
                      <div class="clear"></div>
                    </li>
                    <li id="uploadr-one-failed" class="one-failed">
                      <p><img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" /><strong>Bonk!</strong> 1 file didn't make it. <a href="#" onClick="F.uploadr.retryUpload();return false">Try again</a>, or <a href="#" onClick="F.uploadr.submitAndContinue();return false">just keep going?</a></p>
                      <div class="clear"></div>
                    </li>
                    <li id="uploadr-some-failed" class="some-failed">
                      <p><img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" /><strong>Bonk!</strong> %filecount files didn't make it. <a href="#" onClick="F.uploadr.retryUpload();return false">Try again</a>, or <a href="#" onClick="F.uploadr.submitAndContinue();return false">just keep going?</a></p>
                      <div class="clear"></div>
                    </li>
                    <li id="uploadr-all-failed" class="all-failed">
                      <p><img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" /><strong>Bonk!</strong> None of your files made it. <a href="#" onClick="F.uploadr.retryUpload();return false">Try again</a>, or <a href="account.php">return to your account</a>?</p>
                      <div class="clear"></div>
                    </li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </form>
        <form id="photo-edit-form" action="" method="post">
          <input type="hidden" id="uploadr-flash" name="flash_done" value="1" />
          <input type="hidden" id="uploadr-ids" name="ids" value="" />
        </form>
      </div>
      <!-- /upload form -->
    </div>
  </div>
</div>
<br id="MainFooterClear" clear="all" />
<div style="background: #000; color: #0f0; text-align: left; font-family: &quot;Courier New&quot;, Courier, monospace;"></div>
<div id="contactChangerBackground"></div>
</body>
</html>
