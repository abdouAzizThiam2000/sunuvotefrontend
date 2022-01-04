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
                    <a href="acceuil.php ">Acceuil &nbsp; <i class="fa fa-home"></i></a>
                </li>

                <li>
                    <a href="circonscription.php">Circonscription</a>
                </li>
                <li style="color: #7386D5; background: #fff;">
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

                            <span>ELECTEUR</span>
                        </button>
                    </div>

                </div>
            </nav>


            <?php

            if (!(isset($_POST['valider']))) {
                echo ' <h2>Effectuez une recherche des electeurs par region</h2> ';
            }

            ?>


            <form name="rechercher" method="get">

                <div class="input-group">
                    <input type="text" name="nin" class="form-control" placeholder="Rechercher par nin"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit" name="valider" value="OK"> <i
                                class="fa fa-search"></i>
                            Rechercher</button>
                    </div>
                </div>
            </form>
            <p style="color:#fafafa">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.addadadadadaddadadadaddadad </p>



            <?php
            $client = new SoapClient('http://192.168.1.18:8686/InscriptionService?wsdl');
            $par = new stdClass();

            if ($_GET['nin'] == '') {
                echo '<div class="alert alert-warning">
                <strong>Notice!</strong> Veuillez effectuer une recherche ! 
            </div>
            
            ';
            }




            //1915199700130 kandji abdoulaye nom parcelle , region thies , nbrebureau 0, departement thies , arrondissement thiesouest
            if (isset($_GET['valider'])) {
                $par->arg0 = $_GET['nin'];
                $res = $client->__soapCall("recupererElecteur", array($par));


                $valeur = json_decode($res->return);
                $valeur = str_replace('"', " ", $valeur);
                $valeur = str_replace('{', " ", $valeur);
                $valeur = str_replace('}', " ", $valeur);
                $valeur = str_replace(':', " ", $valeur);
                $valeur = str_replace(',', " ", $valeur);
                $valeur = str_replace('region', " ", $valeur);
                $valeur = str_replace('nom', " ", $valeur);
                $valeur = str_replace('nbrebureau', " ", $valeur);
                $valeur = str_replace('departement', " ", $valeur);
                $valeur = str_replace('arrondissement', " ", $valeur);



                $valeur1 = explode(" ", $valeur);








                $valeur2 = array_filter($valeur1);

                $valeur3 = array_values($valeur2);

                var_dump($valeur3);

                if ($res->return != null) {
                    echo '<div class="alert alert-info">
                <strong>Succés!</strong> Vous avez effectué une recherche pour la ville de : ' . $_GET['nin'] . '
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIN</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>

                        <th scope="col">Nom circonscription</th>
                        <th scope="col">Region</th>
                        <th scope="col">Nombre de bureau</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Arrondissement</th>






                    </tr>
                </thead>
                <tbody>';
                } else {

                    echo '<div class="alert alert-danger">
                <strong>Ville inexistante!</strong> Vous avez effectué une recherche pour la ville de : ' . $_GET['nin'] . '
            </div>
            ';
                }
            }















            ?>







            <tr>
                <td><?php echo $valeur3[0]; ?></td>
                <td><?php echo $valeur3[1]; ?></td>
                <td><?php echo $valeur3[2]; ?></td>
                <td><?php echo $valeur3[3]; ?></td>
                <td><?php echo  $valeur1[30]; ?></td>
                <td><?php echo $valeur3[5]; ?></td>
                <td><?php echo $valeur3[6]; ?></td>

            </tr>


            </tbody>

            </table>


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