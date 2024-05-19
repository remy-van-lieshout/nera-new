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
        CloseCon($conn);
        return $result;
    } else {
        CloseCon($conn);
        echo "0 results";
    }
}

function SetWishChecked($id, $user, $checkedValue)
{
    $conn = OpenCon();

    // UPDATE `wens` SET `weChecked` = '1' WHERE `wens`.`weId` = 3;
    $sql = "UPDATE wens SET weChecked = !$checkedValue, weUser = '$user' WHERE weId = $id";

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        CreateLog('setWishChecked_' . $id . '_to:' . $checkedValue, $user, true, '');	
        return true;
      } else {
        $error = $conn->error;
        echo "Error updating record: " . $error;
        CloseCon($conn);
        CreateLog('setWishChecked_' . $id . '_to:' . $checkedValue, $user, false, $error);
        return false;
      }
}

function AddWish($user, $beschrijving, $url)
{
    $conn = OpenCon();

    $sql = "INSERT INTO wens VALUES (NULL, '$beschrijving', '$url', false, NULL)";

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        CreateLog('addWish_' . $beschrijving, $user, true, '');	
        return true;
      } else {
        $error = $conn->error;
        echo "Error updating record: " . $error;
        CloseCon($conn);
        CreateLog('addWish_' . $beschrijving, $user, false, $error);
        return false;
      }
}

function DeleteWish($id, $user)
{
    $conn = OpenCon();

    $sql = "DELETE FROM wens WHERE weId = $id";

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        CreateLog('deleteWish_' . $id, $user, true, '');	
        return true;
      } else {
        $error = $conn->error;
        echo "Error updating record: " . $error;
        CloseCon($conn);
        CreateLog('deleteWish_' . $id, $user, false, $error);
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
