<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 3</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<body>



    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="fixed">

            <div class="text-center mt-3">
                <h3>Suñu vote ®</h3>
            </div>
            <ul class="list-unstyled components">


                <li style="color: #7386D5; background: #fff;">
                    <a href="acceuil.php ">Acceuil &nbsp; <i class="fa fa-home"></i></a>
                </li>


                <li>
                    <a href="circonscription.php">Circonscription &nbsp; <i class="fa fa-list"></i></a>
                </li>
                <li>
                    <a href="electeur.php">Liste Electeur &nbsp; <i class="fa fa-user"></i></a>
                </li>



                <li>
                    <a href="getelecteur.php"> Mes informations <i class="fa fa-user"></i></a>
                </li>
                <li>
                    <a href="inscriptionliste.php">Inscription sur les listes <i class="fa fa-user"></i></a>
                </li>
                <li>
                    <a href="resultats.php">Resultats <i class="fa fa-user"></i></a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li><a href="connexion.php" class="article">Se Connecter&nbsp;<i class='fas fa-sign-in-alt'></i></a>
                </li>
                <li><a href="inscription.php" class="article">S'inscrire&nbsp;<i
                            class='fas fa-external-link-square-alt'></i></a></li>
            </ul>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fa fa-chevron-circle-left"></i>

                            <span>Afficher Menu</span>
                        </button>
                    </div>

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-light navbar-btn" disabled>
                            <i class="fa fa-info-circle"></i>

                            <span>ACCEUIL</span>
                        </button>
                    </div>

                </div>
            </nav>


            <h2>Bienvenue au niveau de la plateforme Suñu Vote®</h2>
            <div class="line"></div>


            <section>

                <div class="container" style="display: inline-block;">

                    <div class="row">


                        <div class="col-lg-8">
                            <p>
                                La Covid 19, quoiqu'on puisse dire a modifié nos vies carrement. Beaucoup de choses qui
                                se faisaient en presentiel se font desormais en ligne .

                            </p>
                        </div>

                        <div class="col-lg-4">
                            <img width="100%" height="50%" src="assets/socialdistance.svg">
                        </div>


                    </div>

                </div>

            </section>
            <div class="col-lg-12">
                <p>
                    C'est dans ce cadre que L'Adie avec l'appuie du gouverment du Senegal a decider de mettre en place
                    une plateforme qui permettra à tout citoyen respectant les conditions de vote d'effectuer son devoir
                    civique depuis n'importe quel endroit.
                    Fini les queues interminables.

                </p>
            </div>
            <section>

                <div class="container" style="display: inline-block;">

                    <div class="row">
                        <div class="col-lg-4">
                            <img width="100%" height="50%" src="assets/vote.svg">
                        </div>

                        <div class="col-lg-8">
                            <p>
                                Utilisez notre plateforme pour voter en toute discrection de depuis n'importe quel
                                endroit du globe, sans risque de se regrouper et de contracter le virus.
                                Rapide, fiable !
                            </p>
                        </div>




                    </div>

                </div>

            </section>









            <div class="line"></div>


        </div>
    </div>





    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>