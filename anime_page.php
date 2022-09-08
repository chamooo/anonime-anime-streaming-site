<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonime</title>
    <link rel="stylesheet" href="css/null.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/playerjs.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900"
        rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <?php require('parts/header.php') ?>

        <main class="main">
            <div class="main__container">
                <div class="main__left">

                    <?php 
                    $id = $_GET['id'];
                    $sql = "SELECT title, sypnosis, img_src, genres, duration, movie.status,
                    type.type_name, studio.studio_name FROM movie
                    JOIN type ON id_type = type.id
                    JOIN studio ON id_studio = studio.id
                    WHERE movie.id = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();
                    ?>
                    <div class="main__title"><?= $row['title'] ?></div>
                
                    <div class="main__madiaplayer" id="player"></div>
                    <div class="main__pic">
                        <img src="<?= $row['img_src'] ?>" alt="">
                    </div>
                    <div class="main__description">
                        <div class="main__description__item">Type :</div>
                        <div class="main__description__item__in"><?= $row['type_name'] ?></div>
                        <div class="main__description__item">Status :</div>
                        <div class="main__description__item__in"><?= $row['status'] ?></div>
                        <div class="main__description__item">Studios :</div>
                        <div class="main__description__item__in"><?= $row['studio_name'] ?></div>
                        <div class="main__description__item">Duration :</div>
                        <div class="main__description__item__in"><?= $row['duration'] ?> Min.</div>
                        <div class="main__description__item">Genres :</div>
                        <div class="main__description__item__in"><?= $row['genres'] ?></div>
                    </div>
                    <div class="main__description__title">Sypnosis :</div>
                    <div class="main__description__text"><?= $row['sypnosis'] ?></div>
                </div>
                <div class="main__right">
                    <div class="main__title">
                        Popular Anime
                    </div>
                    <div class="main__recommendations">
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/1.png" alt="">
                        </a>
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/2.png" alt="">
                        </a>
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/3.png" alt="">
                        </a>
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/4.png" alt="">
                        </a>
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/5.png" alt="">
                        </a>
                        <a href="#" class="recomendations__item">
                            <img src="img/main-page/6.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            </main>
    </div>

 
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>



    <script>

        $.ajax({
            type: "GET",
            url: "/server/episode/index.php",
            data: { 
                id: <?= $_GET['id'] ?>
            },
            success: function (response) {
                let obj = JSON.parse(response);
                let data1 = obj.map(x => {
                    return  { "title": x[0], "file": x[2] }
                })
                var player = new Playerjs({
                    id: "player",
                    file: data1
                });
            }
        });

        
       
    </script>
</body>

</html>