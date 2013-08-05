<html>
	<head>
		<title>Notebookspec</title>
		<meta charset='utf-8'>
		<link href="maincss.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="ext_container">
		<div class="header_top clearfix">
		<a id="logo"></a>
		</div>
		<div class="header_bottom clearfix"><font color="#ffffff">ตรวจสอบ Space Notebook</font></div><br>
			<table align=center border=0 width="100%">
				<tr>
					<td>
						<fieldset>
							<center>กรอกข้อมูลตามที่ต้องการ
								<form method="post" action="#">
									ค่ายผูจำหน่าย : 
									<select name="brand">

									<?php
											$bandarray=array();
											$bandcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([BRAND]))\",halt";
											$output = shell_exec($bandcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key],$bandarray)))!=true){
														$bandarray[$key]=$output[$key];
														echo "<option value=\"".$bandarray[$key]."\">".$bandarray[$key];
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>										
									</select>

									CPU : 
									<select name="cpu">

										<?php
											$cpucmd = "swipl -q -f notebook.pl -g \"forall(cpus(CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE),writeln([CPUBRAND,CPUNAME]))\",halt";
											$output = shell_exec($cpucmd);
											$output = explode("[", $output);
											$arrprint =array();
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												$output[$key]=str_replace(",", " ", $value);
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key], $arrprint)))!=true){
														echo "<option value=\"".$output[$key]."\">".$output[$key];
														$arrprint[$key]=$output[$key];
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>
									</select>

									การ์ดจอ : 

									<select name="graphic">
										<?php
											$gpcmd = "swipl -q -f notebook.pl -g \"forall(gpcard(GPBRAND,GPNO,GPSIZE),writeln([GPBRAND,GPNO]))\",halt.";
											$output = shell_exec($gpcmd);
											$output = explode("[", $output);
											$arrprint =array();
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												$output[$key]=str_replace(",", " ", $value);
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key], $arrprint)))!=true){
														echo "<option value=\"".$output[$key]."\">".$output[$key];
														$arrprint[$key]=$output[$key];
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>
									</select>

									<br>

									ความจุ HDD: 
									<select name="hdd">
									
									<?php
											$hddarray=array();
											
											$hddcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([HDD]))\",halt";
											$output = shell_exec($hddcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
														if($value >= 1000){
															$value = $value/1000;
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."TB";
															}
														}else{
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."GB";
															}
														}
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									Memory: 
									<select name="memory">									
									<?php
											$hddarray=array();
											
											$hddcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([MEMORY]))\",halt";
											$output = shell_exec($hddcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
														if($value >= 1000){
															$value = $value/1000;
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."TB";
															}
														}else{
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."GB";
															}
														}
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									น้ำหนัก :
									<select name="weith">
										echo "<option value="-">-
										<option value="1000-2000">1.0 - 2.0 KG
										<option value="2000-3000">2.1 - 3.0 KG
										<option value="3000-4000">3.1 - 4.0 KG
									</select>

									ขนาดจอ : 

									<select name="screen">

										<?php
											$screenarray=array();
											$screencmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([SCREEN]))\",halt";
											$output = shell_exec($screencmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
															$bandarray[$key]=$value;
															echo "<option value=\"".$value."\">".$value." N";
													}
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									<br>

									ระบบปฏิบัติการ : 
									<select name="os">
										
										<?php
											$bandarray=array();
											$bandcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([OS]))\",halt";
											$output = shell_exec($bandcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key],$bandarray)))!=true){
														$bandarray[$key]=$output[$key];
														echo "<option value=\"".$bandarray[$key]."\">".$bandarray[$key];
													} 
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									ราคา : 
									<select name="price">
										<option value="-">-
										<option value="0-10000">0 - 10,000 B
										<option value="10000-20000">10,000 - 20,000 B
										<option value="20000-30000">20,000 - 30,000 B
										<option value="40000-50000">40,000 - 50,000 B
										<option value="50000-60000">50,000 - 60,000 B
										<option value="60000-70000">60,000 - 70,000 B
										<option value="70000-80000">70,000 - 80,000 B
										<option value="80000-90000">80,000 - 90,000 B
										<option value="90000-100000">90,000 - 100,000 B

									</select>

									<br><br><input type="submit" name="submit" value="ยืนยัน"/>
								</form>
							</center>
						</fieldset>
						<?php
							$cmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([PRICE]))\",halt";
							$output = shell_exec($cmd);
							$output = explode("[", $output);
							$countoutput = count($output)-2;
							echo "<center><br>จำนวน Notebook ที่มี : ".$countoutput." รุ่น <center><br><hr width = 80%>";
						?>
					</td>
				</tr>
			</table>

			<?php
				$brand = $_POST['brand'];
				$cpu = $_POST['cpu'];
				$graphic = $_POST['graphic'];
				$hdd = $_POST['hdd'];
				$memory = $_POST['memory'];
				$weith = $_POST['weith'];
				$screen = $_POST['screen'];
				$os = $_POST['os'];
				$price = $_POST['price'];
				$cmd="";
				if($brand=='-'){
					$brand = "BRAND";
				}
				if ($cpu=='-') {
					$cpu = "CPU";
				}
				if ($graphic=='-') {
					$graphic = "GRAPHIC";
				}
				if ($hdd == '-') {
					$hdd = "HDD";
				}
				if ($memory=='-') {
					$memory = "MEMORY";
				}
				if ($weith=='-') {
					$weith="WEITH";
				}
				if ($screen=='-') {
					$screen="SCREEN";
				}
				if ($os=='-') {
					$os="OS";
				}
				if ($price=='-') {
					$price="PRICE";
				}
				if($_POST['submit']=="ยืนยัน"){
					if($weith!="WEITH"||$price!="PRICE"){
						$weithout = explode("-",$weith);
						$priceout = explode("-", $price);

						echo $weithout[0].",".$weithout[1].",".$priceout[0].",".$priceout[1]."<br>";
						if($weith!="WEITH"&&$price=="PRICE"){
							$weith = "WEITH";
							$price = "PRICE";
							$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,".$cpu.",".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,CPUNAME,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith.")),writeln([".$weith.",".$price."]))\",halt";
							echo $cmd;
						}elseif ($weith=="WEITH"&&$price!="PRICE") {
							$weith = "WEITH";
							$price = "PRICE";
							$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,".$cpu.",".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,CPUNAME,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$weith.",".$price."]))\",halt";
							echo $cmd;
						}elseif($weith!="WEITH"&&$price!="PRICE"){
							$weith = "WEITH";
							$price = "PRICE";
							$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,".$cpu.",".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,CPUNAME,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith."),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$weith.",".$price."]))\",halt";
							echo $cmd;
						}else{
							
						}
					}else{
						$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,".$cpu.",".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,CPUNAME,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,CPUNAME,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price."]))\",halt";
					}
					$output = shell_exec($cmd);
	                $anserset = cutarray($output);
	                readarray($anserset);

				}

				function cutarray($output){
				    $printout = explode("]", $output);
				    $arrprint =array();
				    foreach ($printout as $key => $value) {
			        	$printout[$key]=str_replace("[", "", $value);
			      	}
			      	foreach ($printout as $key => $value) {
			        	$arrprint[$key] = explode(",",$value);
			      	}
			      	return $arrprint;
			    }

			    function readarray($re){
			    	foreach ($re as $key => $value) {
			        	foreach ($value as $m => $value2) {
			          		echo $value2."<br>";
			        	}
			      	}
			    }
			?>

	</body>
</html>