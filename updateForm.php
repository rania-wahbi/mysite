<!-- <?php
require_once 'includes/config_session.inc.php';
// if( isset($_SESSION["user_id"])){
//     header("location:welcome.php");
// }
require_once 'includes/update/update_view.inc.php';
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update</title>
</head>

<body>

    <div class="container p-5 my-5 border ">

        <h3>update</h3>
        <form action="includes/update/update.inc.php" method="POST">
            <?php update_inputs(); ?>
            <button class="btn btn-primary" type="submit" name="update_button">update</button>
            <a href="welcome.php">back</a>
        </form>
    </div>


    <?php check_update_errors(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html> -->