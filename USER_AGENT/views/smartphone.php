
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Smart Lock Survey</title>
</head>
<body class="smartphone">

<h1 style="text-align: center;">Your device model is :</h1>
<p id="devicemodel" style="text-align: center;">&nbsp;</p>
<button id="copy" class="copyB">Copy<span class="copiedtext" aria-hidden="true">Copied</span></button>
<p id="copied" style="text-align: center;">&nbsp;</p>
</body>
</html>
<script type="text/javascript" src="../scripts/ua-parser.min.js"></script>
<script type="text/javascript" src="../scripts/appleModel.js"></script>
<script type="text/javascript" src="../scripts/smartphonePHPscript.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
fill();
</script>