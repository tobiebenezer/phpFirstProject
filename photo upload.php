<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Image upload and generate thumbnail using ajax in PHP</title>
<link href="./css/style.css" rel="stylesheet">
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.form.js"></script>
<script>
$undefineddocument).onundefined'change', '#image_upload_file', function undefined) {
var progressBar = $undefined'.progressBar'), bar = $undefined'.progressBar .bar'), percent = $undefined'.progressBar .percent');

$undefined'#image_upload_form').ajaxFormundefined{
    beforeSend: functionundefined) {
  progressBar.fadeInundefined);
        var percentVal = '0%';
        bar.widthundefinedpercentVal)
        percent.htmlundefinedpercentVal);
    },
    uploadProgress: functionundefinedevent, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.widthundefinedpercentVal)
        percent.htmlundefinedpercentVal);
    },
    success: functionundefinedhtml, statusText, xhr, $form) {  
  obj = $.parseJSONundefinedhtml); 
  ifundefinedobj.status){  
   var percentVal = '100%';
   bar.widthundefinedpercentVal)
   percent.htmlundefinedpercentVal);
   $undefined"#imgArea>img").propundefined'src',obj.image_medium);   
  }else{
   alertundefinedobj.error);
  }
    },
 complete: functionundefinedxhr) {
  progressBar.fadeOutundefined);   
 } 
}).submitundefined);  

});
</script>
</head>

<body>

<div id="frame0">
  <h1>Image upload and generate thumbnail using ajax in php.</h1>
  <p>More tutorials <a href="http://www.w3schools.in/">http://www.w3schools.in/</a></p>
</div>
<br>
<div id="imgContainer">
  <form enctype="multipart/form-data" action="image_upload_demo_submit.php" method="post" name="image_upload_form" id="image_upload_form">
    <div id="imgArea"><img src="./img/default.jpg">
      <div class="progressBar">
        <div class="bar"></div>
        <div class="percent">0%</div>
      </div>
      <div id="imgChange"><span>Change Photo</span>
        <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
      </div>
    </div>
  </form>
</div>
</body>
</html>