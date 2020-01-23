<?php 
//Browser tab title info
$title=$type." Sign Up";
//Direct to this pages css file
$css="signup.css";
//Custom nav information
$nav=$type." Sign Up";
//Custom Body Size for the Footer
$body="100vh";

//Generate antiforgery token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

//Pulls in the header partial.
require "views/partials/header.partial.php";

?>

<div class="row-1">
    <h1 class="gen-headers fg-primary"><?=$type?> Form</h1>
    <form action="/submit-form" method="post" class="form" id="submit">
        <table>
            <tbody>
                <!--Name Row-->
                <tr>
                    <td>
                        <input id="name" class="w3-input input" type="text" placeholder="First Name" name="name">
                    </td>
                    <td>
                        <input id="last" class="w3-input input" type="text" placeholder="Last Name" name="last">
                    </td>
                </tr>
                <!--Email Row-->
                <tr>
                    <td colspan="2">
                        <input id="email" class="w3-input input" type="text" placeholder="Email" name="email">
                    </td>
                </tr>
                <!--Other Info Row-->
                <tr>
                    <td colspan="2">
                        <textarea id="text" class="w3-input input" rows="5" placeholder="Information you wish to include..."
                            name="info"></textarea>
                    </td>
                </tr>
                <!--Submit Stuff Row-->
                <tr>
                    <td style="padding: 0 3em;">
                        <button type="button" onclick="formSubmit()" class="button-Shadow submit">Submit</button>
                    </td>
                    <td>
                        <label style="cursor: pointer; font-size: 2em;">
                            <input type="checkbox" name="human"> Check if Human.
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php //Comment in PHP so that it is not too obvious.  But these two hold the type of sign up
              //and the anti forgery token.  ?>
        <input style="display:none;" name="token" value="<?=$token;?>">
        <input style="display:none;" type="text" name="type" value="<?=$type;?>">
    </form>
    <p id="result"><?=$result;?></p>
</div>


<?php require "views/partials/footer.partial.php";?>