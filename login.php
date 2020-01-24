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
        echo '<main class="login">
                <div class="container">
                    <article>
                        <h1>Post an Article</h1>
                        <h2>Upload a new article</h2>
                        <form class="wide-inputs" enctype="multipart/form-data" action="postarticle.inc.php" method="POST"> <!-- INSERT -->
                            <input type="text" name="title" placeholder="Article Title" required>
                            <input type="text" name="subtitle" placeholder="Article Sub Title">
                            <!-- <h3>Optional Video/Media &mdash; only .png, .jpg, and .mp4 files supported (< 100 MB)... For anything larger, text/call USG of IT</h3>
                            <input type="file" name="fileToUpload"/> FOR DISPLAYING: UPLOADS IMAGE LOCATION -->
                            <select name="author">
                                <option value="Al Jazeera A">Al Jazeera A</option>
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
                                <option value="Wall Street Journal B">Wall Street Journal B</option>
                            </select>
                            <textarea name="body" placeholder="Article Body" required></textarea>
                            <input type="submit" value="Post Article" name="post-submit">
                        </form>
                    </article>
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