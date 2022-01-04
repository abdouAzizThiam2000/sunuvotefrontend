<?php

if ($_SESSION['connected'] != 1) {
    /* echo '<script>
                                
    history.go(-1);
    
    </script>'; */
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
        <nav id="sidebar">
            <div class="text-center mt-3">
                <h3>Suñu vote ®</h3>
            </div>

            <ul class="list-unstyled components">


                <li>
                    <a href="acceuil.php">Acceuil </a>
                </li>


                <li style="color: #7386D5;
    background: #fff;">
                    <a href="circonscription.php">Circonscription</a>
                </li>
                <li>
                    <a href="electeur.php">Liste Electeur</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li><a href="logout.php" class="article">SE DECONNECTER &nbsp;<i class='fas fa-sign-out-alt'></i></a>
                </li>
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

                            <span>CIRCONSCRIPTION</span>
                        </button>
                    </div>

                </div>
            </nav>


            <h2> Affichage de la liste des circonscriptions</h2>

            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modal-display"
                onclick="showModal()">Ajouter une circonscription <i class="fa fa-plus"></i>
            </button>


            <p style="color:#fafafa">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.addadadadadaddadadadaddadad </p>
            <?php

            $client = new SoapClient('http://localhost:8787/CirconscriptionService?wsdl');
            $par = new stdClass();
            $tmp = 0;

            $res = $client->__soapCall("ListeCirconscription", array());
            if ($res->return == null) {
            }



            ?>


            <?php

            class Circonscription
            {
                public $nom;
                public $region;
                public $departement;
                public $arrondissement;
                public $nbrebureau;
                function __construct($nom, $region, $departement, $arrondissement, $nbrebureau)
                {
                    $this->nom = $nom;
                    $this->region = $region;
                    $this->departement = $departement;
                    $this->arrondissement = $arrondissement;
                    $this->nbrebureau = $nbrebureau;
                }
            }


            if (isset($_POST['valider'])) {
                $nom = $_POST['nom'];
                $departement = $_POST['departement'];
                $arrondissement = $_POST['arrondissement'];
                $nbrebureau = $_POST['nbrebureau'];
                $region = $_POST['region'];

                $data = new Circonscription($nom, $region, $departement, $arrondissement, $nbrebureau);
                $client = new SoapClient('http://localhost:8787/CirconscriptionService?wsdl');
                $par2 = new stdClass();
                $par2->arg0 = $data;
                try {
                    $res = $client->__soapCall("ajouterCirconscription", array($par2));;
                    if ($res->return == 1) {
                        echo '<div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action.
                      </div>';
                        header("circonscription.php");
                        $nom = null;
                        $departement = null;
                        $arrondissement = null;
                        $nbrebureau = null;
                        $nbrebureau = null;
                    }
                } catch (SoapFault $ex) {
                    $nom = null;
                    $departement = null;
                    $arrondissement = null;
                    $nbrebureau = null;
                    $nbrebureau = null;
                    echo '<div class="alert alert-danger">
                        <strong></strong> Echec
                      </div>';
                    echo $ex->getMessage();
                }
            }



            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Region</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Arrondissement</th>
                        <th scope="col">Nombre de Bureau</th>
                        <th scope="col">Actions</th>



                    </tr>
                </thead>
                <tbody>



                    <?php
                    foreach ($res->return as $row) {
                    ?>

                    <tr id="<?php $tmp++; ?>" onclick="getid(this.id)">
                        <td name="nom"><?php echo $row->nom; ?></td>
                        <td><?php echo $row->region; ?></td>
                        <td><?php echo $row->departement; ?></td>
                        <td><?php echo $row->arrondissement; ?></td>
                        <td><?php echo $row->nbrebureau; ?></td>
                        <td> <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-display2"
                                onclick="showModal2()"> <i class="fa fa-eye"></i>
                            </button></td>




                    </tr>

                    <?php
                    }
                    ?>
                </tbody>

            </table>


            <div class="line"></div>


        </div>
    </div>


    <div class="modal fade" id="modal-display">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Search results</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form name="rechercher" method="post">

                            <div class="row">
                                <label for="">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <div class="row">
                                <label for="">Region</label>

                                <input type="text" name="region" class="form-control" placeholder="Region"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <div class="row">
                                <label for="">Departement</label>

                                <input type="text" name="departement" class="form-control" placeholder="Departement"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <div class="row">
                                <label for="">Arrondissement</label>

                                <input type="text" name="arrondissement" class="form-control"
                                    placeholder="Arrondissemnt" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <div class="row">
                                <label for="">Nombre de bureaux</label>

                                <input type="number" name="nbrebureau" class="form-control"
                                    placeholder="Nombre de bureaux" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <button class="btn btn-info float-right" type="submit" name="valider" value="OK">
                                <i class="fa fa-save"></i>

                                Valider</button>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-display2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">mon modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="container">


                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    function showModal() {
        document.getElementById("pageContent").style.opacity = "0.5";

    }

    function getid(value) {
        alert(value);


    }

    function showModal2() {
        document.getElementById("pageContent2").style.opacity = "0.5";

    }



    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>