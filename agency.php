<html>
    <head>
        <title>International Press Corps | PacificMUN</title>
        <meta name="title" content="International Press Corps | PacificMUN">
        <meta name="description" content="View articles written by delegates in the IPC Committee. Reporting on developments of the committees within PacificMUN 2020.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="pacificmun.png"/>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="agency">
        <header>
            <div class="utility">
                <div class="container">
                    <div class="name">
                        <a href="http://ipc.pacificmun.org">
                            <h2>PacificMUN IPC</h2>
                        </a>
                    </div>
                    <div class="links">
                        <a href="login.php"><i class="fa fa-sign-in-alt"></i> Staff Login</a>
                        <a href="tel:778.245.3794"><i class="fa fa-info-circle"></i> Report an Issue</a>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <a href="agency.php?agency=aljazeera">Al Jazeera</a>
                    <a href="agency.php?agency=bbc">BBC</a>
                    <a href="agency.php?agency=chinadaily">China Daily</a>
                    <a href="agency.php?agency=foxnews">Fox News</a>
                    <a href="agency.php?agency=nyt">New York Times</a>
                    <a href="agency.php?agency=globeandmail">The Globe and Mail</a>
                    <a href="agency.php?agency=onion">The Onion</a>
                    <a href="agency.php?agency=wsj">Wall Street Journal</a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <article>
                    <h1>
                        <?php
                            if ($_GET['agency'] === "all") {
                                echo 'All Articles';
                            } else {
                                if ($_GET['agency'] === "aljazeera") {
                                    echo 'Al Jazeera';
                                } else if ($_GET['agency'] === "bbc") {
                                    echo 'BBC';
                                } else if ($_GET['agency'] === "chinadaily") {
                                    echo 'China Daily';
                                } else if ($_GET['agency'] === "foxnews") {
                                    echo 'Fox News';
                                } else if ($_GET['agency'] === "nyt") {
                                    echo 'New York Times';
                                } else if ($_GET['agency'] === "globeandmail") {
                                    echo 'The Globe and Mail';
                                } else if ($_GET['agency'] === "onion") {
                                    echo 'The Onion';
                                } else if ($_GET['agency'] === "wsj") {
                                    echo 'Wall Street Journal';
                                }
                            }
                        ?></h1>
                    <h2>Articles</h2>
                    <div class="rows">
                        <?php
                            if ($_GET['agency'] === "all") {

                                include_once 'dbh.inc.php';

                                $sql = "SELECT id, title, author, date FROM Articles ORDER BY id DESC;";
                                $result = $conn->query($sql);
                                
                                if ($result-> num_rows > 0) {
                                    while ($row = $result-> fetch_assoc()) {
                                        echo '<div class="article-item">
                                            <h3>' . $row['title'] . '</h3>
                                            <h4>' . $row['author'] . '</h4>
                                            <h5>' . $row['date'] . '</h5>
                                            <a href="article.php?id=' . $row['id'] . '">Read More</a>
                                        </div>';
                                    }
                                } else {
                                    echo 'No Articles Yet';
                                }

                            } else {
                                $author = "na";

                                if ($_GET['agency'] === "aljazeera") {
                                    $author = "Al Jazeera";
                                } else if ($_GET['agency'] === "bbc") {
                                    $author = "BBC";
                                } else if ($_GET['agency'] === "chinadaily") {
                                    $author = "China Daily";
                                } else if ($_GET['agency'] === "foxnews") {
                                    $author = "Fox News";
                                } else if ($_GET['agency'] === "nyt") {
                                    $author = "New York Times";
                                } else if ($_GET['agency'] === "globeandmail") {
                                    $author = "The Globe And Mail";
                                } else if ($_GET['agency'] === "onion") {
                                    $author = "The Onion";
                                } else if ($_GET['agency'] === "wsj") {
                                    $author = "Wall Street Journal";
                                }

                                include_once 'dbh.inc.php';

                                $sql = "SELECT id, title, author, date FROM Articles WHERE author='" . $author . " A' OR author='" . $author . " B' ORDER BY id DESC;";
                                $result = $conn->query($sql);
                                
                                if ($result-> num_rows > 0) {
                                    while ($row = $result-> fetch_assoc()) {
                                        echo '<div class="article-item">
                                            <h3>' . $row['title'] . '</h3>
                                            <h4>' . $row['author'] . '</h4>
                                            <h5>' . $row['date'] . '</h5>
                                            <a href="article.php?id=' . $row['id'] . '">Read More</a>
                                        </div>';
                                    }
                                } else {
                                    echo 'No Articles Yet';
                                }
                            }

                        ?>
                    </div>
                </article>
            </div>
        </main>
<?php
    include_once 'footer.php'; // contains footer div
?>