<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "xs!lb.Fu3lWN@Au3";
    $dbname = "nera";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function CloseCon($conn)
{
    $conn->close();
}

function GetWishList()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM wens";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        CloseCon($conn);
        return $result;
    } else {
        CloseCon($conn);
        echo "0 results";
    }
}

function SetWishChecked($id, $user)
{
    $conn = OpenCon();

    $sql = "UPDATE wens SET weChecked = true, weUser = '$user' WHERE weId = $id";

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        return true;
      } else {
        echo "Error updating record: " . $conn->error;
        CloseCon($conn);
        return false;
      }
}

function CreateLog($actie, $user, $succes, $error)
{
    $conn = OpenCon();

    $sql = "INSERT INTO log (LoActie, LoUser, LoSucces, LoError) VALUES ('$actie', '$user', '$succes', '$error')";

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        return true;
      } else {
        echo "Error creating record: " . $conn->error;
        CloseCon($conn);
        return false;
      }
}
