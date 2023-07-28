<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	if(isset($_POST['vpn']) && $_POST['vpn']!=''){
	$name = addslashes($_POST['name']);
	$slug = addslashes($_POST['slug']);
	$countries=implode(",", $_POST['cats']);
	$cats=implode(",", $_POST['scats']);
	$methods = implode(',',$_POST['methods']);
	$link = addslashes($_POST['link']);
	$email = addslashes($_POST['email']);
	$phone = addslashes($_POST['phone']);
	$currency = addslashes($_POST['currency']);
	$oarating = addslashes($_POST['oarating']);
	$strating = addslashes($_POST['strating']);
	$gsrating = addslashes($_POST['gsrating']);
	$bprating = addslashes($_POST['bprating']);
	$dwrating = addslashes($_POST['dwrating']);
	$owner = addslashes($_POST['owner']);
	$yearest = addslashes($_POST['yearest']);
	$nogames = addslashes($_POST['nogames']);
	$games = addslashes($_POST['games']);
	$devices = addslashes($_POST['devices']);
	$payrate = addslashes($_POST['payrate']);
	$paydays = addslashes($_POST['paydays']);
	$langs = addslashes($_POST['langs']);
	$support = addslashes($_POST['support']);
	$payspeed = addslashes($_POST['payspeed']);
	$maxjackpot = addslashes($_POST['maxjackpot']);
	$mtitle = addslashes($_POST['mtitle']);
	$mdesc = addslashes($_POST['mdesc']);
	$mkeyw = addslashes($_POST['mkeyw']);
	$pros = addslashes($_POST['pros']);
	$cons = addslashes($_POST['cons']);
	$tab1 = addslashes($_POST['tab1']);
	$tab2 = addslashes($_POST['tab2']);
	$tab3 = addslashes($_POST['tab3']);
	$tab4 = addslashes($_POST['tab4']);
	$tab1c = addslashes($_POST['tab1c']);	
	$tab2c = addslashes($_POST['tab2c']);
	$tab3c = addslashes($_POST['tab3c']);
	$tab4c = addslashes($_POST['tab4c']);
	$featured = addslashes($_POST['feature']);
	$user = addslashes($_POST['username']);
	$bonus = addslashes($_POST['bonus']);

        for($x=0; $x<count($_FILES['img']['tmp_name']); $x++ ) {

            echo $file_name = $_FILES['img']['name'][$x];
            $file_size = $_FILES['img']['size'][$x];
            $file_tmp  = $_FILES['img']['tmp_name'][$x];
			
			if($_FILES['img']['tmp_name'][0]!=''){
				$file_name1 = $_FILES['img']['name'][0];
			}else{
				$file_name1 = $_POST["logo"];
			}
			
			if($_FILES['img']['tmp_name'][1]!=''){
				$file_name2 = $_FILES['img']['name'][1];
			}else{
				$file_name2 = $_POST["icon"];
			}
			
            $t = explode(".", $file_name);
            $t1 = end($t);
            $file_ext = strtolower(end($t));

            $ext_boleh = array("jpg", "jpeg", "png", "gif", "bmp");

            if(in_array($file_ext, $ext_boleh)) {
				
                $tujuan = "images/".$file_name;
                move_uploaded_file($file_tmp, $tujuan);                
            }
        }
        
        if(isset($_POST['id']) && $_POST['id'] != ''){	
			$sql = "UPDATE vpn_tbl SET name='$name', slug='$slug', icon='$file_name2', logo='$file_name1', countries='$countries', categories='$cats', pay_methods='$methods', ofc_link='$link', email='$email', phone='$phone', currency='$currency', oa_rating='$oarating', st_rating='$strating', gs_rating='$gsrating', bp_rating='$bprating', dw_rating='$dwrating', owner='$owner', year_est='$yearest', num_games='$nogames', games_offers='$games', comp_devices='$devices', pay_rate='$payrate', pay_days='$paydays', langs='$langs', support='$support', pay_speed='$payspeed', max_jackpot='$maxjackpot', mtitle='$mtitle', mdesc='$mdesc', mkeyw='$mkeyw', pros='$pros', cons='$cons', tab1='$tab1', tab2='$tab2', tab3='$tab3', tab4='$tab4', tab1c='$tab1c', tab3c='$tab2c', tab2c='$tab3c', tab4c='$tab4c', featured='$featured',user='$user',bonus='$bonus' WHERE id='".$_POST['id']."'";
		}else{
		   $sql = "INSERT INTO vpn_tbl(name, slug, icon, logo, countries, categories, pay_methods, ofc_link, email, phone, currency, oa_rating, st_rating, gs_rating, bp_rating, dw_rating, owner, year_est, num_games, games_offers, comp_devices, pay_rate, pay_days, langs, support, pay_speed, max_jackpot, mtitle, mdesc, mkeyw, pros, cons, tab1, tab2, tab3, tab4, tab1c, tab3c, tab2c, tab4c, featured, user, bonus) VALUES ('$name','$slug','$file_name2','$file_name1','$countries','$cats','$methods','$link','$email','$phone','$currency','$oarating','$strating','$gsrating','$bprating','$dwrating','$owner','$yearest','$nogames','$games','$devices','$payrate','$paydays','$langs','$support','$payspeed','$maxjackpot','$mtitle','$mdesc','$mkeyw','$pros','$cons','$tab1','$tab2','$tab3','$tab4','$tab1c','$tab2c','$tab3c','$tab4c','$featured','$user', '$bonus')";
		}
		$query = mysqli_query($conn, $sql);							
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
		<div class="col-md-4 col-xs-12">
			<h2 class="form-signup-heading">View Merchants</h2>
		</div>
		<div class="col-md-8 col-xs-12">
			<form method="post" action="">
				<input type="text" name="search" style="width:400px;margin-top:25px" value="<?=(isset($_POST['search']) && $_POST['search']!='')?$_POST['search']:''?>" placeholder="Search Merchant Name"/>
				<input type="submit" value="Search Merchant">
			 </form>
		</div>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>
			  <th scope="col">icon</th>
			  <th scope="col">Logo</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			if(isset($_POST['search']) && $_POST['search']!=''){
				$selectQuery="select * from vpn_tbl WHERE name LIKE '%".$_POST['search']."%' AND featured!=3";
			}else{	
				$selectQuery="select * from vpn_tbl WHERE featured!=3";
			}
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){	
			  if(trim($row['icon'])==''){$vpnIcon = '<span style="color:red;">No</span>';}else{$vpnIcon = 'Yes';}
			  if(trim($row['logo'])==''){$vpnLogo = '<span style="color:red;">No</span>';}else{$vpnLogo = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['name']?></td>
			  <td><?=$vpnIcon?></td>
			  <td><?=$vpnLogo?></td>
			  <td><a href="add-merchant.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
			</tr>
			<?php $count++; } ?>
		  </tbody>
		</table>		
	  </div>
	</div>
</div>
<?php include "common/admin-footer.php";?>	
</body>
</html>