<?php

require 'includes/function.inc.php';

$request = (string) readline("Do you want the result to directly send it to student(y/n): ");

if ($request == "y" || $request == "yes") {
  $email = (string) readline("Enter your Email address: "); //getting the email address of the student

  if (invalidemail($email) !== false) { //checking the formate of email is correct or not
    echo 'incorrect email address';
    exit;
  }
}

$name = (string) readline("Name of student: "); //getting the name of the student
$rollno = (int) readline("Roll number of student: ");

//total marks in each subject
$istotal = 50;
$totalcomp = 60;
$totaleng = 75;
$totalphys = 60;
$totalmath = 75;
$totalurdu = 75;


//getting the obtain number and doing calculations
$comp = (int) readline("Marks gained in computer (..\ " . $totalcomp . "): ");
$percomp = ($comp / $totalcomp) * 100;
echo "percentage in computer ", $percomp, "%", "\n";
$eng = (int) readline("Marks gained in English (..\ " . $totaleng . "): ");
$pereng = ($eng / $totaleng) * 100;
echo "percentage in English ", $pereng, "%", "\n";
$physics = (int) readline("Marks gained in Physics  (..\ " . $totalphys . "): ");
$perphysics = ($physics / $totalphys) * 100;
echo "percentage in physics ", $perphysics, "%", "\n";
$math = (int) readline("Marks gained in Math (..\ " . $totalmath . "): ");
$permath = ($math / $totalmath) * 100;
echo "percentage in math ", $permath, "%", "\n";
$Is = (int) readline("Marks gained in Islamiat (..\ " . $istotal . "): ");
$peris = ($Is / $istotal) * 100;
echo "percentage in Islamiat ", $peris, "%", "\n";
$Urdu = (int) readline("Marks gained in Urdu (..\ " . $totalurdu . "): ");
$perurdu = ($Urdu / $totalurdu) * 100;
echo "percentage in urdu ", $perurdu, "%", "\n";

$totalnumbersobtain = ($comp + $eng + $physics + $math + $Is + $Urdu);
$totalmarks = ($istotal + $totalcomp + $totaleng + $totalmath + $totalphys + $totalurdu);
$totalper = ($totalnumbersobtain / $totalmarks) * 100;



//Sending mail with result to student


if ($request == "y" || $request == "yes") {
  require 'PHPMailer/index.php';


  $to = $email;

  $subject = 'Result card to ' . $name . ' provided by PUNJAB BOARD';


  $message .= '
    
    <h3>Here is your Result card</h3>
    <p>Name : ' . $name . ' &nbsp;&nbsp;&nbsp; Roll# : ' . $rollno . '</p>
    <p></p>
    <p 
    style:table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even) {
        background-color: #dddddd;
      }
      ;>';

  $message .= '<table>
    <tr>
      <th>Subjects</th>
      <th>Marks gained</th>
      <th>percentage</th>
    </tr>
    <tr>
      <td>Computer</td>
      <td>' . $comp . '</td>
      <td>' . $percomp . '</td>
    </tr>
    <tr>
      <td>English</td>
      <td>' . $eng . '</td>
      <td>' . $pereng . '</td>
    </tr>
    <tr>
      <td>Physics</td>
      <td>' . $physics . '</td>
      <td>' . $perphysics . '</td>
    </tr>
    <tr>
      <td>Urdu</td>
      <td>' . $Urdu . '</td>
      <td>' . $perurdu . '</td>
    </tr>
    <tr>
      <td>Is</td>
      <td>' . $Is . '</td>
      <td>' . $peris . '</td>
    </tr>
    <tr>
      <td>Math</td>
      <td>' . $math . '</td>
      <td>' . $permath . '</td>
    </tr>

    <br>
    <tr>
    <th>Marks gained</th>
    <th>Total Marks</th>
    <th>Total percentage</th>
  </tr>
  <tr>
    <td>' . $totalnumbersobtain . '</td>
    <td>' . $totalmarks . '</td>
    <td>' . $totalper . '</td>
  </tr>
  <tr>
  </table>';
  $header = "From: Thetopbloggers <ahmadmujtabap72@gmail.com> \r\n";
  $header .= "Reply-To: ahmadmujtabap72@gmail.com \r\n";
  $header .= "Content-type: text/html\r\n";


  mmail($to, $subject, $message, $header);
  echo "Email with the result is sent to the student";
}

?>