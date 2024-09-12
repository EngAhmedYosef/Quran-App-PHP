<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran App</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="app-vedio">

    <?php 
    include("config.php");
    $query = "SELECT * FROM viedeos ORDER BY id DESC";
    $result = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="vedio">';
            echo '<video src="'.$row['location'].'"></video>';
            echo '<div class="footer">';
                echo '<div class="footer-text">';
                    echo '<h3>Ahmed Yosef</h3>';
                    echo '<p class="description">'.$row['subject'].'</p>';
                    echo '<div class="img-marq">';
                        echo '<a href="http://localhost/phpprojects/quranapp/upload.php"><img src="images/uparrow_arriba_1538.webp"></a>';
                        echo '<marquee>'.$row['title'].'</marquee>';
                    echo '</div>';
                echo '</div>';
                echo '<img src="images/vinyl_music_player_icon_123865.webp" class="image-play">';
            echo '</div>';
        echo '</div>';
    }
    ?>


    </div>

    <script>
        const vedios = document.querySelectorAll('video');
        for (const viedo of vedios) {
            viedo.addEventListener('click', function() {
                if (viedo.paused) {
                    viedo.play();
                } else {
                    viedo.pause();
                }
            })
        }
    </script>
</body>

</html>


