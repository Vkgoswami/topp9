<?php
//phpinfo();
ob_start("minifier"); 
function minifier($code) { 
    $search = array(           
        // Remove whitespaces after tags 
        '/\>[^\S ]+/s',           
        // Remove whitespaces before tags 
        '/[^\S ]+\</s',   
        // Remove multiple whitespace sequences 
        '/(\s)+/s',   
        // Removes comments 
        '/<!--(.|\s)*?-->/'
    ); 
    $replace = array('>', '<', '\\1'); 
    $code = preg_replace($search, $replace, $code); 
    return $code; 
} 
?>
<!DOCTYPE html>
<html lang="en">
   <?php 
	$page= 1;
	$slug = $subdomain;
	$mtitle = 'Topp9: Best Indian Casino Reviews Providers';
	$mdesc = '';
	$mkeyw = '';
	include 'common/head.php';
	?>
   <body>
      <?php include 'common/header.php'; ?>
      <?php?> 
            <!-- slider  -->
    <section class="mt-5 mb-3">
        <div class="container">
        
            <div class="owl-carousel owl-theme">  
            <?php 
               $banQuery="select * from banners where page_type=$page AND page_url='".$slug."'";
               $bresult = mysqli_query($conn, $banQuery);
               while($row = mysqli_fetch_assoc($bresult)){
            ?>
                <div class="item"><img src="assets/banners/<?=$row['banner_img']?>" alt=""></div>
            <?php } ?>    
            </div>
        </div>
    </section>


    <!-- buttons -->
    <div class="container">
        <div class="header-buttons">
            <div>
                <button>
                    <img src="../assets/images/button-img-1.png" alt="">
                    <p>BEST ONLINE CASINOS</p>
                    
                    <i class="fa-sharp fa-solid fa-greater-than"></i>
                </button>
            </div>
            <div>
                <button>
                    <img src="../assets/images/button-img-2.png" alt="">
                    <p>INDIAN CASINO GAMES</p>                    
                    <i class="fa-sharp fa-solid fa-greater-than"></i>
                </button>
            </div>
            <div>
                <button>
                    <img src="../assets/images/button-img-3.png" alt="">
                    <p>REAL MONEY CASINOS   </p>
                    <i class="fa-sharp fa-solid fa-greater-than"></i>
                </button>
            </div>
        </div>
    </div>
    <section class="online-casino mb-3">
        <div class="container">
            <h2>BEST ONLINE CASINOS 2023</h2>
        </div>
    </section>
    <!-- best online casino section copy starts -->
    <section id="best-casino-list" class="mt-3">
        <div class="container">
            <div class="casino-lists-heading">
                <div class="row">
                    <div class="col-md-3">
                        <p class="text-center">Casino Names</p>
                    </div>
                    <div class="col-md-3">
                        <p class="text-center">Bonus</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center">Rating</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center">Payments</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center">Play now</p>
                    </div>
                </div>
            </div>
            <div class="casino-lists">
            <?php 	
                $query="SELECT C.*, V.* FROM categories as C, vpn_tbl as V WHERE C.cat_slug='".$subdomain."' AND C.cat_id=V.countries order by V.id DESC limit 0, 8";
                $data = mysqli_query($conn, $query);
                $items = mysqli_num_rows($data);
                $rank = 1;
                while($row = mysqli_fetch_assoc($data)) {
                $payMethods = $row['pay_methods'];
            ?>
                <div class="casino mb-3">
                    <div class="row">
                        <div class="col-md-3 right-border">
                            <div class="casino-logo-wrapper">
                                <div class="casino-logo">
                                <img src="assets/merchant/<?=$row['logo']?>" alt="<?=$row['name']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 right-border">
                            <div class="casino-details">
                                <p>
                                    <?=$row['name']?><br><br>
                                    <i>LIVE CASINO BONUS UPTO</i>
                                    <span><?=$row['bonus']?></span>   
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2 right-border">
                            <div class="casino-rating">                            
                            <strong><?=$row['oa_rating'];?></strong>
                               <ul class="d-flex ">
                                <?php
                                          for($x=1;$x<=$row['oa_rating'];$x++) {
                                             echo '<i class="fa-solid fa-star" style="color: #f09719;"></i> ';
                                          }
                                          if (strpos($row['oa_rating'],'.')) {
                                             echo '<i class="fa-solid fa-star-half-stroke" style="color: #f09719;"></i>';
                                             $x++;
                                          }
                                          while ($x<=5) {
                                             echo '<i class="fa-solid fa-star-o" style="color: #f09719;"></i>';
                                             $x++;
                                          }
                                       ?>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 right-border">
                            <div class="casino-payments">
                                <?php 
                                    $query2="select * from softwares";
                                    $data2 = mysqli_query($conn, $query2);
                                    while($row2 = mysqli_fetch_assoc($data2)){
                                    $osArray = explode(',', $payMethods);
                                    if(in_array($row2['software_id'], $osArray)){	
                                 ?>
                                    <img src="/assets/payImg/<?=$row2['software_icon']?>" width="42"/>
                                 <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="casino-btn">
                                <a href="<?=$row['slug']?>">
                                    <img src="../assets/images/get-bonus-btn.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php } ?>    
            </div>
        </div>
    </section>
    <!-- best online casino section copy ends -->

    <?php 
        $i=1;
        $secQuery="select * from section where page_type=$page AND page_url='".$slug."'";
        $sresult = mysqli_query($conn, $secQuery);
        while($row = mysqli_fetch_assoc($sresult)){
            $section = 'section'.$i;
            $$section  = $row['sec_id'];
            $i++;
        }
        $query = "select * from section where sec_id='".$section1."'"; 
        $result = mysqli_query($conn, $query);
        $sec1 = mysqli_fetch_assoc($result);
        $s1id = $sec1['sec_id'];
    ?>
    
    <!-- rate and   review -->
    <section class="review-casino">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center"><?=$sec1['sec_title'];?></h2>
            </div>
            <div class=" casino-services ">
                <div class="casino-services-left">
                    <div class="rate-review-card row">
                    <?php 
                        $dtQuery="select * from data where sid=$s1id";
                        $dresult = mysqli_query($conn, $dtQuery);
                        while($row = mysqli_fetch_assoc($dresult)){
                    ?> 
                        <div class="col-md-6">
                            <div class="casino-cards">
                                <div class="services-icon p--4">
                                    <img src="../assets/dataImg/<?=$row['data_icon']?>" alt="<?=$row['data_name']?>">
                                </div>
                                <div class="services-content">
                                    <h5><?=$row['data_name']?></h5>
                                    <?=$row['data_desc']?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        $query = "select * from section where sec_id='".$section2."'"; 
        $result = mysqli_query($conn, $query);
        $sec2 = mysqli_fetch_assoc($result);
        $s2id = $sec2['sec_id'];
    ?>
    <!-- best online casino  -->
    <div class="best-casinos">
        <div class="container">
            <div class="offset-md-5 col-md-7 best-casino">
                <h1><?=$sec2['sec_title']?></h1>
                <?=$sec2['sec_desc']?>
            </div>
        </div>
    </div>

    <!-- Play At different Casino -->
    <section class="play-at-casino">
        <div class="container d-flex justify-content-evenly gap-20px">
            <?php 
                $dtQuery="select * from data where sid=$s2id";
                $dresult = mysqli_query($conn, $dtQuery);
                while($data = mysqli_fetch_assoc($dresult)){
            ?>        
            <div class="col-md-4 text-center p-5 pa-card ">
                <div class="pa-logo">
                    <img src="../assets/dataImg/<?=$data['data_icon']?>" alt="<?=$data['data_name']?>" />
                </div>
                <div class="pa-content">
                    <h3><?=$data['data_name']?></h3>
                    <?=$data['data_desc']?>
                </div>
                <div class="pa-btn">
                    <a href="<?=$data['link']?>"><button>PLAY <?=$data['data_name']?></button></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <?php
        $query = "select * from section where sec_id='".$section3."'"; 
        $result = mysqli_query($conn, $query);
        $sec3 = mysqli_fetch_assoc($result);
        $s3id = $sec3['sec_id'];
    ?>

    <!-- why trust online casino -->
    <div class="why-online-casino">
        <div class="container">
            <div class="offset-md-4 col-md-8 play-online-casino">
                <div class="play-online-casino-content">
                    <img src="../assets/images/why-online-casino.png" alt="section-logo">
                    <h1><?=$sec3['sec_title']?></h1>
                    <div class="woc">
                        <?=$sec3['sec_desc']?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- legality and responsible gambling -->
    <div class="container">
        <div class="legality-responsible-gambling verification-process row">
            <?php 
                $dtQuery="select * from data where sid=$s3id";
                $dresult = mysqli_query($conn, $dtQuery);
                while($row = mysqli_fetch_assoc($dresult)){
            ?> 
                <div class="fairness mt-3 legality-card col-md-6">
                    <img src="../assets/dataImg/<?=$row['data_icon']?>" alt="<?=$row['data_name']?>">
                    <h3><?=$row['data_name']?></h3>
                    <?=$row['data_desc']?>
                </div>
            <?php } ?>    
       </div>
    </div>
    <?php
        $query = "select * from section where sec_id='".$section4."'"; 
        $result = mysqli_query($conn, $query);
        $sec4 = mysqli_fetch_assoc($result);
        $s4id = $sec4['sec_id'];
    ?>
    <!-- play online for real money  -->
    <div class="play-online">
        <div class="container">
            <div class="offset-md-4 col-md-8 play-online-content">
                <div>
                    <h1><?=$sec4['sec_title']?></h1>
                    <div class="p-online">
                        <?=$sec4['sec_desc']?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Type of Casino -->
    <section>
        <div class="container pt-5">
            <div class="col-box casino-type d-flex flex-wrap">
            <?php 
                $dtQuery="select * from data where sid=$s4id";
                $dresult = mysqli_query($conn, $dtQuery);
                while($data = mysqli_fetch_assoc($dresult)){
            ?>  
                <div class="tc-card">
                    <p class="text-center"><img decoding="async" loading="lazy" src="../assets/dataImg/<?=$data['data_icon'];?>"
                            alt="<?=$data['data_name'];?>" width="150" height="150"></p>
                    <h3 class="text-center"><?=$data['data_name'];?></h3>
                    <?=$data['data_desc'];?>
                </div>
            <?php } ?>    
            </div>
        </div>
    </section>

    <?php
        $query = "select * from section where sec_id='".$section5."'"; 
        $result = mysqli_query($conn, $query);
        $sec5 = mysqli_fetch_assoc($result);
        $s5id = $sec5['sec_id'];
    ?>

    <!-- TRADITIONAL INDIAN CASINO GAMES  -->
    <section class="ind-casino ">
        <div class="ind-casino-content container">
            <h2 class="title-bg "><?=$sec5['sec_title']?></h2>
            <p class="ind-casino-about">
                <?=$sec5['sec_desc']?>
            </p>
        </div>
        <div class="container game-about ">
            <div class="game d-flex flex-wrap justify-content-center">
            <?php 
                $dtQuery="select * from data where sid=$s5id";
                $dresult = mysqli_query($conn, $dtQuery);
                while($row = mysqli_fetch_assoc($dresult)){
            ?>  
                <div class="d-flex">
                    <div class="game-logo">
                        <img src="../assets/dataImg/<?=$row['data_icon']?>" alt="<?=$row['data_name']?>">
                    </div>
                    <div class=" about-game">
                        <h4><?=$row['data_name']?></h4>
                        <?=$row['data_desc']?>
                    </div>
                </div>
            <?php } ?>    
            </div>
        </div>
    </section>

    <!--payment methods  -->
    <?php
        $query = "select * from section where sec_id='".$section6."'"; 
        $result = mysqli_query($conn, $query);
        $sec6 = mysqli_fetch_assoc($result);
        $s6id = $sec5['sec_id'];
    ?>             
    <div id="payment-methods" >
        <div class="container">
            <div class="payments-heading">
                <h2><?=$sec6['sec_title']?></h2>
            </div>
            <?=$sec6['sec_desc']?>
            <div class="payment-mode">
            <?php 
               $payQuery="select * from softwares where page_type=$page AND page_url='".$slug."' limit 0, 3";
               $presult = mysqli_query($conn, $payQuery);
               while($row = mysqli_fetch_assoc($presult)){
            ?>
                <div class="googlepay ">
                    <img src="../assets/payImg/<?=$row['software_icon']?>" alt="logo">
                    <h5><?=$row['software_name']?></h5>
                    <?=$row['soft_desc']?>
                </div>
            <?php } ?>
         </div>
    </div>
    <section class="gambling-section">
        <div class="container">
            <div class="row">
                <div class="com-md-12">
                    <div class="gambling-about">
                    <h2> A Comprehensive Guide To Online Gambling Sites In India </h2>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include 'common/footer.php'; ?>
</body>
</html>
<?php 
ob_end_flush(); 
?> 