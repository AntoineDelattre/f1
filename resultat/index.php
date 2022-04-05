<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Projet f1</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../f1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css ">
    <script src="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="//guy.verghote.free.fr/composant/std.js"></script>

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
</head>
<body>
<header>
    <!-- Menu -->
    <div class="sidebar">
        <a href="../index.php">Accueil</a>
        <a href="../pilotes/index.php">Pilotes</a>
        <a href="../ecurie/index.php">Ecuries</a>
        <a href="../grandprix/index.php">Grand Prix</a>
        <a href="index.php">Résultats</a>
    </div>
</header>
<div class='container'>
    <div class="row">
        <div class="col-auto">
            <div class="input-group p-2 mb-3 col-6">
                <label class="input-group-text" for="idgrandprix">Grand Prix</label>
                <select class="form-select " id="idgrandprix"></select>
            </div>
        </div>
    </div>
    <div id="msg"></div>
    <div class='table-responsive'>
        <table class='table table-sm table-borderless'>
            <thead>
            <tr>
                <th class="text-center masquer">Place</th>
                <th class="text-center">Pilotes</th>
                <th class="text-center">Ecurie</th>
                <th class="text-center">Point</th>
            </tr>
            </thead>
            <tbody id="lesLignes"></tbody>
        </table>
    </div>
    <footer>
        <div style="position: fixed; bottom: 0; left: 50%">
            © 2022 Dreamers
        </div>
    </footer>
</div>
</body>
</html>

