<?php




// 1. Minification: Makes the code a single, unreadable line if viewed
ob_start(function($buffer) {
    // Removes all line breaks and extra spaces
    $search = ['/\s+/S', '/<!--(.|\s)*?-->/'];
    $replace = [' ', ''];
    return preg_replace($search, $replace, $buffer);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protected Content</title>
<div id="hidden-section">Loading...</div>
<script>
  fetch('cc.php')
    .then(response => response.text())
    .then(data => document.getElementById('hidden-section').innerHTML = data);
</script>

</head>
<body>
</body>
</html>
<?php 
// 2. Finalize: Flush the minified output to the browser
ob_end_flush(); 
?>
