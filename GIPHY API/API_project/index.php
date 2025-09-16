<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giphy API</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots"  content="noindex, nofollow">
    <meta name="description" content=" a place to serch for GIFS! " >
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="JS/Scroll.js"></script>
 
</head>
<body>
    <main>
            <header>
             <nav>
                 <ul>
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a></li>
                    <li><a href="#">Menu 3</a></li>
                 </ul>
             </nav>
            </header>
        <section>
            <h1>WELCOME TO GIPHY SELECT</h1>
        </section>

        <Section id="trending">
            <h2>trending gifs</h2>
            <section id="gifDisplay" >
            <?php
            include "../API_project/inc/trending.php";
            ?>
            </section>
        </section>
        <section id="serch">
        <section>
            <h2>make a selection</h2>
            <?php
            include "../API_project/inc/gifserch.php";
            ?>
        </section> 
        </section >

        <footer>
        <section>
        <h2>POWERED BY GIPHY</h2>
        </section>
        </footer>
      
    </main>
    
</body>
</html>


