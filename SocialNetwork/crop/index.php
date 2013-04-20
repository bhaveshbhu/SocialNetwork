<?php 

$scripts = '  <script type="text/javascript" src="lib/prototype.js"></script>
  <script type="text/javascript" src="lib/scriptaculous.js"></script>
  <script type="text/javascript" src="lib/init_wait.js"></script>';

include 'header.php' ?>

  <div class="info">
    <h1>JavaScript Crop and Resize Images</h1>

        <p>Current filesize limit is <strong>1 Mb</strong>, you can change that as you see fit.</p>

    <form action="crop_image.php" method="post" name="imageUpload" id="imageUpload" enctype="multipart/form-data">
    <fieldset>
      <legend>Upload Image</legend>
      <input type="hidden" class="hidden" name="max_file_size" value="10240000" />
      <div class="file">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" />
      </div>
      <div id="submit">
        <input class="submit" type="submit" name="submit" value="Upload" id="upload" />
      </div>
      <div class="hidden" id="wait">
        <img src="images/wait.gif" alt="Please wait..." />
      </div>
    </fieldset>
    </form>

  </div> <!-- /info -->

<?php include 'footer.php' ?>
