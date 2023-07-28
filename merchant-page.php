<!DOCTYPE html>
<html lang="en">
	<?php	
		$page= 3;
		$result = mysqli_query($conn, "SELECT * FROM vpn_tbl where slug='".$slug."'");
		$row = mysqli_fetch_row($result);	
		$id = $row[0];
		$name = $row[1];
        $slug = $row[2];
        $icon = $row[3];
        $logo = $row[4];
        $countries = $row[5];
        $cArray=explode(",", $countries);
        $ccid = $row[6];
        $catArray=explode(",", $ccid);
        $methods = $row[7];
        $mArray = explode(",", $methods);
        $link = $row[8];
        $email = $row[9];
        $phone = $row[10];
        $currency = $row[11];
        $oarating = $row[12];
        $strating = $row[13];
        $gsrating = $row[14];
        $bprating = $row[15];
        $dwrating = $row[16];
        $owner = $row[17];
        $yearest = $row[18];
        $nogames = $row[19];
        $games = $row[20];
        $devices = $row[21];
        $payrate = $row[22];
        $paydays = $row[23];
        $langs = $row[24];
        $support = $row[25];
        $payspeed = $row[26];
        $maxjackpot = $row[27];
        $mtitle = $row[28];
        $mdesc = $row[29];
        $mkeys = $row[30];
        $pros = $row[31];
        $cons = $row[32];
        $tab1 = $row[33];
        $tab2 = $row[34];
        $tab3 = $row[35];
        $tab4 = $row[36];
        $tab1c = $row[37];	
        $tab3c = $row[38];
        $tab2c = $row[39];
        $tab4c = $row[40];
        $feature = $row[41];
        $username = $row[42];
        $bonus = $row[43];
	
		include 'common/head.php';
	?>
   <body>
   <?php include 'common/header.php';?> 
    <!-- site preview -->
    <div class="site-preview">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="device-tabs">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">
                                    <div class="d-flex  tabs-content">
                                        <img src="../assets/images/computer.png" alt="">
                                        <p>Desktop</p>
                                    </div>
                                </button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">
                                    <div class="d-flex tabs-content">
                                        <img src="../assets/images/tablets.png" alt="">
                                        <p>Tablet</p>
                                    </div>
                                </button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">
                                    <div class="d-flex tabs-content">
                                        <img src="../assets/images/mobile-tabs.png" alt="">
                                        <p>Mobile</p>
                                    </div>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="devices-tab">
                                    <img src="../assets/images/tabs-devices-1.png" alt="">
                                    <img src="../assets/images/tabs-devices-2.png" alt="">
                                    <img src="../assets/images/tabs-devices-3.png" alt="">
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">...</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">...</div>
                        </div>
                    </div>
                    <div class="pointer">
                        <i class="fa-solid fa-hand-pointer"></i>
                        <p>Click on the image to view it in full width</p>
                    </div>
                    <!-- Content -->
                    <div class="pros-cons-section">
                        <div class="site-preview-card">
                            <h2>PROS</h2>
                            <div class="props-and-cons col-md-12">

                              <ul>
                                 <?=$pros?>     
                              </ul>
                            </div>
                        </div>

                        <div class="site-preview-card mt-4">
                            <h2>CONS</h2>
                            <div class="props-and-cons col-md-12 ">
                                <ul>
                                    <?=$cons?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="casino-and-bonuses col-md-5 ">
                    <div class="casino-tabs">
                        <ul class="nav nav-pills mb-3 d-flex justify-content-evenly" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-TopOnlineCasinos" aria-selected="true">Top Online
                                    Casinos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-TopCasinosBonuses" aria-selected="false">Top Casinos
                                    Bonuses</button>
                            </li>
                        </ul>


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/stake-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>Stake<br>
                                            Stake Review
                                        </p>
                                    </div>

                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>
                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/betsamigo-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>BetsAmigo<br>
                                            BetsAmigo Review
                                        </p>
                                    </div>
                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>
                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/blazzio-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>Blazzio<br>
                                            Blazzio Review
                                        </p>
                                    </div>
                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>
                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/betandplay-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>BetandPlay<br>
                                            BetandPlay Review
                                        </p>
                                    </div>
                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>
                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/blazzio-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>Blazzio<br>
                                            Blazzio Review
                                        </p>
                                    </div>
                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>
                                <div class="top-onlne-casino-content">
                                    <div class="col-md-3">
                                        <img src="../assets/images/betsamigo-img.png" alt="">
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <p>BetsAmigo<br>
                                            BetsAmigo Review
                                        </p>
                                    </div>
                                    <div class="text-center col-md-3">
                                        <p><span>4.5</span>/5</p>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-regular fa-star-half-stroke fa-xs"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">...</div>
                        </div>
                    </div>
                    <div class="casino-form">
                        <img src="../assets/images/casin0-form.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer id="casinoDay-footer" class="pt-5">
        <div class="container col-md-10">
            <div>
                <img src="../assets/merchant/<?=$icon?>" alt="<?=$icon?>">
            </div>
            <div class="footer-about">
                <?=$tab1c?>
            </div>
        </div>
    </footer>         
   <?php include 'common/footer.php'; ?>
   </body>
 </html>		