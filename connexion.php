<?php
session_start();

if ($_SESSION['connected'] == 1) {
    echo '<script>
                                
    history.go(-1);
    
    </script>';
}









?>



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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<body>



    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="text-center mt-3">
                <h3>Suñu vote ®</h3>
            </div>

            <ul class="list-unstyled components">


                <li>
                    <a href="acceuil.php ">Acceuil &nbsp; <i class="fa fa-home"></i></a>
                </li>


            </ul>

            <ul class="list-unstyled CTAs">
                <li><a href="connexion.php" class="download">SE CONNECTER &nbsp;<i class='fas fa-sign-in-alt'></i></a>
                </li>
                <li><a href="inscription.php" class="article">S'INSCRIRE &nbsp;<i class='fas fa-external-link-square-alt'></i>
                    </a></li>
            </ul>
        </nav>
        <div class="col col-lg-6 mx-auto mt-3">



            <div id="content">
                <div class="shadow p-3 mb-5 bg-body rounded" style="background-color: FBFBFB;">
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

                                    CONNEXION
                                </button>
                            </div>

                        </div>
                    </nav>




                    <form name="style.php" method="post">

                        <label for="" style="color:#5C5B5B"> Numéro d'identification national</label>
                        <input type="text" name="nin" class="form-control" placeholder="Entrer le nin" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <br>
                        <label for="" style="color:#5C5B5B"> Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="mot de passe" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        <div class="float-center">
                            <br>
                            <button class="btn btn-outline-info" type="submit" name="valider" value="OK"> <i class='fas fa-sign-in-alt'></i>


                                Se connecter


                                <?php

                                // $spinner = '  &nbsp;<div class="spinner-border spinner-border-sm text-info"></div>';
                                ?>



                            </button>
                        </div>
                    </form>
                    <p></p>




                    <?php


                    require_once __DIR__ . '/vendor/autoload.php';




                    if (isset($_POST['valider'])) {
                        $nin = $_POST['nin'];
                        $password = $_POST['password'];


                        $client = new SoapClient('http://localhost:8484/Authentification?wsdl');
                        $par2 = new stdClass();
                        $par2->arg0 = $nin;
                        $par2->arg1 = $password;


                        try {
                            $res = $client->__soapCall("connexion", array($par2));;


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




                            $messagebird = new MessageBird\Client('WqdwbdSkmlMZphpLcMrVDWs5Q');
                            $message = new MessageBird\Objects\Message;

                            $message->originator = 'Sunu vote';
                            $message->recipients = ['00221785902567'];
                            $message->body = 'VOTRE INSCRIPTION A SUNUVOTE EST VALIDÉ !';
                            $response = $messagebird->messages->create($message);
                        } catch (SoapFault $ex) {


                            echo $ex->getMessage();
                        }
                    }



                    ?>




                    <div class="line"></div>
                    <span style="color:#5C5B5B"> SUÑU VOTE®, plateforme developée par </span><span style="color:#6d7fcc"> Abdoulaye Djibril Kandji & Abdou Aziz Thiam
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