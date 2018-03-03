<?php
if(isset($_POST['submit']))
{
//	header('Content-Type: image/jpeg');

	$name=$_POST['name'];
	$award=$_POST['award'];
	
	date_default_timezone_set("Asia/kolkata");

	$dt=time();
	$date=date("ymdHis",$dt);
	$date_string=date("d-m-Y",$dt);
	$date_time=date("d-m-Y H:i:s",$dt);
	$src="src/certificate.jpg";
	$save_locaton="images/";
	
	$save_locaton.=$name;
	$save_locaton.=$date;
	$save_locaton.=rand(1,10000);
	$save_locaton.=".jpg";

	$img=imagecreatefromjpeg($src);
	
	
	//date 
	$fontsize=14;
	$rotation=0;
	$black=imagecolorallocate($img,0,0,0);
	$y_origin=478;
	$x_origin=518;
	$font="fonts/XeroxSansSerifWide Oblique.ttf";
	
	$text=imagettftext($img,$fontsize,$rotation,$x_origin,$y_origin,$black,$font,$date_string);
	
	//name
	$fontsize=20;
	$fontsizeInPT=$fontsize*3/4;
	$len=strlen($name);
	$x_origin=ceil((800-$len*$fontsizeInPT)/2);
	$y_origin=240;
	$text=imagettftext($img,$fontsize,$rotation,$x_origin,$y_origin,$black,$font,$name);
	
	//is awarded for
	
	$fontsize=24;
	$fontsizeInPT=$fontsize*3/4;
	$len=strlen("is awarded this certificate for");
	$font2="fonts/GreatVibes-Regular.otf";
	$x_origin=ceil((800-$len*$fontsizeInPT)/2)+140;
	$y_origin=$y_origin+50;
	$text=imagettftext($img,$fontsize,$rotation,$x_origin,$y_origin,$black,$font2,"is awarded this certificate for");

	//why awarded
	
	$fontsize=20;
	$fontsizeInPT=$fontsize*3/4;
	$len=strlen($award);
	$x_origin=ceil((800-$len*$fontsizeInPT)/2);
	$y_origin=$y_origin+50;
	$text=imagettftext($img,$fontsize,$rotation,$x_origin,$y_origin,$black,$font,$award);
	
	imagejpeg($img,$save_locaton,99);
	//imagejpeg($img);
	
		
		//insert path into database		
		$con=mysqli_connect("localhost","id4939487_certifyme","12345","id4939487_dummy");
		$sql="INSERT INTO certificates (name,award,date,path) VALUES ('".$name."','".$award."','".$date_time."','".$save_locaton."');";
		mysqli_query($con,$sql);
		
			
			
			echo "
                         <img src='$save_locaton'> 
                  ";
	
}
?>


