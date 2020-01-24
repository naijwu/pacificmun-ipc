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
    <body class="article">
        <header>
            <div class="utility"> 
                <div class="container">
                    <div class="name">
                        <a href="<?php
                            include_once 'dbh.inc.php';

                            $sql = "SELECT author FROM Articles WHERE id='" . $_GET['id'] . "';";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {
                                    $newsorg = substr($row['author'], 0, -2);

                                    if ($newsorg === 'Al Jazeera') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=aljazeera';
                                    } else if ($newsorg === 'BBC') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=bbc';
                                    } else if ($newsorg === 'China Daily') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=chinadaily';
                                    } else if ($newsorg === 'Fox News') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=foxnews';
                                    } else if ($newsorg === 'New York Times') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=nyt';
                                    } else if ($newsorg === 'The Globe and Mail') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=globeandmail';
                                    } else if ($newsorg === 'The Onion') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=onion';
                                    } else if ($newsorg === 'Wall Street Journal') {
                                        echo 'http://ipc.pacificmun.org/agency.php?agency=wsj';
                                    }
                                }
                            }
                        ?>">
                            <h2>
                                <?php
                                    include_once 'dbh.inc.php';

                                    $sql = "SELECT author FROM Articles WHERE id='" . $_GET['id'] . "';";
                                    $result = $conn->query($sql);
                                    
                                    if ($result-> num_rows > 0) {
                                        while ($row = $result-> fetch_assoc()) {
                                            echo substr($row['author'], 0, -2);
                                        }
                                    }
                                ?>
                            </h2>
                        </a>
                    </div>
                    <?php
                        session_start();

                        if($_SESSION['user'] == admin) {
                            echo '
                            <div class="links">
                                <a href="login.php"><i class="fa fa-sign-in-alt"></i> Post</a>
                                <a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                                <a href="tel:778.245.3794"><i class="fa fa-info-circle"></i> Report an Issue</a>
                            </div>
                            ';
                        } else {
                            echo '
                            <div class="links">
                                <a href="login.php"><i class="fa fa-sign-in-alt"></i> Staff Login</a>
                                <a href="tel:778.245.3794"><i class="fa fa-info-circle"></i> Report an Issue</a>
                            </div>';
                        }
                    ?>
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
                <article class="title">
                    <h1>
                        <?php
                            include_once 'dbh.inc.php';

                            $sql = "SELECT title FROM Articles WHERE id='" . $_GET['id'] . "';";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {
                                    echo $row['title'];
                                }
                            }
                        ?>
                    </h1>
                    <h2>
                        <?php
                            include_once 'dbh.inc.php';

                            $sql = "SELECT subtitle FROM Articles WHERE id='" . $_GET['id'] . "';";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {
                                    echo $row['subtitle'];
                                }
                            }
                        ?>
                    </h2>
                </article>
                <?php
                
                    include_once 'dbh.inc.php';

                    $sql = "SELECT imagepath, videopath FROM Articles WHERE id='" . $_GET['id'] . "';";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            if ($row['imagepath'] == '' && $row['videopath'] == '') {
                                continue;
                            } else if ($row['imagepath'] != '') {
                                echo '<div class="image-container">
                                        <img src="medias/' . $row['imagepath'] . '" alt="Article Image">
                                    </div>';

                                // image path should be: /medias/[imgname]

                            } 
                        }
                    }


                ?> 
                <article class="bio">
                    <h4>Written by 
                        <?php
                            include_once 'dbh.inc.php';

                            $sql = "SELECT author FROM Articles WHERE id='" . $_GET['id'] . "';";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {
                                    echo $row['author'];
                                }
                            }
                        ?>
                    </h4>
                    <h3>
                        <?php
                            include_once 'dbh.inc.php';

                            $sql = "SELECT date FROM Articles WHERE id='" . $_GET['id'] . "';";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {
                                    echo $row['date'];
                                }
                            }
                        ?>
                    </h3>
                </article>
                <article class="pbody">
                    <?php
                        include_once 'dbh.inc.php';

                        $sql = "SELECT body FROM Articles WHERE id='" . $_GET['id'] . "';";
                        $result = $conn->query($sql);
                            
                        if ($result-> num_rows > 0) {
                            while ($row = $result-> fetch_assoc()) {
                                echo $row['body'];
                            }
                        }
                    ?>
                </article>
                <?php
                    session_start();

                    if($_SESSION['user'] == admin) {
                        echo '
                        <article>
                            <a href="editarticle.php?id=' . $_GET['id'] . '" style="margin-right:10px;">Edit Article</a> <!-- UPDATE table where ID = ID, opposed to INSERT -->
                            <!-- <a href="deletearticle.php?id=' . $_GET['id'] . '">Delete Article</a> -->
                        </article>
                        ';
                    }
                ?>
            </div>
        </main>
<?php
    include_once 'footer.php'; // contains footer div
?>