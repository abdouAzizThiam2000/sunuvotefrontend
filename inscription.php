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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
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
                <li><a href="connexion.php" class="article">Se Connecter&nbsp;<i class='fas fa-sign-in-alt'></i></a>
                </li>
                <li><a href="incription.php" class="download">S'inscrire &nbsp;<i class='fas fa-external-link-square-alt'></i></a></li>
            </ul>
        </nav>
        <div class="col col-lg-6 mx-auto mt-3">

            <!-- Page Content Holder -->
            <div id="content">
                <div class="shadow p-3 mb-5 bg-body rounded" style="background-color: FBFBFB;">
                    <br>
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

                                    INSCRIPTION
                                </button>
                            </div>

                        </div>
                    </nav>




                    <form name="inscription" method="post">

                        <label for="" style="color:#5C5B5B"> Numéro d'identification national</label>
                        <input type="text" name="nin" class="form-control" placeholder="Entrer le nin" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <br>
                        <label for="" style="color:#5C5B5B"> Mot de passe</label>
                        <input type="password" name="password1" class="form-control" placeholder="mot de passe" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <br>
                        <label for="" style="color:#5C5B5B"> Confirmer Mot de passe</label>
                        <input type="password" name="password2" class="form-control" placeholder="mot de passe" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        <div class="float-center">
                            <br>
                            <button class="btn btn-outline-info" type="submit" name="valider" value="OK"> <i class='fas fa-sign-in-alt'></i>

                                S'inscrire</button>
                        </div>
                    </form>
                    <p></p>
                    <?php

                    class Inscription
                    {
                        public $nin;
                        public $password1;
                        public $password2;

                        function __construct($nin, $password1, $password2)
                        {
                            $this->nin = $nin;
                            $this->password1 = $password1;
                            $this->password2 = $password2;
                        }
                    }


                    if (isset($_POST['valider'])) {
                        $nin = $_POST['nin'];
                        $password1 = $_POST['password1'];
                        $password2 = $_POST['password2'];


                        $data = new Inscription($nin, $password1, $password2);
                        $client = new SoapClient('http://localhost:8484/Authentification?wsdl');
                        $par2 = new stdClass();
                        $par2->arg0 = $nin;
                        $par2->arg1 = $password1;
                        $par2->arg2 = $password2;


                        try {
                            $res = $client->__soapCall("CreerCompte", array($par2));;
                            if ($res->return == 1) {
                                echo '<div class="alert alert-success">
            <strong>Success!</strong> Indicates a successful or positive action.
          </div>';
                            } else {
                                echo '<div class="alert alert-danger">
                            <strong>Erreur !</strong> Vos données ne sont pas adequates !
                          </div>';
                            }
                        } catch (SoapFault $ex) {


                            echo $ex->getMessage();
                        }
                    }



                    ?>


                    <div class="line"></div>
                    <span style="color:#5C5B5B"> SUÑU VOTE®, plateforme developée par </span><span style="color:#6d7fcc">
                        l'ADIE.
                    </span>

                </div>

            </div>

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