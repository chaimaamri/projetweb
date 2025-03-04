<?php
require_once __DIR__ . '/../../Controller/TravelOfferController.php';
require_once __DIR__ . '/../../Model/TravelOffer.php';

if (!isset($_GET['id'])) {
    die('ID de l\'offre de voyage manquant.');
}

$id = $_GET['id'];
$travelOfferController = new TravelOfferController();
$offers = $travelOfferController->getOffers();

$travelOfferData = null;
foreach ($offers as $offer) {
    if ($offer['id'] == $id) {
        $travelOfferData = $offer;
        break;
    }
}

if (!$travelOfferData) {
    die('Offre de voyage non trouvée.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedOffer = new TravelOffer(
        $_POST['title'],
        $_POST['destination'],
        $_POST['departure_date'],
        $_POST['return_date'],
        $_POST['price'],
        isset($_POST['disponibility']) ? true : false,
        $_POST['category']
    );

    $travelOfferController->updateOffer($id, $updatedOffer);
    header("Location: ../ListOffers.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update Travel Offer - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Travel Booking</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Travel Offer</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <form id="updateTravelOfferForm" action="updateOffer.php?id=<?php echo $id; ?>" method="POST">
                                            <label>Title:</label>
                                            <input class="form-control form-control-user" type="text" name="title" value="<?php echo htmlspecialchars($travelOfferData['title']); ?>" required><br>
                                            <label>Destination:</label>
                                            <input class="form-control form-control-user" type="text" name="destination" value="<?php echo htmlspecialchars($travelOfferData['destination']); ?>" required><br>
                                            <label>Departure Date:</label>
                                            <input class="form-control form-control-user" type="date" name="departure_date" value="<?php echo htmlspecialchars($travelOfferData['departure_date']); ?>" required><br>
                                            <label>Return Date:</label>
                                            <input class="form-control form-control-user" type="date" name="return_date" value="<?php echo htmlspecialchars($travelOfferData['return_date']); ?>" required><br>
                                            <label>Price:</label>
                                            <input class="form-control form-control-user" type="number" name="price" value="<?php echo htmlspecialchars($travelOfferData['price']); ?>" required><br>
                                            <div class="forms-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="disponibility" <?php echo $travelOfferData['disponibility'] ? 'checked' : ''; ?>>
                                                    <label class="custom-control-label" for="customCheck">Disponibility</label>
                                                </div>
                                            </div>
                                            <br>
                                            <label for="category">Category:</label><br>
                                            <select class="form-control form-control-user" id="category" name="category" required>
                                                <option value="adventure" <?php echo $travelOfferData['category'] == 'adventure' ? 'selected' : ''; ?>>Adventure</option>
                                                <option value="relaxation" <?php echo $travelOfferData['category'] == 'relaxation' ? 'selected' : ''; ?>>Relaxation</option>
                                                <option value="culture" <?php echo $travelOfferData['category'] == 'culture' ? 'selected' : ''; ?>>Culture</option>
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Update Offer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Travel Booking 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="js/addOffer.js"></script>
</body>
</html>