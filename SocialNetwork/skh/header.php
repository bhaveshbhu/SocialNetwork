<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="yoxview/yoxview-init.js">
             
    </script>
    <script type="text/javascript">
			$(document).ready(function(){
				$(".yoxview").yoxview({
                    //skin: "top_menu",
                    allowInternalLinks: true
				});
			});
		</script>
                <style>
                    #mycontent{
                        top:90px;
                        left: 100px;
                        }
                </style>
    </head>
    <body>
        
        <?php
        include("connect.php");
        session_start();
        $qe = "SELECT comment from comm WHERE imageid =".$_SESSION['img'] ;
        $re = mysql_query($qe);
        ?>
        <div class="yoxview" id="comm"><a href='#mycontent'>Comments</a></div>
        <div id="mycontent" title="The element's title" style="display:none; height:200; width:100; overflow:auto; padding:15px "><table>
                <?php
                while($row1 = mysql_fetch_array($re))
                {
                    echo "<tr><td>".$row1['comment']."</td></tr>";
                }
                ?>
                <tr><td><input type="text" id="comm" /></td></tr>
            </table></div>
              <div class="thumbnails yoxview">
            <a href="#loremipsum"><img src="dp.png" alt="WHAT IS THE MATRIX?" /></a>
        </div>
        <div id="loremipsum" style="display: none; width:200px; height: 100px; background: White; overflow: auto; padding: 20px;">
			    <input type="text" id="inp" />
			</div>
    </body>
    
</html>
