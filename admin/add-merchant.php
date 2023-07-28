<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['id'])){
$Id = $_GET['id'];
$query = "select * from vpn_tbl where id='".$Id."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
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
$mkeyw = $row[30];
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
if(isset($username) && $username==''){
	$username = $_SESSION['username'];
}	
}else{
$Id = '';
$mArray = [];
$cArray = [];
$catArray = [];
}	
?>
<!DOCTYPE html>
<html lang="en">  
	<?php include "common/admin-header.php";?>
   <body>	
	<div class="container">
		<div class="row">
		  <div class="col-md-3 col-xs-12">
			<?php include "common/left-nav.php";?>	
		  </div>
		  <div class="col-md-9 col-xs-12">
			<form method="post" action="view-merchant.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Merchant</h2>
				<div class="col-md-6 col-xs-12" style="padding-left:0">
					<input name="name" id="name" type="text" class="form-control" placeholder="Name" value="<?=($Id)?$name:''?>"><br>
					<label style="margin-top:12px;">Select Countries:</label>
					<select name="cat" class="form-control">
						<option value="">select countries</option>
						<?php
						$query=mysqli_query($conn, "select * from categories order by cat_name ASC");
						while($row = mysqli_fetch_array($query)) { 
						?>
						<option value="<?=$row['cat_id']?>" <?php echo in_array($row['cat_id'], $cArray)?$checked = 'selected':$checked='';?>><?=$row['cat_name']?></option>
						<?php } ?>
					</select><br>
					<label style="margin-top:12px;">Select Category:</label>
					<select name="scats[]" id="subcategories" class="form-control" multiple onchange="checkName()">
						<option value="">select</option>
						<?php
						$query=mysqli_query($conn, "select * from subcategories order by subcat_name ASC");
						while($row = mysqli_fetch_array($query)) { 
						?>
						<option value="<?=$row['subcat_id']?>" <?php echo in_array($row['subcat_id'], $catArray)?$checked = 'selected':$checked='';?>><?=$row['subcat_name']?></option>
						<?php } ?>
					</select><br><br>
					<label style="margin-top:10px;">Logo:</label> <?=(isset($logo) && $logo!='')?$logo:''?><br>
					<input type="file" name="img[]"><br><br>
					
					<div class="col-md-6 col-xs-12" style="padding-left:0">
					    <input name="email" id="email" type="email" class="form-control" placeholder="Email Address" value="<?=($Id)?$email:''?>"><br>
						<input name="oarating" id="orating" type="text" class="form-control" placeholder="Overall Rating" value="<?=($Id)?$oarating:''?>" ><br>	
						<input name="dwrating" id="dwrating" type="text" class="form-control" placeholder="Deposits and Withdrawals" value="<?=($Id)?$dwrating:''?>" ><br>
						<input name="games" id="games" type="text" class="form-control" placeholder="Games Offered" value="<?=($Id)?$games:''?>" ><br>						
						<input name="langs" id="langs" type="text" class="form-control" placeholder="Languages" value="<?=($Id)?$langs:''?>" ><br>	
						<input name="tab1" id="tab1" type="text" class="form-control" placeholder="Tab1 Heading" value="<?=($Id)?$tab1:''?>" ><br>							
					</div>					
					<div class="col-md-6 col-xs-12">
					    <input name="bonus" id="bonus" type="text" class="form-control" placeholder="Welcome Bonus" value="<?=($Id)?$bonus:''?>"><br>
						<input name="strating" id="plans" type="text" class="form-control" placeholder="Security & Trust Rating" value="<?=($Id)?$strating:''?>" ><br>
						<input name="owner" id="owner" type="text" class="form-control" placeholder="Owner Name" value="<?=($Id)?$owner:''?>" ><br>
						<input name="devices" id="devices" type="text" class="form-control" placeholder="Compatible Devices" value="<?=($Id)?$devices:''?>" ><br>				
						<input name="support" id="support" type="text" class="form-control" placeholder="Customer Support" value="<?=($Id)?$support:''?>" ><br>
						<input name="tab2" id="tab2" type="text" class="form-control" placeholder="Tab2 Heading" value="<?=($Id)?$tab2:''?>" ><br>
					</div>
				</div>	
				<div class="col-md-6 col-xs-12">
					<input name="slug" id="slug" type="text" class="form-control" placeholder="Url" value="<?=($Id)?$slug:''?>" ><span style="color:red" id="warning"></span><br>
					<label style="margin-top:12px;">Official Link:</label>
					<input name="link" id="link" type="text" class="form-control" placeholder="Link" value="<?=($Id)?$link:''?>" ><br>
					<label style="margin-top:12px;">Deposit & Payout Methods:</label>
					<select name="methods[]" id="methods" multiple class="form-control">
						<option value="">Select Methods</option>
						<?php 
							$selectQuery="select * from softwares";
							$result = mysqli_query($conn, $selectQuery);
							while($row = mysqli_fetch_assoc($result)){ 
						?>
						<option value="<?=$row['software_id']?>" <?php echo in_array($row['software_id'], $mArray)?$checked = 'selected':$checked='';?>><?=$row['software_name']?></option>
						<?php } ?>
					</select><br><br>
					<label style="margin-top:10px;">Icon:</label> <?=(isset($icon) && $icon!='')?$icon:''?><br>					
					<input type="file" name="img[]"><br><br>
					<div class="col-md-6 col-xs-12">
						<input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Number" value="<?=($Id)?$phone:''?>"><br>
						<input name="gsrating" id="gsrating" type="text" class="form-control" placeholder="Games and Software" value="<?=($Id)?$gsrating:''?>" ><br>	
						<input name="yearest" id="yearest" type="text" class="form-control" placeholder="Year Established" value="<?=($Id)?$yearest:''?>" ><br>
						<input name="payrate" id="payrate" type="text" class="form-control" placeholder="Payout Percentage" value="<?=($Id)?$payrate:''?>" ><br>						
						<input name="payspeed" id="payspeed" type="text" class="form-control" placeholder="Payout Speed" value="<?=($Id)?$payspeed:''?>" ><br>	
						<input name="tab3" id="tab4" type="text" class="form-control" placeholder="Tab3 Heading" value="<?=($Id)?$tab3:''?>" ><br>
					</div>					
					<div class="col-md-6 col-xs-12">
						<input name="currency" id="currency" type="text" class="form-control" placeholder="Bitcoin & Crypto Currency" value="<?=($Id)?$currency:''?>"><br>
						<input name="bprating" id="bprating" type="text" class="form-control" placeholder="Bonuses and Promotions" value="<?=($Id)?$bprating:''?>" ><br>	
						<input name="nogames" id="nogames" type="text" class="form-control" placeholder="Number of Games" value="<?=($Id)?$nogames:''?>" ><br>
						<input name="paydays" id="paydays" type="text" class="form-control" placeholder="Payout Days" value="<?=($Id)?$paydays:''?>" ><br>						
						<input name="maxjackpot" id="maxjackpot" type="text" class="form-control" placeholder="Max Jackpot" value="<?=($Id)?$maxjackpot:''?>" ><br>	
						<input name="tab4" id="tab4" type="text" class="form-control" placeholder="Tab4 Heading" value="<?=($Id)?$tab4:''?>" ><br>
					</div>
				</div><br><br>
				<input name="mtitle" id="mtitle" type="text" class="form-control" placeholder="Meta Title" value="<?=($Id)?$mtitle:''?>" ><br>
				<input name="mdesc" id="mdesc" type="text" class="form-control" placeholder="Meta Description" value="<?=($Id)?$mdesc:''?>" ><br>
				<input name="mkeyw" id="mkeyw" type="text" class="form-control" placeholder="Meta Keywords" value="<?=($Id)?$mkeyw:''?>" ><br>
				
				<label>Pros:</label>
				<span id="textareaId"><textarea class="form-control" id="pros" name="pros"><?=($Id)?$pros:''?></textarea></span><br>
				<label>Cons:</label>
				<span id="textareaId"><textarea class="form-control" id="cons" name="cons"><?=($Id)?$cons:''?></textarea></span><br>
				<label>Tab1 Content:</label>
				<span id="textareaId"><textarea class="form-control" id="tab1c" name="tab1c"><?=($Id)?$tab1c:''?></textarea></span><br>
				<label>Tab2 Content:</label>
				<span id="textareaId"><textarea class="form-control" id="tab2c" name="tab2c"><?=($Id)?$tab2c:''?></textarea></span><br>
				<label>Tab3 Content:</label>
				<span id="textareaId"><textarea class="form-control" id="tab3c" name="tab3c"><?=($Id)?$tab3c:''?></textarea></span><br>	
				<label>Tab4 Content:</label>
				<span id="textareaId"><textarea class="form-control" id="tab4c" name="tab4c"><?=($Id)?$tab4c:''?></textarea></span><br>
				<input type="hidden" name="feature" value="0">
				<input type="checkbox" id="feature" name="feature" value="1" <?=(isset($feature) && $feature)?'checked':''?>>
				<label> Featured</label><br><br>
				<input type="hidden" name="logo" value="<?=($Id)?$logo:''?>">
				<input type="hidden" name="icon" value="<?=($Id)?$icon:''?>">
				<input type="hidden" name="username" value="<?=($Id)?$username:$_SESSION['username']?>">
				<input type="hidden" name="id" value="<?=($Id)?$Id:''?>">
				<input type="submit" id="vpn" name="vpn" value="Submit">
			</form>			
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>
	<script>
		function checkName()
		{ 
		var name=$("#slug").val(); 
		// get the id from textbox
		$.ajax({
				type:"post",
				dataType:"text",
				data:"name="+name,
				url:"/common/checkMerchant.php",   // url of php page where you are writing the query
				success:function(html)
				{ 
					$("#warning").html(html).show();;  // setting the result from page as value of name field
				}
			});
		}
	</script>
  </body>
</html>