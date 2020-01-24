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
    <body>
        <?
        session_start();
    
    if($_SESSION['user'] === "admin") {

        echo '<header>
            <div class="utility">
                <div class="container">
                    <a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    <a href="tel:778.245.3794"><i class="fa fa-info-circle"></i> Report an Issue</a>
                </div>
            </div>
            <div class="logo">
                <div class="container">
                    <a href="http://ipc.pacificmun.org">
                        <img src="logo.png" alt="IPC">
                    </a>
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
        </header>';

        include_once 'dbh.inc.php';

        $sql = "SELECT title, author, subtitle, body FROM Articles WHERE id='" . $_GET['id'] . "';";
        $result = $conn->query($sql);
        
        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {

                echo '<main class="login">
                        <div class="container">
                            <article>
                                <h1>Edit article</h1>
                                <h2>Edit the article</h2>
                                <form class="wide-inputs" enctype="multipart/form-data" action="editarticle.inc.php" method="POST"> <!-- UPDATE where ID = ID -->
                                    <input type="hidden" name="id" value="' . $_GET['id'] . '">
                                    <input type="text" name="title" value="' . $row['title'] . '" required>
                                    <input type="text" name="subtitle" value="' . $row['subtitle'] . '">
                                    <!-- <h3>Optional Video/Media &mdash; only .png, .jpg, and .mp4 files supported (< 100 MB)... For anything larger, text/call USG of IT</h3>
                                    <input type="file" name="fileToUpload"/> -->
                                    <select name="author">';
                                        if($row['author'] === "Al Jazeera A") {
                                            echo '
                                            <option value="Al Jazeera A" selected>Al Jazeera A</option>
                                            <option value="Al Jazeera B">Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "Al Jazeera B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "BBC A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A" selected>BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "BBC B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B" selected>BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "China Daily A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A" selected>China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "China Daily B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B" selected>China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "Fox News A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A" selected>Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "Fox News B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B" selected>Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "New York Times A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A" selected>New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "New York Times B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B" selected>New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "The Globe and Mail A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A" selected>The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "The Globe and Mail B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B" selected>The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "The Onion A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A" selected>The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "The Onion B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B" selected>The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "Wall Street Journal A") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A" selected>Wall Street Journal A</option>
                                            <option value="Wall Street Journal B">Wall Street Journal B</option>';
                                        } else if($row['author'] === "Wall Street Journal B") {
                                            echo '
                                            <option value="Al Jazeera A">Al Jazeera B</option>
                                            <option value="Al Jazeera B" selected>Al Jazeera B</option>
                                            <option value="BBC A">BBC A</option>
                                            <option value="BBC B">BBC B</option>
                                            <option value="China Daily A">China Daily A</option>
                                            <option value="China Daily B">China Daily B</option>
                                            <option value="Fox News A">Fox News A</option>
                                            <option value="Fox News B">Fox News B</option>
                                            <option value="New York Times A">New York Times A</option>
                                            <option value="New York Times B">New York Times B</option>
                                            <option value="The Globe and Mail A">The Globe and Mail A</option>
                                            <option value="The Globe and Mail B">The Globe and Mail B</option>
                                            <option value="The Onion A">The Onion A</option>
                                            <option value="The Onion B">The Onion B</option>
                                            <option value="Wall Street Journal A">Wall Street Journal A</option>
                                            <option value="Wall Street Journal B" selected>Wall Street Journal B</option>';
                                        }
                                    echo '</select>
                                    <textarea name="body" required>' . $row['body'] . '</textarea>
                                    <input type="submit" value="Update Article" name="update-submit">
                                </form>
                            </article>';
            }
        }
                    echo '
                    <article>
                        <h1>Formatting</h1>
                        <h2>If you want to get fancy</h2>
                        <p>
                            Surround a sentence with &#60;h5&#62; and &#60;/h5&#62; to make a Large Header
                        </p>
                        <p>
                            Surround a sentence with &#60;h6&#62; and &#60;/h6&#62; to make a Header
                        </p>
                        <p>
                            Surround each paragraph with &#60;p&#62; and &#60;/p&#62; to make a Paragraph block (each new paragraph blocks have spaces in between them)
                        </p>
                    </article>
                </div>
            </main>';
    } else {
        echo '<header>
            <div class="utility">
                <div class="container">
                    <a href="login.php"><i class="fa fa-sign-in-alt"></i> Staff Login</a>
                    <a href="tel:778.245.3794"><i class="fa fa-info-circle"></i> Report an Issue</a>
                </div>
            </div>
            <div class="logo">
                <div class="container">
                    <a href="http://ipc.pacificmun.org">
                        <img src="logo.png" alt="IPC">
                    </a>
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
        </header>';
        echo '<main class="login">
            <div class="container">
                <article>
                    <h1>Log In</h1>
                    <h2>For staff</h2>
                    <form action="login.inc.php" method="POST">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" value="Log In" name="login-submit">
                    </form>
                </article>
            </div>
        </main>';
    }

    include_once 'footer.php'; // contains footer div
?>