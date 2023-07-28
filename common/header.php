<!-- header -->
<header class="t9-header">
        <div class="container">
            <div class="t9-top-header  d-flex justify-content-between  pt-5">
                <div class="t9-logo">
                    <a href="/"><img src="../assets/images/logo.png" alt="Logo"></a>
                </div>
                <div class="t9-menu text-center">
                    <ul class="d-flex">
					<?php
						$catQuery="SELECT C.*, S.* FROM categories as C, subcategories as S WHERE C.cat_slug='".$subdomain."' AND FIND_IN_SET(C.cat_id,S.category_id) > 0 order by S.subcat_name ASC Limit 0,5";
						$cresult = mysqli_query($conn, $catQuery);
						while($row = mysqli_fetch_assoc($cresult)){
					?>	
                        <li>
                            <a href="<?=$row['subcat_slug']?>"><?=$row['subcat_name']?></a>
                            <img src="../assets/images/header-dropdown.png" alt="">
                        </li>
					<?php } ?>	
                    </ul>
                </div>
            </div>
            <?php if($page!=1){?>
            <div class="middle-header">
                <div class="row">
                    <div class="m-header-content col-md-5 pt-5">
                        <img src="../assets/merchant/<?=$icon?>" alt="<?=$icon?>">
                        <p>We rated Casino Days 5 out of 5 stars. This site checks several boxes and they are highly
                            localized for Indian players, offering: INR payments, have local games and have a dedicated
                            site for Indians. We highly recommend CasinoDays,<br>
                            Casino Days CA 2023 Review - We test the online casino's huge range of casino games &
                            promotions, plus all the details on the site's payouts and security.<br><br>
                            visit them here on casinodays.com/in >></p>

                        <div class="rating">
                        <?php
                           for($x=1;$x<=$oarating;$x++) {
                              echo '<i class="fa-solid fa-star fa-2xl"></i> ';
                           }
                           if (strpos($oarating,'.')) {
                              echo '<i class="fa-solid fa-star-half-stroke fa-2xl" aria-hidden="true"></i>';
                              $x++;
                           }
                           while ($x<=5) {
                              echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                              $x++;
                           }
                        ?>
                            <img src="../assets/images/top-ratings.png" alt="top-rated">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="../assets/images/middle-header-img.png" alt="header-main-img">
                    </div>
                </div>

                <div class="review-and-ratings">

                    <div class="col-md-3 text-center">
                        <div class="how-much-rating">                            
                           <?php
                              for($x=1;$x<=$strating;$x++) {
                                 echo '<i class="fa-solid fa-star fa-xs"></i> ';
                              }
                              if (strpos($strating,'.')) {
                                 echo '<i class="fa-solid fa-star-half-stroke fa-xs" aria-hidden="true"></i>';
                                 $x++;
                              }
                              while ($x<=5) {
                                 echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                 $x++;
                              }
                           ?>
                        </div>
                        <p>Security & Trust Rating</p>

                    </div>
                    <div class="col-md-3 text-center">
                        <div class="how-much-rating">                           
                            <?php
                              for($x=1;$x<=$gsrating;$x++) {
                                 echo '<i class="fa-solid fa-star fa-xs"></i> ';
                              }
                              if (strpos($gsrating,'.')) {
                                 echo '<i class="fa-solid fa-star-half-stroke fa-xs" aria-hidden="true"></i>';
                                 $x++;
                              }
                              while ($x<=5) {
                                 echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                 $x++;
                              }
                           ?>
                        </div>
                        <p>Games & Software Rating </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="how-much-rating">                              
                            <?php
                              for($x=1;$x<=$dwrating;$x++) {
                                 echo '<i class="fa-solid fa-star fa-xs"></i> ';
                              }
                              if (strpos($dwrating,'.')) {
                                 echo '<i class="fa-solid fa-star-half-stroke fa-xs" aria-hidden="true"></i>';
                                 $x++;
                              }
                              while ($x<=5) {
                                 echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                 $x++;
                              }
                           ?>
                        </div>
                        <p>Deposits & withdrawal Rating </p>
                    </div>
                    <div class="text-center col-md-3">
                        <div class="how-much-rating">
                           <?php
                              for($x=1;$x<=$bprating;$x++) {
                                 echo '<i class="fa-solid fa-star fa-xs"></i> ';
                              }
                              if (strpos($bprating,'.')) {
                                 echo '<i class="fa-solid fa-star-half-stroke fa-xs" aria-hidden="true"></i>';
                                 $x++;
                              }
                              while ($x<=5) {
                                 echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                 $x++;
                              }
                           ?>
                        </div>
                        <p>Bonus & Promotion Rating </p>
                    </div>
                </div>
            </div>
        <!-- bottom header -->
        <div class="bottom-header">
            <ul class="bottom-header-menu">
                <li class="d-flex">
                    <img src="../assets/images/operator.png" alt="operator">
                    <p>OPERATOR DETAILS</p>
                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">


                <li>
                    <img src="../assets/images/games-img.png" alt="games-logo">
                    <p>GAMES AND PROVIDERS</p>

                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">


                <li>
                    <img src="../assets/images/bank-img.png" alt="bank-logo">
                    <p>BANKING AND PAYMENTS</p>

                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">


                <li>
                    <img src="../assets/images/devices.png" alt="devices-logo">
                    <p>DEVICES AND APPS</p>


                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">


                <li>
                    <img src="../assets/images/bonus-img.png" alt="">
                    <p>BONUSES AND REQUIREMENTS</p>

                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">


                <li>
                    <img src="../assets/images/call-center-img.png" alt="">
                    <p>CUSTOMER SUPPORT</p>
                </li>
                <img src="../assets/images/bottom-header-dropdown.png" alt="">

            </ul>
        </div>
            <?php } else { ?>    
            <div class="banner d-flex flex-column justify-content-evenly ">
                <div class="header-title">
                    <h1>Online Casino <br />
                        <span> Reviews & Ratings</span>
                    </h1>
                    <p class="pt-2">
                        On this page, you will find the structure for each of the data<br />
                        points that we are analyzing when deciding the rating in<br />
                        our casino reviews.
                    </p>
                </div>
                <div class="casino-img-header ">
                    <img src="../assets/images/casino.header.png.png" alt="Casino">
                </div>
            </div>
           <?php } ?>
        </div>
    </header>

