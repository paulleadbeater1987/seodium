<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PottaSEOdium</title>

    <!-- Website CSS -->
	<link rel="stylesheet" href="index.css" />

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    
</head>

<body>

<?php require_once 'functions/post_form.php'; ?>

<form id="post_form" method="post">
    <h2>PottaSEOdium</h2>

    <div class="col-sm-6">
        <label for="name">Your Name</label>
        <input id="contact_name" type="text" name="name" placeholder="Your Name" />
    </div>

    <div class="col-sm-6">
        <label for="name">Email Address</label>
        <input id="contact_email" type="email" name="email" placeholder="Email Address" />
    </div>

    <div class="col-sm-6">
        <label for="dateofbirth">Date of Birth</label>
        <input id="contact_dateofbirth" type="date" name="dateofbirth" />
    </div>

    <!-- Display validation or success message -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info col-sm-6" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="col-sm-6">
        <input id="submit" value="Submit" type="submit" name="submit" />
    </div>

    <div class="col-sm-6">
        <?php 
        // Display the raffle winner's message and bear dance GIF if the ID ends in 0 or 5
        foreach($users as $user) : 
            if (in_array(substr((string)$user['id'], -1), ['0', '5'])) :
                echo '<h1>YOU\'VE WON THE PottaSEOdium ID RAFFLE!!</h1>';
                echo '<span>Only YOU and ONE OTHER...may click <a id="show_bear_dance" href="">HERE</a> to see A BEAR DANCE FOR YOU...</span>';
                echo '<img id="bear_dance" src="bear-dance.gif" alt="dancing bear" />';
            endif; 
        endforeach;
        ?>
    </div>

</form>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Website JS -->
    <script type="text/javascript" src="index.js"></script>
</body>

</html>