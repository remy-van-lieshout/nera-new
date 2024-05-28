<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "k_90KPwItp[oz0p.";
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

function GetWishCountAndWish($id)
{
    $conn = OpenCon();

    $sql = "SELECT * FROM wens WHERE weId = $id LIMIT 1";
    $result = $conn->query($sql);
    $wish = $result->fetch_assoc();
    $beschrijving = $wish['weBeschrijving'];

    $sql2 = "SELECT COUNT(*) as total FROM wens WHERE weBeschrijving = '$beschrijving'";
    $result2 = $conn->query($sql2);
    $count = $result2->fetch_assoc();

    if ($result->num_rows > 0 && $result2->num_rows > 0) {
        CloseCon($conn);
        return array($count['total'], $wish);
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
    if ($checkedValue == 1){
      $sql = "UPDATE wens SET weChecked = !$checkedValue, weUser = '' WHERE weId = $id";
    }

    if ($conn->query($sql) === TRUE) {
        CloseCon($conn);
        CreateLog('setWishChecked_' . $id . '_to:' . $checkedValue, $user, true, '');
        list($count, $wish) = GetWishCountAndWish($id);
        if ($checkedValue == 0 && (int)$count < (int)$wish['weMax']){
          AddWish($user, $wish['weBeschrijving'], $wish['weUrl'], $wish['weMax']);
        }
        if ($checkedValue == 1 && (int)$count > 1){
          DeleteWish($id, $user);
        }

        return true;
      } else {
        $error = $conn->error;
        echo "Error updating record: " . $error;
        CloseCon($conn);
        CreateLog('setWishChecked_' . $id . '_to:' . $checkedValue, $user, false, $error);
        return false;
      }
}

function AddWish($user, $beschrijving, $url, $max)
{
    $conn = OpenCon();

    $sql = "INSERT INTO wens VALUES (NULL, '$beschrijving', '$url', false, '', '$max')";

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
