<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Certificate Repository</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style >
.jumbotron{background-color: coral;}
.jumbotron h2{color: #000000;}
@media (max-width:600px)
{
	.jumbotron h2{ font-size: 1.7em;}
}

</style>
</head>

<body>
	<div class="jumbotron text-center">
    	<h2 >Certificate Repository</h2>
    </div>
    <div class="container">
        <div class="text-center"
            <p><h3>You can create certificate for any award .</h3></p><br>
         </div>
         <ol>
         <h4>
        	<li >Select your name</li>
        	<li >Enter the field of the award</li>
            <li>Submit the form </li>
            <li>You can see your certificate and it will be saved to our server</li> 
            </h4>
        </ol>      
    </div>
    <div class="container">
    	<form  class="form-group" action="create.php" method="POST">
        
        <br><br>
    <h4>Select your name</h4>
		<select name="name" class="form-control">
            	<?php
				
					$con=mysqli_connect("localhost","id4939487_certifyme","12345","id4939487_dummy");
					$sql="SELECT * FROM users WHERE 1";
					$result=mysqli_query($con,$sql);
					while($row=$result->fetch_assoc())
					{
						echo "<option value='".$row['name']."'>".$row['name']."</option>";
					}
				
				?>
    	</select>
        <br>
        <h4>Why have you been awarded ? (Maximum character:35)</h4>
        <input  class="form-control" type="text" maxlength="30" name="award" placeholder="eg: android development , wordpress development" required>
        <br>
        <div class="text-center">
        <button type="submit" class="btn btn-default btn-danger" name="submit">Submit</button>
    	</div>
    </form>	 
    
    
    </div>
</body>
</html>