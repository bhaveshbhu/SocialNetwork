<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Uploader</title>
<link href="index_files/c_flickr.css" rel="stylesheet" type="text/css">
<link href="index_files/c_formatting_tips.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/ico" href="/favicon.ico">
<link href="index_files/c_upload.css" rel="stylesheet" type="text/css">
<!--<link href="index_files/c_person.css" rel="stylesheet" type="text/css">-->
<!--[if LT IE 7]>
<style type="text/css">
.trans_png {
	behavior: url('/index_files/pngbehavior2.htc');
	border:0;
}
</style>
<![endif]-->
<link href="index_files/c_en-us.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="index_files/config.js"></script>
<script type="text/javascript" src="index_files/global.js"></script>
<script type="text/javascript" src="index_files/fold_main.js"></script>
<!--<script type="text/javascript" src="http://l.yimg.com/g/javascript/video.js.v63874.14"></script>-->
<script type="text/javascript" src="index_files/swfobject.js"></script>
<!--<script type="text/javascript" src="http://l.yimg.com/g/javascript/slideshow3.js.v62599.14"></script>-->
<link href="index_files/c_sharing.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="index_files/s_output_en-us.js"></script>
<script type="text/javascript">

YAHOO.util.Event.addListener(window, 'load', F._window_onload);
YAHOO.util.Event.addListener(window, 'resize', F._window_onresize);
YAHOO.util.Event.addListener(window, 'blur', F._window_onblur);
YAHOO.util.Event.addListener(window, 'focus', F._window_onfocus);
YAHOO.util.Event.addListener(window, 'unload', F._window_onunload);

</script>
<script type="text/javascript">
var global_joinDate = F.convert_unix_time_stamp('1187239590');
var global_time_stamp = '081117102113';


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
var _api_root = _site_root;
var _bytes_used = parseFloat("106617");
var _bytes_left = parseFloat("104750983");
var _show_tooltips = "0";
var _use_stats = "0";
var _default_content_type_restricted = 0;
var _meringue_mode = 0;
var _upload_max_photo_size = _upload_Total_max_limit;
var _upload_max_video_size = _upload_Total_max_limit;
var _video_offline = false;
var _upload_api_root = _site_root;
</script>
<script type="text/javascript" src="index_files/element-beta_2.js"></script>
<script type="text/javascript" src="index_files/upload.js"></script>
<script type="text/javascript" src="index_files/ylc_1.js"></script>
<script language="javascript">

function ult_upgrade_click(code)
{
  YAHOO.ULT.beacon_click({'tm_lnk': code, 'tm_ppty':'photos', 'tm_dmech':'text', 'tm_net':'yahoo'});
  return false;
}

</script>
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
  <div id="bandwidth" class="usage" style="display:none;">
    <p id="bandwidth-left">You've used <span id="bandwidth-used">0%</span> of your 100 MB limit this month - that leaves <span id="bandwidth-left">99.9 MB</span>. <a href="/upgrade/" onClick="ult_upgrade_click('U1101256');">Upgrade</a>?</p>
  </div>
  <div id="uploadr" class="step1">
    <div id="upload-flash-box"></div>
    <!-- step 1 -->
    <div class="step1">
      <div class="instructions">
        <ul class="instructions">
          <li id="step1" class="enabled">
            <p>Step 1:</p>
            <div class="enabled"><a id="upload-add-files" href="/photos/upload/basic/">Select your Files</a></div>
            <div class="disabled"><a href="/photos/upload/basic/">Choose photos</a></div>
            <div class="feature-note" style="display:none;">Did you hear? With a pro account, you can upload video to Flickr now! <a href="/help/video/" style="font-weight:normal">Learn more about video</a>...</div>
          </li>
          <li>
            <p>Step 2:</p>
            <div><span>Upload files</span></div>
          </li>
        </ul>
      </div>
      <!-- /step 1 -->
    </div>
    <script type="text/javascript">
 disableChoosePhotos();
</script>
    <!-- step 2 -->
    <div class="step2">
      <div id="uploadr-messages" class="uploadr-messages">
        <ul>
          <li id="upload-oversize" class="oversize warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
            <p style="color:#CC3333"><strong>Your %filecount file(s)</strong> exceed <strong><script type="text/javascript">document.write(_upload_Total_max_limit);</script> MB Total</strong> upload limit, and will not be uploaded. Please remove some files.</span></p>
            <div class="clear"></div>
          </li>
          <li id="upload-no-video" class="no-video warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
            <p>Hey adnan2001 - You can only upload video to Flickr if you have a pro account. Would you like to <a href="/upgrade/">Upgrade?</a> </p>
            <div class="clear"></div>
          </li>
          <li id="upload-overlimit" class="overlimit warn"> <img src="http://l.yimg.com/g/images/upload/icon-exclamation-large.gif" />
           <p style="color:#CC3333"><strong>Your %filecount file(s)</strong> exceed <strong><script type="text/javascript">document.write(_upload_Total_max_limit);</script> MB Total</strong> upload limit, and will not be uploaded. Please remove some files.</span></p>
            <div class="clear"></div>
          </li>
        </ul>
      </div>
      <div id="wholeform">
        <!-- upload form -->
        <form action="about:blank" method="post" onSubmit="return false" id="upload_form">
          <div id="upload-container" class="upload-container free">
            <div class="upload-table-wrapper">
              <div id="upload-table" class="upload">
                <div class="head">
                  <ul>
                    <li>
                      <div class="name">File</div>
                      <div class="size" style="width:100px; text-align:center;">Title*</div>
                      <div class="size" style="width:100px; text-align:center;">Tags</div>
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
                        <div class="size" style="width:100px; text-align:left; margin-right:20px;"><input style="width:100px; border: 1px solid #CCCCCC;" name="fileTitle[]" type="text"><span class="icon"></span></div>
                        <div class="size" style="width:100px; text-align:left; margin-right:20px;"><input style="width:100px; border: 1px solid #CCCCCC;" name="fileTags[]" type="text"><span class="icon"></span></div>
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
                    <p class="default"><a id="start-upload" class="bab" onClick="return false"><strong>Upload Videos</strong></a></p>
                  </div>
                  <p class="default-only cancel-upload" style="clear:left;position:relative">
                    <!-- pos:rel for Safari redraw fix -->
                    Or, <a href="index.php">cancel</a> and go to Home page.</p>
                </div>
                <!-- post-upload messages -->
                <div id="uploadr-complete-messages" class="uploadr-messages">
                  <ul>
                    <li id="uploadr-ok" class="ok">
                      <p><img src="http://l.yimg.com/g/images/upload/circle-checkmark-ok.png" /><strong>Finished!</strong> Next: <a href="watch_videos.php">watch your videos</a> or <a href="index.php">Upload more videos</a></p>
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
      </div>
      <!-- /upload form -->
    </div>
  </div>
  <script type="text/javascript">
showBandwidthNotice();
</script>
</div>
<script type="text/javascript">
try{
	if (window.personmenu_init) personmenu_init(1);
} catch(er) {}

</script>
</body>
</html>
