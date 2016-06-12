<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Image Uploader</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	</head>
	<body>

    <?
    if($_SERVER['REQUEST_METHOD']=="POST"){

      include_once("classImage.php");

      $model="cars";

      // create the folder path
      if (!is_dir("system/")){mkdir("system/", 0777);}
      if (!is_dir("system/".date("Y"))){mkdir("system/".date("Y"), 0777);}
      if (!is_dir("system/".date("Y")."/".$model)){mkdir("system/".date("Y")."/".$model, 0777);}

      // get the image type
      if($_FILES["filepic"]["type"]=='image/gif'){$extension=".gif";}
      if($_FILES["filepic"]["type"]=='image/pjpeg'){$extension=".jpg";}
      if($_FILES["filepic"]["type"]=='image/jpeg'){$extension=".jpg";}
      if($_FILES["filepic"]["type"]=='image/bmp'){$extension=".bmp";}
      if($_FILES["filepic"]["type"]=='image/x-png'){$extension=".png";}
      if($_FILES["filepic"]["type"]=='image/png'){$extension=".png";}

      // create image path
      $path="system/".date("Y")."/".$model."/".time().$extension;

      // load the image
      $image = new SimpleImage();
      $image->load($_FILES['filepic']['tmp_name']);
      $image->resize(158,135);
      $image->save($path);
    };
    ?>

    <div class="container">

  		<form action="" method="POST" role="form" enctype="multipart/form-data">

  			<div class="form-group">
  				<label for="">Select image</label>
  				<input type="file" class="form-control" id="filepic" name="filepic" required="true">
  			</div>

  			<button type="submit" class="btn btn-primary">Upload</button>
  		</form>

    </div>
	</body>
</html>
