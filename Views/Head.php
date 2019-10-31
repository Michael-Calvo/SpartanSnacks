<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    <?php
    // sets the location of the style files based on if we are on index or not
    if (basename($_SERVER['PHP_SELF']) == 'index.php') {
        echo "<link rel='stylesheet' type='text/css' href='/Styles/Stylesheet.css' />";
    } else {
        echo "<link rel='stylesheet' type='text/css' href='../Styles/Stylesheet.css' />";
    }
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <title><?php echo $title; ?></title>

</head>
