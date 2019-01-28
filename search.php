<?php

include("config.php");
include("classes/SiteResultsProvider.php");

if(isset($_GET["term"])) $term = $_GET["term"];
else exit("You must type a search term...");

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Search the web for sites and images.">
    <meta name="keywords" content="Dig-Out, Dig, Out, Search Engine, Search, Websites, Images">
    <meta name="author" content="Mahmudul Hasan Sreejon">

    <title>Dig-Out</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
</head>

<body>

    <div class="wrapper">
        <div class="header">
            <div class="headerContent">
                <div class="logoContainer">
                    <a href="index.php">
                        <img src="assets/img/search-page-logo.png" title="Dig-Out">
                    </a>
                </div>

                <div class="searchContainer">
                    <form action="search.php" method="GET">
                        <div class="searchBarContainer">
                            <input type="text" class="searchBox" name="term" value="<?php echo $term; ?>">
                            <button class="searchButton">
                                <img src="assets/img/icons/search-icon.png">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tabsContainer">
                <ul class="tabList">
                    <li class="<?php echo($type == 'sites' ? 'active' : ''); ?>">
                        <a href='<?php echo("search.php?term=$term&type=sites"); ?>'>Sites</a>
                    </li>

                    <li class="<?php echo($type == 'images' ? 'active' : ''); ?>">
                        <a href='<?php echo("search.php?term=$term&type=images"); ?>'>Images</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="mainResultsSection">
            <?php

            $resultsProvider = new SiteResultsProvider($conn);

            $numResults = $resultsProvider->getNumResults($term);

            echo "<p class='resultsCount'>$numResults results found</p>";

            echo $resultsProvider->getResultsHtml(1, 20, $term);

            ?>
        </div>

    </div>

</body>
</html>
