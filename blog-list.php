<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>
<!--- banner ---->
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Блог</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">
    <?php
$apiKey = 'YOUR_API_KEY'; // Replace 'YOUR_API_KEY' with your actual API key

// URL to the News API endpoint
$url = 'https://newsapi.org/v2/everything?' .
       'q=tesla&' . // Query for articles related to Tesla
       'from=2024-02-22&' . // Start date for articles
       'sortBy=publishedAt&' . // Sort articles by published date
       'apiKey=' . $apiKey;

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Decode JSON response
$newsData = json_decode($response, true);

// Check if request was successful
if($newsData['status'] == 'ok') {
    // Loop through articles and do something with them
    foreach($newsData['articles'] as $article) {
        echo $article['title'] . "<br>";
        echo $article['description'] . "<br>";
        echo $article['url'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle API error
    echo "Error fetching news: " . $newsData['message'];
}
?>

			
		
		
		</div>
	</div>
</div>
<!--- /rooms ---->
<br>
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>	
<?php include('includes/profile.php');?>		
<!-- //write us -->
</body>
</html>