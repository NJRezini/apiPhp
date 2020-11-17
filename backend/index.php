<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <title>Notícias</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./css/album.css" rel="stylesheet">
</head>
<body>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Notícias Crawler Jornal O Municipio</h1>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php 
                require './config/Conexao.php';
                $conn = OpenCon();
                $noticias = $conn->query("SELECT name, img_src, link FROM noticias");
                CloseCon($conn);
                if ($noticias->num_rows > 0) {                
                    while($row = $noticias->fetch_assoc()) {
                        $titulo = utf8_encode($row["name"]);
                        $src = $row["img_src"];
                        $link = $row["link"];
                ?>
                        <div class="col-md-4" onclick="location.href='<?php echo $link ?>'">
                            <div class="card mb-4 shadow-sm">
                                <img src="<?php echo $src; ?>" class="bd-placeholder-img card-img-top">
                                <div class="card-body">
                                    <p class="card-text"> <?php echo $titulo; ?></p>
                                </div>
                            </div>
                        </div>
                <?php }
                }; ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>