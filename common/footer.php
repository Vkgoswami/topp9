<!-- footer -->
<footer>
        <div class="container">
            <!-- top footer -->
            <div class="top-footer pb-5">
                <div class="tf-menu col-md-3">
                    <ul>
					<?php 
						$banQuery="select * from pages where page_id!=1";
						$bresult = mysqli_query($conn, $banQuery);
						while($row = mysqli_fetch_assoc($bresult)){
					?>
                        <li>
                            <a href="<?=$row['page_slug'];?>"><?=$row['page_name'];?></a>
                        </li>
					<?php } ?>	
                    </ul>
                </div>
                <div class="tf-games col-md-5">
                    <ul>
					<?php
						$catQuery="SELECT C.*, S.* FROM categories as C, subcategories as S WHERE C.cat_slug='".$subdomain."' AND FIND_IN_SET(C.cat_id,S.category_id) > 0 order by S.subcat_name ASC Limit 0,5";
						$cresult = mysqli_query($conn, $catQuery);
						while($row = mysqli_fetch_assoc($cresult)){
					?>
                        <li>
						<a href="<?=$row['subcat_slug']?>"><?=$row['subcat_name']?></a>
                        </li>
					<?php } ?>
                    </ul>
                </div>
                <div class="tf-content col-md-4 ">
                    <p><span>Topp 9</span> is an independent source of information about online casinos and casino games that are not controlled by any gaming operator. Our independent expert team members put their best expertise and judgment into all our evaluations and suggestions, but they are merely for informative purposes and should not be construed as legal advice.</p>
                </div>
            </div>
        </div>

        <!-- middle footer -->
        <div class="middle-footer">
            <div class="container">
                <div class="mf-content">
                    <div class="mf-menu col-md-8">
                        <ul>
						<?php 
							$banQuery="select * from pages where page_id!=1";
							$bresult = mysqli_query($conn, $banQuery);
							while($row = mysqli_fetch_assoc($bresult)){
						?>
							<li>
								<a href="<?=$row['page_slug'];?>"><?=$row['page_name'];?></a>
							</li>
						<?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="mfr-content">
                            <div class="icons">
                                <ul>
                                    <li>
                                        <i class="fa-brands fa-twitter"></i>
                                    </li>
                                    <li>
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </li>
                                    <li>
                                        <i class="fa-brands fa-youtube"></i>
                                    </li>
                                    <li>
                                        <i class="fa-brands fa-instagram"></i>
                                    </li>
                                    <li>
                                        <i class="fa-brands fa-weixin"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="select-language">
                                <p >NEVER MISS A MOMENT</p>
                                <button>
                                    <i class="text-center">
                                        <img src="../assets/images/footer-btn-img.png" alt="foter-img-btn">
                                    </i>
                                    <select name="" id="" class="border-none">
                                        <option value="Select Language">Select Language</option>
										<option value="English" selected>English</option>
                                    </select>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </footer>
    <!-- bottom footer -->
    <div class="bottom-footer">
        <div class="container">
            <p>&copy; Copyright 2023 - Casino Review | Shoogloo </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/custom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>