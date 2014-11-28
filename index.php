<?php //index.php_Image Uploader
echo <<<_END
<html>
<head>
  <title>Ajax Image Upload</title>
  <script src="script.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <Script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js" ></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>

</head>

<body>
  <div class="container-main">
  <h1>PHP Image Uploader</h1>
  <p>A simple php image uploader</p>

  <form action="index.php" method="post" id="myForm"
  enctype="multipart/form-data">
  <label for="file">Filename:</label>
  <input type="file" name="file" id="file"><br>
  <input type="submit" name="submit" class="btn btn-success" value="Upload">
  </form>

  <div class="container-image">

_END;

if ($_FILES)
{
  $name = strtolower(ereg_replace("[^A-Za-z0-9.]", "", $_FILES['file']['name']));

  switch($_FILES['file']['type'])
  {
    case 'image/jpeg': $ext = 'jpg'; break;
    case 'image/pjpeg': $ext = 'jpg'; break;
    case 'image/gif': $ext = 'gif'; break;
    case 'image/png': $ext = 'png'; break;
    case 'image/tiff': $ext = 'tif'; break;
    default:
    $ext = '';
    break;
  }
  if ($name==NULL){
    echo "<strong>No file has been chosen</strong>";
  }
  elseif ($ext)
  {
    $upload_dir='upload/';
    $upload_link="<a href=$upload_dir/$name>$name</a>";

    move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.$name);

      echo "<img src=upload/$name><br /><br /><strong>Uploaded image:</strong> $upload_link<br />";
      echo "<strong>Content type:</strong> ".$_FILES['file']['type']."<br />";
      echo "<strong>File size:</strong> ".$_FILES['file']['size']." bytes <br />";

  }
  else echo "$name is not an accepted image file. Select a <em>JPG, GIF, PNG or TIF<?em> file.";
}

echo <<<_END

  </div>
  </div>
  </div>

</body>
</html>
_END;

?>
