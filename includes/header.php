<?php
// dirname($_SERVER['REQUEST_URI'])
// rtrim($_SERVER['DOCUMENT_ROOT'], '/') . dirname($_SERVER['PHP_SELF'])
// $get_url = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . dirname($_SERVER['PHP_SELF']);
// $base_url = substr($get_url, 0, 29) . "/websitething" . "/";
session_start();
$current_file = basename($_SERVER['PHP_SELF']);
$root_path = '';

if ($current_file != "index.php") {
    $root_path = '../';
}

$css = $root_path . 'css/styles.css';
$js = $root_path . 'js/app.js';
$index = $root_path . 'index';
$resume = $root_path . 'pages/resume';
$projects = $root_path . 'pages/projects';
$mywiki = $root_path . 'pages/mywiki';
$contact = $root_path . 'pages/contact';
?>


<!DOCTYPE>
<html lang="english">

<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css ?>" />
    <script src="<?php echo $js ?>" defer></script>
    <title>Cole Morrison | Software Engineering Portfolio</title>
</head>
</head>

<body>
    <nav class="navbar">
        <div class="navbar_container">
            <div class="navbar_logo">
                <h1>Cole Morrison | Software Engineering Portfolio</h1>
            </div>
            <ul class="navbar_list">
                <li class="navbar_list_element"><a href="<?php echo $index; ?>">HOME</a></li>
                <li class="navbar_list_element"><a href="<?php echo $resume; ?>">RESUME</a></li>
                <li class="navbar_list_element"><a href="<?php echo $projects; ?>">PROJECTS</a></li>
                <li class="navbar_list_element"><a href="<?php echo $mywiki; ?>">MYWIKI</a></li>
                <li class="navbar_list_element"><a href="<?php echo $contact; ?>">CONTACT</a></li>
            </ul>

            <div class="navbar_toggle_menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>
    <div class="body_content">