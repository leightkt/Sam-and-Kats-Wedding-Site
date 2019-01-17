<?php
	require_once"pdo.php";
	session_start();

	if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to index.php
    header("Location: index.html");
    return;
}

if ( isset($_POST['title']) || isset($_POST['artist']) || isset($_POST['request_by']) ) {
	if ( strlen($_POST['title']) < 1 || strlen($_POST['artist']) < 1 || strlen($_POST['request_by']) < 1 ) {
	$_SESSION['error'] = "All Fields are Required";
	header("Location: music.php");
	return;
	} else {
		$_SESSION['success'] = "Song Request Added. Thank you!";
		$stmt = $pdo->prepare('INSERT INTO playlist (title, artist, request_by) VALUES ( :tit, :art, :rb)');
    	$stmt->execute(array(
        		':tit' => htmlentities($_POST['title']),
        		':art' => htmlentities($_POST['artist']),
        		':rb' => htmlentities($_POST['request_by']))
        	);
    	header("Location: music.php");
		return;
	}
}

$stmt = $pdo->query("SELECT title, artist, request_by FROM playlist");

?>

<html>
<head>
<title>Song Requests</title>
</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300|Raleway|Dancing+Script" rel="stylesheet">
<style type="text/css">
@media screen and (min-width:481px) {	  
       	body {
	    background-image: url(https://i.pinimg.com/736x/0f/30/ac/0f30acb683ad19fee08199483fb0367e--winter-nature-photography-mountain-photography.jpg);
	    background-repeat: no-repeat;
	    background-position: center top;
            background-attachment: fixed;
            background-color: gray;
        }
	
	h1 {
	    font-family: 'Dancing Script', sans-serif;
	    font-size: 4.5em;
	    color: rgb(0, 230, 184);
	    text-align: center; 
	   }
	
	h2 {
	    font-family: 'Open Sans', sans-serif;
	    font-size: 2.250em; 
	    color: white; 
	    text-align: center; 
	    border-bottom: 1px solid white;
	}
	
	h3 { 
	    font-family: 'Open Sans', sans-serif;
	    color: white;
	    text-align: center;
	}
	
	h4 {
	    font-family: 'Raleway', sans-serif;
	 }
	 
	
	h5 {
	    font-family: 'Open Sans Condensed', sans-serif;
	}
	
	p {
	    font-family: 'Open Sans', sans-serif;
	}
	
	
	thead {
	    font-family: 'Raleway', sans-serif;
	}
	
		
	tbody {
	    font-family: 'Open Sans', sans-serif; 
	}
	
	ul {
    	    list-style-type: none;
    	    margin-top: 0; 
    	    margin-bottom: 0;
    	    margin-left: 14em;
    	    margin-right: 5em;
    	    padding: 0;
    	    overflow: hidden;
    	}

	li {
    	    float: left; 
    	    font-family: Raleway; 
	}

	li a {
	    display: block;
    	    color: white;
   	    text-align: center;
    	    padding: 14px 16px;
    	    text-decoration: none;
	}

	li a:hover {
    	    background-color: rgb(237,185,46);
	}
	
	th {
	    color: black;
	    text-align: center;
	    width: 30em; 
	    border-bottom: 1px solid white;
		    
	}
	
	td{
	    text-align: center; 
	}
	
	 #back a{
	    display: block;
    	    color: white;
   	    text-align: center;
    	    padding: 14px 16px;
    	    text-decoration: none;
    	    width: 100px;
    	    margin: auto; 
	}
	
	#back a:hover {
    	    background-color: rgb(237,185,46);  
	}
	
	#song-chart {
	    position: relative; 
	    z-index: 1; 
	    text-align: center;
	    margin: auto;  
	    max-width: 80%; 
	    padding-left: 4.0em; 
	    padding-right: 4.0em; 
	    padding-top: 2.0em;
	    padding-bottom: 50.0em; 
	    background-color: rgba(247, 247, 247, 0.5); 
	}
	    
	}
	
	input[type=text]:focus {
	    <!--background-color: rgb(237,185,46);-->
	    outline: none;
	    border: 3px solid rgb(237,185,46); 
	}
	
	form p {
	    color: white;
	}
	
	#dance-pic {
	     width: 25%; 
	     position: absolute;
	     margin-left: 60em; 
	     	     
	}
	
	
	}
	
	
      @media screen and (max-width:480px) {
  /* CSS for screens that are 480 pixels or less will be put in this section */
       body {
            background-image: url(https://i.pinimg.com/736x/0f/30/ac/0f30acb683ad19fee08199483fb0367e--winter-nature-photography-mountain-photography.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-color: rgba(128, 128, 128, 0.10);
        }
        
        
                    
        h1 {
           font-family: 'Dancing Script', sans-serif; 
           color: rgb(0, 230, 184);
           text-align: center;
       }
       
       h2 {
	    font-family: 'Open Sans', sans-serif;
	    color: gray; 
	    text-align: center; 
	    border-bottom: 1px solid gray;
       }
	    
       h3 { 
	    font-family: 'Open Sans', sans-serif;
	    color: rgb(0, 230, 184);
       }
	           
       h4 {
	    font-family: 'Raleway', sans-serif;
	 }
	 
	h5 {
	    font-family: 'Open Sans Condensed', sans-serif;
	}
	
	p {
	    font-family: 'Open Sans', sans-serif;
	}
	
	thead {
	    font-family: 'Raleway', sans-serif;
	    text-align: center; 
	}
	
	tbody {
	    font-family: 'Open Sans', sans-serif;
	}
       
       
        
       #nav-mobile {
           text-align: center;
       }
       
       ul { 
           list-style-type: none;
           display: inline-block; 
           text-align: left; 
       }
       
       li a {
	    display: block;
    	    color: gray;
   	    text-align: left;
    	    padding: .10em .10em;
    	    text-decoration: none;
	}   
	 
	#back a{
	    display: block;
    	    color: white;
   	    text-align: center;
    	    padding: 14px 16px;
    	    text-decoration: none;
    	    width: 100px;
    	    margin: auto; 
	}
	
	#back a:hover {
    	    background-color: rgb(237,185,46);  
	}
	
	#song-chart {
	    text-align: center;
	}
	
	#dance-pic {
	     width: 25%; 
	}
	      
        }
</style>
	
</head>
<body>
	<h1>Sam and Kat</h1>
	<h2>Reception Music</h2>
<?php 
if ( isset($_SESSION['error']) ) {
	echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
		unset($_SESSION['error']);
}

if ( isset($_SESSION['success']) ){
	echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
		unset($_SESSION['success']);
}
?>
<img id="dance-pic" alt="Sam and Kat Dance" src="/dance.jpg">

	<p>What will get you up and moving on the dance floor? Help Us Build the Reception Playlist!</p>
	<p>Please submit your song requests using the form below:</p>

	<form method="post">
<p>Title:<input type="text" name="title"></p>
<p>Artist: <input type="text" name="artist"></p>
<p>Requested by:<input type="text" name="request_by"></p>
<p><input type="submit" name="Add" value="add"/> 
<input type="submit" name="cancel" value="Cancel"></p>

</form>



<h3>Song Requests</h3>

<div id="song-chart">

<?php
echo "<pre>";
echo ("<table>");
echo ("<tr>");
echo ("<th>Title</th>");
echo ("<th>Artist</th>");
echo ("<th>Requested by:</th>");
echo ("</tr>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	echo ("<tr><td>");
	echo htmlentities(($row['title']));
	echo ("</td><td>");
	echo htmlentities(($row['artist']));
	echo ("</td><td>");
	echo htmlentities(($row['request_by']));
	echo ("</td></tr>");
	}
	echo ("</table>\n");
	echo "</pre>";
?>
</div>



<h3 id="back"><a href="index.html">Back to the Base Camp!</a></h3>


</body>
</html>