<?php
$user_name= $user_name['user_name'];
$email= $email['email'];
$mobile= $mobile['mobileno'];
$dharmik= $dharmik['dharmik'];

if(!empty($user_name) || !empty($email) || !empty($mobile) || 
!empty($dharmik)){
$host = "localhost";
$dbUsername="root";
$dbpassword="";
$dbname="kundali"

//create connection
$conn = new mysqli($host,$dbUsername,$dbpassword,$dbname)
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());

}
else{
    $SELECT = "SELECT email From register Where email=? Limit 1";
    $INSERT = "INSERT Into register (user_name, email, mobileno,dharmik ) values(?,?,?,?)";
    //prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnm = $stmt->num_rows;

if($rnum==0){
    $stmt ->close();

    $stmt=$conn ->prepare($INSERT);
    $stmt->bind_param("ssssii", $user_name, $email, $mobile, $dharmik);
    $stmt->execute();
    echo "New record inserted sucessfully";
} else{
    echo "Someone already register using this email";
}

$stmt->close();
$conn->close();
}
} else{
    echo
}
?>