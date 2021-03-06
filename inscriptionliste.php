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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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


                <li>
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
                <li style="color: #7386D5; background: #fff;">
                    <a href="inscriptionliste.php">Inscription sur les listes <i class="fa fa-user"></i></a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li><a href="connexion.php" class="article">Se Connecter&nbsp;<i class='fas fa-sign-in-alt'></i></a>
                </li>
                <li><a href="inscription.php" class="article">S'inscrire&nbsp;<i
                            class='fas fa-external-link-square-alt'></i></a></li>
            </ul>
        </nav>
        <div class="col col-lg-6 mx-auto mt-1">



            <div id="content">
                <div class="shadow p-3 mb-5 bg-body rounded" style="background-color: white;">
                    <br>


                    <nav class="navbar navbar-default">
                        <div class="container ">

                            <div class="navbar-header">
                                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                    <i class="fa fa-chevron-circle-left"></i>

                                    <span>Afficher Menu</span>
                                </button>
                            </div>

                            <div class="navbar-header">
                                <button type="button" id="sidebarCollapse" class="btn btn-light navbar-btn" disabled>
                                    <i class="fa fa-info-circle"></i>

                                    Inscription Listes
                                </button>
                            </div>

                        </div>
                    </nav>


                    <div id="accordion">
                        <div class="card border-0">
                            <div class="card-header" id="headingOne" style="background-color: white;">
                                <h5 class="mb-0">
                                    <button class="btn btn-info collapsed" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Informations personelles <i class="fa fa-info-circle"></i>

                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <label for="" style="color:#5C5B5B"> Numéro d'identification national</label>
                                    <input type="text" name="nin" class="form-control" placeholder="Entrer le nin" git
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <br>
                                    <label for="" style="color:#5C5B5B"> Prénom de l'electeur</label>
                                    <input type="text" name="prenom" class="form-control" placeholder="Exemple: Malick"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <br> <label for="" style="color:#5C5B5B"> Nom de l'electeur</label>
                                    <input type="text" name="nom" class="form-control" placeholder="Exemple: Gaye"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <br> <label for="" style="color:#5C5B5B"> Numero Telephone</label>
                                    <input type="text" name="telephone" class="form-control"
                                        placeholder="Entrer votre numero de telephone" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">

                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header" id="headingTwo" style="background-color: white;">
                                <h5 class="mb-0">
                                    <button class="btn btn-info collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Lieu de naissance et adresse <i class="fa fa-info-circle"></i>

                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <label for="" style="color:#5C5B5B"> Date de naissance</label>
                                    <input type="date" name="date" class="form-control" placeholder="Entrer le nin"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2"><br> <label
                                        for="" style="color:#5C5B5B"> Adresse</label>
                                    <input type="text" name="adresse" class="form-control"
                                        placeholder="Entrer votre adresse" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header" id="headingThree" style="background-color: white;">
                                <h5 class="mb-0">
                                    <button class="btn btn-info collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Circonscription <i class="fa fa-info-circle"></i>

                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <label for="" style="color:#5C5B5B"> Nom Circonscription</label>
                                    <input type="text" name="circons" class="form-control"
                                        placeholder="Entrer le nom de votre circonscription"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <br>
                                    <label for="" style="color:#5C5B5B"> Region</label>
                                    <input type="text" name="region" class="form-control"
                                        placeholder="Entrer le nom de votre region" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <br><label for="" style="color:#5C5B5B"> Departement</label>
                                    <input type="text" name="departement" class="form-control"
                                        placeholder="Entrer le nom de votre departement"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <br><label for="" style="color:#5C5B5B"> Arrondissement</label>
                                    <input type="text" name="arrondissement" class="form-control"
                                        placeholder="Entrer le nom de votre arrondissement"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>


                        <div class="card border-0" style="background-color: white;">

                            <div class="card-body">
                                <button class="btn btn-outline-info" type="submit" name="valider" value="OK"> <i
                                        class='fas fa-sign-in-alt'></i>


                                    S'inscrire





                                </button>
                            </div>
                        </div>


                    </div>

                    <p></p>




                    <?php


                    require_once __DIR__ . '/vendor/autoload.php';




                    if (isset($_POST['valider'])) {
                        $nin = $_POST['nin'];
                        $password = $_POST['password'];


                        $client = new SoapClient('http://localhost:8686/InscriptionService?wsdl');
                        $par2 = new stdClass();
                        $par2->arg0 = $nin;
                        $par2->arg1 = $password;


                        try {
                            $res = $client->__soapCall("Inscription", array($par2));;


                            if ($res->return == 0) {



                                echo '<div class="alert alert-danger">
            <strong>Erreur!</strong> idfsgdggg
          </div>';
                            }
                            if ($res->return == 1) {
                                $_SESSION['valid'] = true;
                                $_SESSION['timeout'] = time();
                                $_SESSION['connected'] = 1;




                                echo '<div class="alert alert-success">
            <strong>Success!</strong> Indicates a successful or positive action.
          </div>';
                            } else
                        if ($res->return == 2) {
                                $_SESSION['valid'] = true;
                                $_SESSION['timeout'] = time();
                                $_SESSION['nin'] = $par2->arg0;
                                $_SESSION['connected'] = 1;


                                sleep(2);

                                echo '<script>
                                
                                    window.location="circonscription.php";
                                    
                                    </script>';










                                echo '<div class="alert alert-info">
            <strong>Admin!</strong> Indicates a successful or positive action.
          </div>';
                            }




                            //  $messagebird = new MessageBird\Client('WqdwbdSkmlMZphpLcMrVDWs5Q');
                            //  $message = new MessageBird\Objects\Message;

                            //  $message->originator = 'Sunu vote';
                            //   $message->recipients = ['00221785902567'];
                            //  $message->body = 'Hello World, I am a text message and I was hatched by PHP code!';
                            //   $response = $messagebird->messages->create($message);
                        } catch (SoapFault $ex) {


                            echo $ex->getMessage();
                        }
                    }



                    ?>




                    <div class="line"></div>
                    <span style="color:#5C5B5B"> SUÑU VOTE®, plateforme developée par </span><span
                        style="color:#6d7fcc"> l'ADIE.
                    </span>



                </div>
            </div>


            <!-- Page Content Holder -->


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