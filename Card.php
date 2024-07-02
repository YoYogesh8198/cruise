<?php
include_once 'db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cruise Details</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <script src="./js/validation.js"></script>
</head>

<body>


    <!-- form -->
    <div class="main_section">

        <div class="container p-0 enuiry_form">
            <div class="form-left">
                <form id="enquiry-form" class="needs-validation" novalidate>
                    <div class="upperside">
                        <h2 class="mb-2 form_heding">Cruise Enquiry </h2>
                        <div class="form-row row mb-3">
                            <div class="form-group col-md-6 p_lzero">

                                <input type="text" class="form-control input-sm" id="name" name="name"
                                    onkeyup="show_name(this.value);" placeholder="Name" required>
                                <div class="invalid-feedback error_1">
                                    Please enter your name.*
                                </div>
                            </div>
                            <div class="form-group col-md-6">

                                <input type="email" class="form-control input-sm" id="email" name="email"
                                    placeholder="Email" onkeyup="checkEmail(this.value);" ; required>
                                <div class="invalid-feedback error_2">
                                    Please enter a valid email.
                                </div>
                            </div>
                        </div>
                        <div class="form-row row mb-1">
                            <div class="form-group col-md-6 mb-2 p_lzero">

                                <input type="tel" class="form-control input-sm" id="number" name="number"
                                    placeholder="Number" onkeyup="checkValidateMobile(this.value)" ; required>
                                <div class="invalid-feedback error_3">
                                    Please enter your phone number.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <select class="form-select input-sm" id="travelers" name="travelers"
                                    onchange="select_traveler(this.value);" required>
                                    <option value disabled selected>
                                        Travelers</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>

                                <div class="passenger_rio">
                                    <div class='mt-2 pt-2 travelers_radio' style="display: none;">
                                        <span id="text"></span>Choose:
                                        <input type="radio" class="radio" value="yes" name="pax_type"
                                            onclick="pax_travler(&quot;yes&quot;);" style="margin-left:10px;"> Yes
                                        <input type="radio" class="radio" value="no" name="pax_type"
                                            onclick="pax_travler(&quot;no&quot;);" style="margin-left:10px;"> No
                                    </div>
                                    <span id="pax_travler" style="display:none;">
                                        <div class="d-flex">
                                            <div class="d-grid col-md-4 me-4">Adult
                                                <select class="form-select drop_in" aria-label=".form-select-lg example"
                                                    id="number_of_adults" name="number_of_adults">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                            </div>
                                            <div class="d-grid col-md-4 me-4">Child
                                                <select class="form-select drop_in" aria-label=".form-select-lg example"
                                                    id="number_of_children" name="number_of_children">
                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                            <div class="d-grid col-md-4 me-4">Infant
                                                <select class="form-select drop_in" aria-label=".form-select-lg example"
                                                    id="number_of_infant" name="number_of_infant">

                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </span>
                                </div>

                                <div class="invalid-feedback error_4">
                                    Please select the number of travelers.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="downside">
                        <div class="form-row row mb-3">
                            <div class="form-group col-md-6 mt-2 p_lzero">

                                <select class="form-select input-sm" id="destination" name="destination" required>
                                    <option value disabled selected>
                                        Destination (Any)</option>
                                    <?php foreach ($regionsData as $region): ?>
                                        <option class="" value="<?php echo $region; ?>"><?php echo $region; ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error_5">
                                    Please select a destination.
                                </div>
                            </div>
                            <div class="form-group col-md-6  mt-2">

                                <select class="form-select input-sm" id="cruise-length" name="cruise-length" required>
                                    <option value disabled selected>Cruise
                                        length (Any)</option>
                                    <?php foreach ($nightsData as $nightData): ?>
                                        <option value="<?php echo $nightData; ?>"><?php echo $nightData; ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error_6">
                                    Please select a cruise length.
                                </div>
                            </div>
                        </div>

                        <div class="form-row row mb-3">
                            <div class="form-group col-md-6 p_lzero">
                                <input class="form-control input-sm" type="text" placeholder="Departure Date(Any)"
                                    aria-label=".form-control-lg example" id="depart_date" name="depart_date"
                                    autocomplete="off" required>
                                <div class="invalid-feedback error_7">
                                    Please select a departure date.
                                </div>
                            </div>
                            <div class="form-group col-md-6">

                                <select class="form-select input-sm" id="cruise-line" name="cruise-line" required>
                                    <option value disabled selected>Cruise
                                        line (Any)</option>
                                    <?php foreach ($cruiseData as $cruise): ?>
                                        <option value="<?php echo $cruise; ?>"><?php echo $cruise; ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error_8">
                                    Please select a cruise line.
                                </div>
                            </div>
                        </div>

                        <div class="form-row row mb-3">
                            <div class="form-group col-md-6 p_lzero">

                                <select class="form-select input-sm" id="cruise-ship" name="cruise-ship" required>
                                    <option value disabled selected>Cruise
                                        ship (Any)</option>
                                    <?php foreach ($cruiseShipData as $shipData): ?>
                                        <option value="<?php echo $shipData; ?>"><?php echo $shipData; ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error_9">
                                    Please select a cruise ship.
                                </div>
                            </div>
                            <div class="form-group col-md-6">

                                <select class="form-select input-sm" id="departure-port" name="departure-port" required>
                                    <option value disabled selected>Departure
                                        port (Any)</option>
                                    <?php foreach ($departurePorts as $DeparturePorts): ?>
                                        <option class="" value="<?php echo $DeparturePorts; ?>">
                                            <?php echo $DeparturePorts; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error_10">
                                    Please select a departure port.
                                </div>
                            </div>
                        </div>
                        <div class="form-row row mb-3">
                            <div class="form-group col-md-6 p_lzero">
                                Additional Discounts
                            </div>
                            <div class="form-group custombtn col-md-6">
                                <button type="submit" class="btn btn_submit " id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-right "><img src="images/banner.png" class="img-fluid"></div>
        </div>

        <!-- <div class="sideCard">
                <div class="discounttag">
                    <p>UP TO</p>
                    <p> 37% OFF</p>
                    <p>CHEAP CRUISES</p>
                </div>

                <p>Need Help Booking</p>
                <p>it's Free</p>
                <p>Call Experts 24X7X365</p>
                <p>1-213-225-9867</p>

                <div class="cardFooter">
                    World's Largest Cruise Agency
                </div>

            </div> -->
    </div>
    <!-- end -->
    <script src="js/index.js"></script>
    <script src="jsjquery.min.js"></script>
    <script src="js/2.3.4/owl.carousel.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>