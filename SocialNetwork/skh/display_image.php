<?php
//www.configure-all.com
//author: sergey skudaev
//04/08/06

print('<html>');
print('<head><title>Display Image PHP code example</title></head>');
print('<body>');
print('<h2>Display Image Example</h2>');
print('<p>When you display image using php script you have to ');
print('set mime type to image in header:</p>');
print("<p>header('Content-Type: image/jpeg');</p>");
print('<p>As a result you cannot display text on the same php page.<br>');
print('To get around this problem you can creade image ');
print('in one php template<br> and then use this php template in img src ');
print('html tag to display image <br>on a new page with text</p>');
print('<p>Like this</p><p>:&lt;img src="image.php" width=30%&gt;</p>');

print('<p><img src="image.php" width=30%></p>');
print('</body></html>');



?>