<?php
require('connect.php');

if(isset($_POST['twitch']) && isset($_POST['name']) && isset($_POST['message']) && isset($_POST['g-recaptcha-response']))
{
    $twitch = filter_input(INPUT_POST, 'twitch', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cres = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $secret = '6LdGvGUUAAAAANGD_Bb-_rgPSP1dspmyNogOdJak';

    try {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$cres);
        $responseData = json_decode($verifyResponse);

        if($responseData->success)
        {
            $query = "INSERT INTO entry (name, twitch, message) VALUES (:name, :twitch, :message)";
            $result = $db->prepare($query);
            $result->bindValue(':twitch', $twitch);
            $result->bindValue(':name', $name);
            $result->bindValue(':message', $message);

            if($result->execute()) {
                echo 'Entry Sucessful redirecting you back!';
                header('Location: ../index.html?y');
            }
            else
            {
                echo 'Entry failed. You may be seeing this because the user has already entered.';
                header('Location: ../index.html?n');
            }
        }
        else
        {
           header('Location: ../index.html?n');
        }
    }
    catch (HttpException $ex) {
        echo 'An error has occured';
    }
}
else
{
    header('Location: ../index.html');
}

?>
