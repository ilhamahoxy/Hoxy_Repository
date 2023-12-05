<!doctype html>  
  <html lang="en">
 <html>  
 <head>  
 <title>Wawan Cloud</title>  
   <meta charset="UTF-8">
    <title>CSS Background Image</title>
    <link rel="stylesheet" href="css/style.css" />
   
 <style>  
 html, body {font:15px Arial,Helvetica,sans-serif; color: darkslategrey;} 
 fieldset {border:1px solid #000000 ; width:100%;}  
 legend {border:1px solid #000000 ;}  
 table {border-collapse:collapse;width:100%;}  
 td, th {border:1px solid #c0c0c0;padding:5px;}  
 th{background: #C0C0C0 ;color:darkgreen;}  
 </style>  
   
   
 <script type="text/javascript">  
 function checkSize(max_img_size)  
 {  var input = document.getElementById("fileupload");  
   if(input.files && input.files.length == 1)  
   {  if (input.files[0].size > max_img_size)   
     { alert("Ukuran file harus di bawah "   
          + (max_img_size/102400/102400) + " MB");  
       return false;  
     }  
   }  
   return true;  
 }  
 </script>  
 </head>  
   
 <body bgcolor="black">  
 <marquee> <h2>Selamat Datang Di Wawan Cloud Upload & Download File</h2> </marquee><hr>  
 <form enctype="multipart/form-data" action="uploader.php" method="post" onsubmit="return checkSize(104857600);">  
 Masukan File Yang Ingin Anda Simpan Di Cloud <input name="uploadedfile" type="file" id="fileupload" />  
 <input type="submit" value="Upload File" />  
 </form><hr>  
   
 <table>  
 <tr>  
 <th>File Name</th>  
 <th>Upload Date</th>  
 <th>Type</th>  
 <th>Size</th>  
 <th>Delete</th>  
 </tr>  
   
 <?php
 if ($handle = opendir('./files/'))  
 {  while (false !== ($file = readdir($handle)))  
   {  if($file!=="." && $file !=="..")  
   {  echo "<tr><td><a href=\"download.php?id=" . urlencode($file). "\">$file</a></td>";  
     echo "<td>" . date ("d/m/Y H:m:s", filemtime("files/".$file)) . '</td>';  
     echo "<td>" . pathinfo("files/".$file, PATHINFO_EXTENSION) . ' file </td>';  
     echo "<td>" . round(filesize("files/".$file)/1024) . ' KB</td>';  
     echo "<td><a href=\"hapus.php?id=$file\">Del</a></td></tr>";  
     }  
   }  
   closedir($handle);  
 }  
 ?>  
   
 </table>  
 </body>  
 </html>  