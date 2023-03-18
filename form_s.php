<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
	$comment=$_POST['Message'];
  $day1=$_POST['day1'];
  $day2=$_POST['day2'];
	$day3=$_POST['day3'];
	$day4=$_POST['day4'];
  $day5=$_POST['day5'];
  $contact=$_POST['radio'];
  $shift1=$_POST['shift1'];
  $shift2=$_POST['shift2'];
  

  $field1="<b>Day of appointment:</b> ".$day1.",".$day2.",".$day3.",".$day4.",".$day5;
  $field2="<b>Best way to contact:</b> ".$contact;
  $field3="<b>Best time for contact:</b> ".$shift1.",".$shift2;
  $field4="<b>Message:</b> ".$comment;
  

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email,'field_1'=>$field1."<br>".$field2."<br>".$field3."<br>".$field4);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>