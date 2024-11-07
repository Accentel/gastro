<?php 
session_start();
$name=$_SESSION['name1'];
?>
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
<?php


//echo "hello";
include("../db/connection.php");

  $emp_id = $ses;
$r=mysqli_query($link,"select ename from login where name1='$emp_id'") or die(mysqli_error());
$row=mysqli_fetch_array($r);
 $empname=$row['ename'];
  $p="SELECT D.menus FROM hr_user as D,login as M  WHERE D.emp_id=M.ename and D.emp_id='$empname' "; 

$sql = mysqli_query($link,$p);
if($sql){
$i=0;
while($row = mysqli_fetch_array($sql)){
$menu= $row[0];
	if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	/*if($menu == "023"){$menu023="023";}
	if($menu == "024"){$menu024="024";}
	if($menu == "025"){$menu025="025";}
	if($menu == "026"){$menu026="026";}*/
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
	if($menu == "27"){$menu27="27";}
	if($menu == "28"){$menu28="28";}
	if($menu == "29"){$menu29="29";}
	if($menu == "200"){$menu200="200";}
	if($menu == "201"){$menu201="201";}
	if($menu == "202"){$menu202="202";}
	if($menu == "203"){$menu203="203";}
	if($menu == "204"){$menu204="204";}
	if($menu == "205"){$menu205="205";}
	if($menu == "206"){$menu206="206";}
	if($menu == "207"){$menu207="207";}
	if($menu == "0206"){$menu0206="0206";}
		if($menu == "2020"){$menu2020="2020";}
	/*if($menu == "208"){$menu208="208";}
	if($menu == "209"){$menu209="209";}*/
	
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	if($menu == "32"){$menu32="32";}
	if($menu == "33"){$menu33="33";}
	if($menu == "34"){$menu34="34";}
	if($menu == "35"){$menu35="35";}
	if($menu == "36"){$menu36="36";}
	/*if($menu=="37"){ $menu37="37";}*/
	
	
	
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	if($menu == "44"){$menu44="44";}
	if($menu == "45"){$menu45="45";}
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	if($menu == "53"){$menu53="53";}
	if($menu == "54"){$menu54="54";}
	if($menu == "05"){$menu05="05";}
	if($menu == "054"){$menu054="054";}
		if($menu == "056"){$menu056="056";}
	if($menu == "055"){$menu055="055";}

	
		if($menu == "15"){$menu15="15";}
	if($menu == "151"){$menu151="151";}
	if($menu == "152"){$menu152="152";}
	if($menu == "153"){$menu153="153";}
	
	if($menu == "16"){$menu16="16";}
	if($menu == "161"){$menu161="161";}
	if($menu == "162"){$menu162="162";}
	if($menu == "163"){$menu163="163";}

	
	
	/*if($menu == "54"){$menu54="54";}
	if($menu == "55"){$menu55="55";}
	if($menu == "56"){$menu56="56";}
	
	if($menu == "57"){$menu57="57";}
	if($menu == "58"){$menu58="58";}
	if($menu == "59"){$menu59="59";}
	if($menu == "541"){$menu541="541";}*/
	

	
	if($menu == "6"){$menu6="6";}
	if($menu == "61"){$menu61="61";}
	if($menu == "62"){$menu62="62";}
	if($menu == "63"){$menu63="63";}
	if($menu == "64"){$menu64="64";}
	if($menu == "65"){$menu65="65";}
	/*if($menu == "66"){$menu66="66";}
	if($menu == "67"){$menu67="67";}
	if($menu == "68"){$menu68="68";}
	if($menu == "69"){$menu69="69";}
	if($menu == "690"){$menu690="690";}*/
	
	if($menu == "7"){$menu7="7";}
	if($menu == "71"){$menu71="71";}
	if($menu == "72"){$menu72="72";}
	/*if($menu == "73"){$menu73="73";}
	if($menu == "74"){$menu74="74";}*/
	
	if($menu == "99096"){$menu99096="99096";}
	if($menu == "99097"){$menu99097="99097";}
	
	if($menu == "8"){$menu8="8";}
	if($menu == "81"){$menu81="81";}
	if($menu == "82"){$menu82="82";}
	if($menu == "83"){$menu83="83";}
	if($menu == "84"){$menu84="84";}
	if($menu == "85"){$menu85="85";}
	if($menu == "86"){$menu86="86";}
	if($menu == "87"){$menu87="87";}
	if($menu == "88"){$menu88="88";}
	if($menu == "89"){$menu89="89";}
	if($menu == "890"){$menu890="890";}
	if($menu == "891"){$menu891="891";}
	if($menu == "892"){$menu892="892";}
	
	if($menu == "9"){$menu9="9";}
	if($menu == "90"){$menu90="90";}
	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu98="98";}
	if($menu == "99"){$menu99="99";}
	if($menu == "990"){$menu990="990";}
	if($menu == "991"){$menu991="991";}
	
	
	
	if($menu == "992"){$menu992="992";}
	if($menu == "993"){$menu993="993";}
	if($menu == "994"){$menu994="994";}
	if($menu == "995"){$menu995="995";}
	if($menu == "996"){$menu996="996";}
	if($menu == "997"){$menu997="997";}
	if($menu == "998"){$menu998="998";}
	if($menu == "999"){$menu999="999";}
	if($menu == "9990"){$menu9990="9990";}
	if($menu == "9991"){$menu9991="9991";}
	if($menu == "9992"){$menu9992="9992";}
	if($menu == "9993"){$menu9993="9993";}
	if($menu == "9994"){$menu9994="9994";}
	if($menu == "9995"){$menu9995="9995";}
	if($menu == "9996"){$menu9996="9996";}
	if($menu == "9997"){$menu9997="9997";}
	if($menu == "9998"){$menu9998="9998";}
	if($menu == "9999"){$menu9999="9999";}
	
	
	if($menu == "10"){$menu10="10";}
	
	if($menu == "101"){$menu101="101";}
	if($menu == "102"){$menu102="102";}
	if($menu == "103"){$menu103="103";}
	
	
	
	
	if($menu == "104"){$menu104="104";}
	if($menu == "105"){$menu105="105";}
	if($menu == "106"){$menu106="106";}
	if($menu == "107"){$menu107="107";}
	
	if($menu == "11"){$menu11="11";}
	if($menu == "111"){$menu111="111";}
	if($menu == "112"){$menu112="112";}
	if($menu == "113"){$menu113="113";}
	
	if($menu == "12"){$menu12="12";}
	if($menu == "121"){$menu121="121";}
	if($menu == "122"){$menu122="122";}
	if($menu == "123"){$menu123="123";}
	if($menu == "124"){$menu124="124";}
	if($menu == "125"){$menu125="125";}
	if($menu == "126"){$menu126="126";}
	if($menu == "127"){$menu127="127";}
	if($menu == "128"){$menu128="128";}
	if($menu == "129"){$menu129="129";}
	if($menu == "1290"){$menu1290="1290";}
	if($menu == "12901"){$menu12901="12901";}
	if($menu == "12902"){$menu12902="12902";}
	
	if($menu == "12903"){$menu12903="12903";}
	if($menu == "1293"){$menu1293="1293";}
	if($menu == "1294"){$menu1294="1294";}
	if($menu == "1295"){$menu1295="1295";}
	if($menu == "1296"){$menu1296="1296";}
	if($menu == "1297"){$menu1297="1297";}
	
	if($menu == "12096"){$menu12096="12096";}
	if($menu == "12097"){$menu12097="12097";}
	if($menu == "12098"){$menu12098="12098";}
	
	
	
if($menu == "13"){$menu13="13";}
	if($menu == "131"){$menu131="131";}
	if($menu == "132"){$menu132="132";}
	if($menu == "133"){$menu133="133";}
	if($menu == "134"){$menu134="134";}
	if($menu == "135"){$menu135="135";}
	if($menu == "136"){$menu136="136";}
	if($menu == "137"){$menu137="137";}
	if($menu == "138"){$menu138="138";}
	if($menu == "139"){$menu139="139";}
	
	if($menu == "1388"){$menu1388="1388";}
	if($menu == "1389"){$menu1389="1389";}
	
	if($menu == "1390"){$menu1390="1390";}
	if($menu == "1391"){$menu1391="1391";}
	if($menu == "1392"){$menu1392="1392";}	
	
	if($menu == "14"){$menu14="14";}
	if($menu == "141"){$menu141="141";}
	if($menu == "142"){$menu142="142";}
	if($menu == "143"){$menu143="143";}
	
	if($menu == "144"){$menu144="144";}
	if($menu == "145"){$menu145="145";}
	if($menu == "146"){$menu146="146";}
	if($menu == "601"){$menu601="601";}
	if($menu == "602"){$menu602="602";}
	if($menu == "541"){$menu541="541";}
	if($menu == "603"){$menu603="603";}
	if($menu == "604"){$menu604="604";}
	if($menu == "605"){$menu605="605";}
	if($menu == "606"){$menu606="606";}
	if($menu == "607"){$menu607="607";}
	if($menu == "608"){$menu608="608";}
	if($menu == "609"){$menu609="609";}
	if($menu == "100"){$menu100="100";}
	if($menu == "1002"){$menu1002="1002";}
	if($menu == "1003"){$menu1003="1003";}
	if($menu == "108"){$menu108="108";}
	
	if($menu == "1298"){$menu1298="1298";}
	if($menu == "1299"){$menu1299="1299";}
	if($menu == "1004"){$menu1004="1004";}
	if($menu == "222"){$menu222="222";}
		if($menu == "223"){$menu223="223";}
		if($menu == "05"){$menu05="05";}
		if($menu == "027"){$menu027="027";}
	if($menu == "028"){$menu028="028";}
	if($menu == "029"){$menu029="029";}
	if($menu == "030"){$menu030="030";}
	if($menu == "031"){$menu031="031";}
	if($menu == "0200"){$menu0200="0200";}
	if($menu == "0201"){$menu0201="0201";}
	if($menu == "0202"){$menu0202="0202";}
	if($menu == "0203"){$menu0203="0203";}
	if($menu == "0204"){$menu0204="0204";}
	if($menu == "12910"){$menu12910="12910";}
	if($menu == "9994"){$menu9994="9994";}
	if($menu == "12911"){$menu12911="12911";}
	if($menu == "1205"){$menu1205="1205";}
	
	if($menu == "1820"){$menu1820="1820";}
	if($menu == "1821"){$menu1821="1821";}
	if($menu == "1822"){$menu1822="1822";}
	if($menu == "1823"){$menu1823="1823";}
	if($menu == "1824"){$menu1824="1824";}
	if($menu == "1825"){$menu1825="1825";}
	
	if($menu == "15"){$menu15="15";}
	if($menu == "151"){$menu151="151";}
	if($menu == "152"){$menu152="152";}
	if($menu == "153"){$menu153="153";}
	
	if($menu == "16"){$menu16="16";}
	if($menu == "161"){$menu161="161";}
	if($menu == "162"){$menu162="162";}
	if($menu == "163"){$menu163="163";}
	     
	
	
	//,
	
	
}
}
?>


<script>
function reportxx(){
	//alert("hi");
	//var fdate = document.getElementById("fromdate").value;
	//var tdate = document.getElementById("todate").value;
	window.open('admit_patients1.php','Mywindow','width=1020,height=800,toolbar=no,menubar=no');

}
</script>
<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse ">
	                <div id="remove-scroll" class="left-sidemenu">
	                    <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
							
							
						
							<?php if($menu2 == "2"){ ?> 
							<li class="nav-item">
	                            <a href="dashboard.php" class="nav-link nav-toggle">
	                                <i class="material-icons">dashboard</i>
	                                <span class="title">Dashboard</span>
	                                <span class="selected"></span>
                                	<span class="arrow "></span>
	                            </a>
	                           <ul class="sub-menu">
	                                <?php if($menu21 == "21"){ ?><li class="nav-item">
	                                    <a href="update_hospital.php" class="nav-link ">
	                                        <span class="title">Hospital Details</span>
	                                    </a>
	                                </li>
	                                <?php } if($menu22 == "22"){ ?> <li class="nav-item ">
	                                    <a href="update_pharmacy.php" class="nav-link ">
	                                        <span class="title">Pharmacy Details</span>
	                                    </a>
	                                </li>
	                                <?php } if($menu23 == "23"){ ?> <li class="nav-item  ">
	                                    <a href="update_lab.php" class="nav-link ">
	                                        <span class="title">Lab Details</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									<?php } if($menu24== "24"){ ?>
									<li class="nav-item">
	                                    <a href="city3.php" class="nav-link ">
	                                        <span class="title">Add Procedure</span>
	                                    </a>
	                                </li>
									<?php }if($menu25== "25"){ ?>
									
									 <li class="nav-item">
	                                    <a href="labtestdeptlist.php" class="nav-link ">
	                                        <span class="title">Lab Test Department</span>
	                                    </a>
	                                </li>
									<?php } if($menu26== "26"){ ?>
									 <li class="nav-item">
	                                    <a href="labtestdetails.php" class="nav-link ">
	                                        <span class="title">Lab Test Details</span>
	                                    </a>
	                                </li>
									<!--<?php //}if($menu27== "27"){ ?>
									 <li class="nav-item">
	                                    <a href="expences_list1.php" class="nav-link ">
	                                        <span class="title">Add Expenses Type</span>
	                                    </a>
	                                </li>
									<?php //}if($menu28== "28"){ ?>
									 <li class="nav-item">
	                                     <a href="expences_list.php" class="nav-link ">
	                                        <span class="title">Add Expenses List</span>
	                                    </a>
	                                </li>-->
									<?php }if($menu29== "29"){ ?>
									 <li class="nav-item">
	                                    <a href="insurancelist.php" class="nav-link ">
	                                        <span class="title">Add Insurance Companies</span>
	                                    </a>
	                                </li>
									<?php }if($menu200== "200"){ ?>
									<li class="nav-item">
	                                    <a href="hospitaltarriflist.php" class="nav-link ">
	                                        <span class="title">Add Hospital Tarrif List</span>
	                                    </a>
	                                </li>
									
									<?php }if($menu2020== "2020"){ ?>
									<li class="nav-item">
	                                    <a href="insurancetarriflist.php" class="nav-link ">
	                                        <span class="title">Add Insurance Tarrif List</span>
	                                    </a>
	                                </li>
									
									<?php }if($menu0206== "0206"){ ?>
									<li class="nav-item">
	                                    <a href="update_validity.php" class="nav-link ">
	                                        <span class="title">Add Update Validity Days</span>
	                                    </a>
	                                </li>
									
									<?php }if($menu0200== "0200"){ ?>
									<li class="nav-item">
	                                    <a href="city.php" class="nav-link ">
	                                        <span class="title">Add City </span>
	                                    </a>
	                                </li>
									<?php }if($menu0201== "0201"){ ?>
									<li class="nav-item">
	                                    <a href="city1.php" class="nav-link ">
	                                        <span class="title">Add Mandal </span>
	                                    </a>
	                                </li>
									<?php }if($menu0202== "0202"){ ?>
									<li class="nav-item">
	                                    <a href="city2.php" class="nav-link ">
	                                        <span class="title">Add Address </span>
	                                    </a>
	                                </li>
									<?php }if($menu201== "201"){ ?>
									<li class="nav-item">
	                                  <a href="empdeptlist.php" class="nav-link ">
	                                        <span class="title">Employee Department</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li><?php }if($menu202== "202"){ ?>
									<li class="nav-item">
	                                   <a href="employeeslist.php" class="nav-link ">
	                                        <span class="title">Employee Details</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li><?php }if($menu206== "206"){ ?>
									<li class="nav-item  ">
	                                     <a href="changepassword.php" class="nav-link ">
	                                        <span class="title">Change Password</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li><?php }if($menu207== "207"){ ?>
									<li class="nav-item  ">
	                                     <a href="userview.php" class="nav-link ">
	                                        <span class="title">User Management</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li><?php }?>
	                            </ul>
	                        </li><?php } ?>
	                         <?php if($menu4 == "4"){ ?><li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
	                                <span class="title">Doctors</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                 <?php if($menu41 == "41"){ ?><li class="nav-item  ">
	                                    <a href="doctor.php" class="nav-link "> <span class="title">Doctor</span>
	                                    </a>
	                                </li>
									<?php }if($menu42== "42"){ ?>
									<li class="nav-item  ">
	                                    <a href="doctdeptlist.php" class="nav-link ">
	                                        <span class="title">Doctor Department</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li><?php }if($menu43== "43"){ ?>
									  <li class="nav-item  ">
	                                    <a href="reffer_doctor.php" class="nav-link "> <span class="title">Referal Doctor</span>
	                                    </a>
	                                </li>
									
									<?php }?>
	                               <!-- <li class="nav-item  ">
	                                    <a href="add_doctor_material.html" class="nav-link "> <span class="title">Add Doctor Material</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="edit_doctor.html" class="nav-link "> <span class="title">Edit Doctor</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="doctor_profile.html" class="nav-link "> <span class="title">About Doctor</span>
	                                    </a>
	                                </li>-->
	                            </ul>
							 </li><?php }?>
							 <?php if($menu3 == "3"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Wards</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                               <?php if($menu31 == "31"){ ?> <li class="nav-item  ">
	                                    <a href="locationlist.php" class="nav-link "> <span class="title">Locations</span>
	                                    </a>
	                                </li><?php }if($menu32== "32"){ ?>
	                                <li class="nav-item  ">
	                                    <a href="roomtypeslist.php" class="nav-link "> <span class="title">Room Types</span>
	                                    </a>
	                                </li><?php }if($menu33== "33"){ ?>
	                                <li class="nav-item  ">
	                                    <a href="roomslist.php" class="nav-link "> <span class="title">Rooms</span>
	                                    </a>
	                                </li><?php }if($menu34== "34"){ ?>
	                                <li class="nav-item  ">
	                                    <a href="bedslist.php" class="nav-link "> <span class="title">Beds</span>
	                                    </a>
	                                </li><?php }if($menu36== "36"){ ?>
									<li class="nav-item  ">
	                                    <a href="bedstatus.php" class="nav-link "> <span class="title">Beds Status</span>
	                                    </a>
	                                </li><?php }?>
	                            </ul>
							 </li><?php }?>
	                      <!--  <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
	                                <span class="title">Ortho</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="supportslist.php" class="nav-link "> <span class="title">Supports</span>
	                                    </a>
	                                </li>
	                               
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
	                            <span class="title">Ayurvedic</span><span class="arrow"></span></a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="packageslist.php" class="nav-link "> <span class="title">Packages List</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="packageservicelist.php" class="nav-link "> <span class="title">Package Services</span>
	                                    </a>
	                                </li>
	                                
	                            </ul>
	                        </li>-->
	                         
							 
							 <?php if($menu5 == "5"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Appointment</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                               <?php if($menu51 == "51"){ ?> <li class="nav-item  ">
	                                   <a href="book_appointment.php" class="nav-link "> <span class="title">Book Appointment</span>
	                                    </a>
	                                </li><?php }if($menu53== "53"){ ?>
	                                <li class="nav-item  ">
	                                   <a href="reg_card.php" class="nav-link "> <span class="title">Registration Card</span>
	                                    </a>
	                                </li>
									<?php }	if($menu54== "54"){ ?>
	                                <li class="nav-item  ">
	                                     <a href="op_report.php" class="nav-link "> <span class="title">Out Patient History</span>
	                                    </a>
	                                </li><?php } ?>
	                            </ul>
							 </li><?php }?>
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
	                        <?php if($menu05 == "05"){ ?>
	                       <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
	                                <span class="title">In Patients</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                               <?php if($menu054 == "054"){ ?>  <li class="nav-item  ">
	                                    <a href="inpatient.php" class="nav-link "> <span class="title">All Patients</span>
	                                    </a>
	                                </li>
								   <?php }?>
								   
								   <?php if($menu055 == "055"){ ?>   <li class="nav-item  ">
	                                    <a href="ipbedlist.php" class="nav-link "> <span class="title">Ip Room Transfer</span>
	                                    </a>
	                                </li>
								   <?php }?>
								   <?php if($menu056 == "056"){ ?>  <li class="nav-item  ">
	                                    <a href="phistory.php" class="nav-link "> <span class="title">Patient History</span>
	                                    </a>
	                                </li>
								   <?php }?>
								   
	                                
	                                 <?php if($menu0203 == "0203"){ ?>   <li class="nav-item  ">
									<a href="" onclick="reportxx();">
	                                  <span class="title">All Patient Report</span>
	                                    </a>
	                                </li>
								   <?php }?>
	                            </ul>
	                        </li>
							<?php }?>
	                       <?php if($menu6 == "6"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Billing</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                 <?php if($menu61 == "61"){ ?><li class="nav-item  ">
	                                    <a href="advancebilllist.php" class="nav-link "> <span class="title">Advance Payment</span>
	                                    </a>
	                                </li>
									 <?php } if($menu62 == "62"){?>
	                                <li class="nav-item  ">
	                                    <a href="labbilllist.php" class="nav-link "> <span class="title">Lab Bill</span>
	                                    </a>
	                                </li><?php } if($menu63 == "63"){?>
	                                <li class="nav-item  ">
	                                    <a href="labbilllistk.php" class="nav-link "> <span class="title">Procedure Lab Bill</span>
	                                    </a>
	                                </li><?php } if($menu64 == "64"){?>
	                                <li class="nav-item  ">
	                                     <a href="dischargesummarylist.php" class="nav-link "> <span class="title">Discharge Summary</span>
	                                    </a>
	                                </li><?php } if($menu65 == "65"){?>
	                                
	                                <li class="nav-item  ">
	                                    <a href="finalbilllist.php" class="nav-link "> <span class="title">Final Bill Insurance</span>
	                                    </a>
	                                </li><?php } ?><?php if($menu0204 == "0204"){ ?>
								<li class="nav-item  ">
	                                    <a href="finalbilllis1.php" class="nav-link "> <span class="title">Final Bill</span>
	                                    </a>
	                                </li><?php } ?>
	                               
	                            </ul>
	                        </li>
						   <?php }?>
						   
						   
						   
						   
						   <?php if($menu15 == "15"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Cancellation</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                 <?php if($menu151 == "151"){ ?><li class="nav-item  ">
	                                    <a href="op_can1.php" class="nav-link "> <span class="title">OP Cancellation</span>
	                                    </a>
	                                </li>
									 <?php } if($menu152 == "152"){?>
	                                <li class="nav-item  ">
	                                    <a href="lab_cancel.php" class="nav-link "> <span class="title">Lab Bill Cancellation</span>
	                                    </a>
	                                </li><?php } if($menu153 == "153"){?>
	                                <li class="nav-item  ">
	                                    <a href="plab_cancel.php" class="nav-link "> <span class="title">Procedure Lab Bill Cancellation</span>
	                                    </a>
	                                </li><?php } ?>
	                               
	                            </ul>
	                        </li>
						   <?php }?>
						   
						   
						   <?php if($menu16 == "16"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Return Amount</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                 <?php if($menu161 == "161"){ ?> <li class="nav-item  ">
	                                    <a href="ip_ret.php" class="nav-link "> <span class="title">IP Return</span>
	                                    </a>
	                                </li>
									 <?php }  ?>
									 
									 
									<?php //if($menu162 == "162"){?>
	                               <!-- <li class="nav-item  ">
	                                    <a href="lab_ret.php" class="nav-link "> <span class="title">Lab Return </span>
	                                    </a>
	                                </li>--><?php //} if($menu163 == "163"){?>
	                                <!--<li class="nav-item  ">
	                                    <a href="plab_ret.php" class="nav-link "> <span class="title">Procedure Lab Return </span>
	                                    </a>
	                                </li>--><?php// } ?>
	                               
	                            </ul>
	                        </li>
						   <?php }?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						    <?php if($menu7 == "7"){ ?>
	                       <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
	                                <span class="title">Lab</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                               <?php if($menu71 == "71"){ ?>    <li class="nav-item  ">
	                                    <a href="labbillentrylist.php" class="nav-link "> <span class="title">Lab Results Entry</span>
	                                    </a>
	                                </li>
								   <?php } if($menu72 == "72"){ ?>					
	                                 <!--<li class="nav-item  ">
	                                    <a href="labreultlist.php" class="nav-link "> <span class="title">Print Lab Results</span>
	                                    </a>
	                                </li>-->
								   <?php }?>
								   
	                                
	                                
	                            </ul>
	                        </li>
							<?php }  if($menu9 == "9"){ ?>
	                      
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                                               
                                
                             
							 <?php  if($menu92 == "92"){ ?>
                        <li class="nav-item  "><a href="product_type_list.php"><span class="title">Product Type</span></a></li>
						<?php } if($menu93 == "93"){ ?>
						<li class="nav-item  "> <a href="supplier_info_list.php"><span class="title">Supplier Information</span></a></li>
						<?php } if($menu94 == "94"){ ?>
						<li class="nav-item  "><a href="supplier_info_list2.php"><span class="title">Supplier Amount</span></a></li>
						<?php }  if($menu96 == "96"){ ?>
						<li class="nav-item  "><a href="product_details_list.php"><span class="title">Product Details</span></a></li>
						<?php } if($menu97 == "97"){ ?>
                        <li class="nav-item  "><a href="edit_product.php"><span class="title">Product Details Edit</span></a></li>
						<?php }?>

                                
	                              
	                            </ul>
								
								
								
	                        </li><?php }  if($menu90 == "90"){ ?>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Purchase</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                               <?php  if($menu98 == "98"){ ?>
                                 <li class="nav-item  "><a href="purchase_invoice_list.php"><span class="title">Purchase Invoice</span></a></li>
							   <?php } if($menu99 == "99"){ ?> <li class="nav-item  "><a href="purchase_return_list.php"><span class="title">Purchase Return</span></a></li>
							   <?php } if($menu990 == "990"){ ?><li class="nav-item  "> <a href="stock_adjustment.php"><span class="title">Stock Adjustment</span></a></li>
						
						<?php } if($menu991 == "991"){ ?><li class="nav-item  "><a href="stock_report.php"><span class="title">Stock Adjustment Report</span></a></li>
						<?php }?>
      
	                            </ul>
								
	                        </li>
							<?php }  if($menu10 == "10"){ ?>
                            
							 <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Sales</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                                <?php  if($menu101 == "101"){ ?> <li class="nav-item  "><a href="salesentry_list.php"><span class="title">Sales Entry</span></a></li>
								<?php } if($menu102 == "102"){ ?><li class="nav-item  "><a href="salesentry_list_hosp.php"><span class="title">Sales Entry Hospital</span></a></li>
                       <!-- <li class="nav-item  "><a href="opdigitallab_reg1.php">
                        <span class="title">OP Digital Sales Entry</span></a></li>
						<li class="nav-item  ">
                         <a href="opdigital_reg2.php"><span class="title">Discharge Summary Entry</span></a></li>
						<li class="nav-item  "><a href="duecustomer.php"><span class="title">
                       Due Patient/Customer</span></a></li>
                       <li class="nav-item  "><a href="salestype_report_ind.php"><span class="title">
                        Sales Entry & Returns</span></a></li>
                        <li class="nav-item  "><a href="salesentryreports.php"><span class="title">
                       Sales Entry Report</span></a></li>
                        <li class="nav-item  "><a href="salesreturnreports.php"><span class="title">
                       Sales Return Report</span></a></li>
                        <li class="nav-item  "><a href="drugindent_view.php"><span class="title">
                        Drug Indent For</span></a></li>-->
                     <?php } if($menu102 == "102"){ ?> <li class="nav-item  "><a href="salesreturn.php"><span class="title">
                        Sales Return</span></a></li>
						<?php } if($menu103 == "103"){ ?> 
						<li class="nav-item  "><a href="duecustomer.php"><span class="title">
                       Due Patient/Customer</span></a></li>
					   <?php }?>

					  <!-- if($menu104 == "104"){ ?> 
					   <li class="nav-item  "><a href="salesentry_list1.php"><span class="title">Sales Entry Total</span></a></li>
					   <?php// }?>
					   <!-- <li class="nav-item  "><a href="drugindent_view.php"  ><span class="title">
                       Drug Indent Form</span></a></li>	 -->
      </ul>
								
	                        </li><?php } if($menu12903 == "12903"){ ?> 
							
							  <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Reports</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                               
								 
								<?php if($menu992 == "992"){ ?> 
								 
                        <li class="nav-item  "><a href="purchase_entry_report.php">
                        <span class="title">Purchase Entry Report</span></a></li>
								<?php } if($menu993 == "993"){ ?> 
						<li class="nav-item  ">
                         <a href="purchase_return_report.php"><span class="title">Purchase Return Report</span></a></li>
						 <?php } if($menu994 == "994"){ ?> 
						<li class="nav-item  "><a href="add_supplier_items.php"><span class="title">
                       Supplier Items</span></a></li>
                        <?php } if($menu995 == "995"){ ?> 
      <li class="nav-item  "><a href="vat_report.php"><span class="title">
                       GST Report</span></a></li>
      <?php } if($menu996 == "996"){ ?> 
 <li class="nav-item  "><a href="stock_position_report.php"><span class="title">
                       Stock Position Report</span></a></li>
					 <?php } if($menu997 == "997"){ ?>   
               <li class="nav-item  "><a href="medicinelist.php" target="new"><span class="title">
                       Medicine Short List</span></a></li>
					    <?php } if($menu998 == "998"){ ?>   
					    <li class="nav-item  "><a href="searchbox.php" ><span class="title">
                       Search Medicine</span></a></li>
					   <?php } if($menu999 == "999"){ ?>  
					     <li class="nav-item  "><a href="searchbox1.php" ><span class="title">
                       Compare Medicine</span></a></li>
					     <?php } if($menu9990 == "9990"){ ?> 
					    <li class="nav-item  "><a href="drug_expiry.php?report=11" ><span class="title">
                       Drug Expiry Report</span></a></li>
					    <?php } if($menu9991== "9991"){ ?> 
					    <li class="nav-item  "><a href="FSN_productdetails_list.php" ><span class="title">
                       FSN Analysis</span></a></li>
					     <?php } if($menu9992== "9992"){ ?> 
               <li class="nav-item  "><a href="ABC_Analysis.php" ><span class="title">
                       ABC Analysis</span></a></li>
					    <?php }  if($menu9996== "9996"){ ?> 
					    <li class="nav-item  "><a href="salesentry_report.php" ><span class="title">
                       Day Sales Report</span></a></li>
					   <?php } if($menu9997== "9997"){ ?> 
					    <li class="nav-item  "><a href="sales_typesmonth_report.php" ><span class="title">
                       M-Sales Entry Report</span></a></li>
					   <?php } if($menu9998== "9998"){ ?> 
					    <li class="nav-item  "><a href="druginspector_report.php" target="new" ><span class="title">
                       Drug Inspector Report</span></a></li>
					   <?php } if($menu106== "106"){ ?> 
					    <li class="nav-item  "><a href="salesentryreports.php"  ><span class="title">
                       Sales Entry Report</span></a></li>
					   <?php } if($menu107== "107"){ ?> 
					    <li class="nav-item  "><a href="salesreturnreports.php"  ><span class="title">
                       Sales Return Report</span></a></li>
                     <?php } if($menu138== "138"){ ?> 
       <li class="nav-item  "><a href="profit_report.php"  ><span class="title">
					 Pharmacy Account Summery</span></a></li>
					 <?php }if($menu139== "139"){ ?> 
       <li class="nav-item  "><a href="stock_report.php"  ><span class="title">
					 Stock Adjustment Report</span></a></li>
					 
					 <?php }if($menu1388== "1388"){ ?> 
       <li class="nav-item  ">
	   <a href="pharmacy_history.php"  ><span class="title">
                      Pharmacy History</span></a>
					 </li>
					 <?php }if($menu1389== "1389"){ ?> 
       <li class="nav-item  ">
	   <a href="pharmacy_history1.php"  ><span class="title">
                      Pharmacy History With Amount</span></a>
					  </li><?php }?>
	                            </ul>
								
	                        </li>
                            <?php } if($menu12== "12"){ ?> 
                            
                            <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Reports</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu"><?php  if($menu122== "122"){ ?> 
	                                 <li class="nav-item  ">
	                                    <a href="hospitalpatients_report.php" class="nav-link "> <span class="title">Total Patient List</span>
	                                    </a>
	                                </li><?php } if($menu028== "028"){ ?> 
									<li class="nav-item  ">
	                                    <a href="op_report_doct.php" class="nav-link "> <span class="title">Doctor wise Patient Report</span>
	                                    </a>
	                                </li><?php } if($menu124== "124"){ ?> 
									<li class="nav-item  ">
	                                    <a href="patientpaymenthistory.php" class="nav-link "> <span class="title">In Patient Payment History</span>
	                                    </a>
	                                </li><?php } if($menu126== "126"){ ?> 
									<li class="nav-item  ">
	                                    <a href="admitpatients.php" class="nav-link "> <span class="title">Admited Patients Report</span>
	                                    </a>
	                                </li><?php } if($menu1294== "1294"){ ?> 
									<li class="nav-item  ">
	                                    <a href="referal_doctors_List.php" target="new" class="nav-link "> <span class="title">Referal Doctors List</span>
	                                    </a>
	                                </li><?php } if($menu029== "029"){ ?> 
									<li class="nav-item  ">
	                                    <a href="datereferaldoctoramountcollection.php" class="nav-link "> <span class="title">Date Wise Referal Doctors Amount Report</span>
	                                    </a>
	                                </li><?php } if($menu030== "030"){ ?> 
									<li class="nav-item  ">
	                                    <a href="op_report.php" class="nav-link "> <span class="title">Out Patient Report</span>
	                                    </a>
	                                </li><?php } if($menu1297== "1297"){ ?> 
									<li class="nav-item  ">
	                                    <a href="op_report1.php" class="nav-link "> <span class="title">Admited In Patients Report</span>
	                                    </a>
	                                </li>
									<?php } if($menu1293== "1293"){ ?> 
									<li class="nav-item  ">
	                                    <a href="referalpatients_report.php" class="nav-link "> <span class="title">Referal Patients Report</span>
	                                    </a>
	                                </li><?php } if($menu031== "031"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="advancebillreport.php" class="nav-link "> <span class="title">Advance Bill Report</span>
	                                    </a>
	                                </li>
									<?php } if($menu12902== "12902"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="labbillreport.php" class="nav-link "> <span class="title">Lab Bill Report</span>
	                                    </a>
	                                </li>
									<?/*php } if($menu12903== "12903"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="daycarebillreport.php" class="nav-link "> <span class="title">Daycare Bill Report</span>
	                                    </a>
	                                </li><?*/ ?>
									<?php } if($menu12910== "12910"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="labtestreportslist.php" class="nav-link "> <span class="title">Total Lab Test List</span>
	                                    </a>
	                                </li><?php } if($menu12911== "12911"){ ?> 
	                                 <li class="nav-item  ">
	                                    <a href="op_report_doct.php" class="nav-link "> <span class="title">Doctor wise Patient Report</span>
	                                    </a>
	                                </li><!--<?php //} if($menu125== "125"){ ?> 
	                                <li class="nav-item  ">
	                                     <a href="exp_report.php" class="nav-link "> <span class="title">Total Expenses Report</span>
	                                    </a>
	                                </li>--><?php } if($menu1205== "1205"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="daily_amount.php" class="nav-link "> <span class="title">Dialy Amount Collected Report</span>
	                                    </a>
	                                </li><?php }?>
									
									<?php } if($menu1296== "1296"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="daily_amount1.php" class="nav-link "> <span class="title">Daily  Amount Pharmacy</span>
	                                    </a>
	                                </li><?php }?>
									<?php  if($menu1299== "1299"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="daily_amount_emp.php" class="nav-link "> <span class="title">Daily  Amount Summary</span>
	                                    </a>
	                                </li><?php }?>
									
									<?php  if($menu12096== "12096"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="year2019.php" class="nav-link "> <span class="title">Year Wise Report</span>
	                                    </a>
	                                </li><?php }?>
									<?php  if($menu12097== "12097"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="discount.php" class="nav-link "> <span class="title">Disount Wise Report</span>
	                                    </a>
	                                </li><?php }?>
									<?php  if($menu12098== "12098"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="hospitalpatients_report1.php" class="nav-link "> <span class="title">Village Report</span>
	                                    </a>
	                                </li><?php }?>
									
									<?php  if($menu99096== "99096"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="test_labreport.php" class="nav-link "> <span class="title">Test Wise Lab Report</span>
	                                    </a>
	                                </li><?php }?>
	                                <?php  if($menu99097== "99097"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="test_plabreport.php" class="nav-link "> <span class="title">Test Wise Procedure Lab Report</span>
	                                    </a>
	                                </li><?php }?>
	                                
	                                
	                                <?php  if($menu1820== "1820"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="dis_report.php" class="nav-link "> <span class="title">Discharge Patient Report</span>
	                                    </a>
	                                </li><?php }?>
	                                
	                                
	                                 <?php  if($menu1821== "1821"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="labduebillreport.php" class="nav-link "> <span class="title">Lab Due Bill Report</span>
	                                    </a>
	                                </li><?php }?>
	                                
	                                 <?php  if($menu1822== "1822"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="plabbillreport.php" class="nav-link "> <span class="title">Procedure Lab Bill Report</span>
	                                    </a>
	                                </li><?php }?>
	                               
	                                <?php  if($menu1823== "1823"){ ?> 
	                                <li class="nav-item  ">
	                                    <a href="plabduebillreport.php" class="nav-link "> <span class="title">Procedure Due Bill Report</span>
	                                    </a>
	                                </li><?php }?>
	                                
	                                 <?php  if($menu1824== "1824"){ ?> 
	                               <li class="nav-item  ">
	                                    <a href="finalbillreport.php" class="nav-link "> <span class="title">Final Bill Report</span>
	                                    </a>
	                                </li><?php }?>
	                                
	                                
	                                 <?php  if($menu1825== "1825"){ ?> 
	                                 <li class="nav-item  ">
	                                    <a href="insurancebillreport.php" class="nav-link "> <span class="title">Final Bill Insurance Report</span>
	                                    </a>
	                                </li><?php }?>
	                            </ul>
	                        </li><?php //}?>
							<!--<?php //} if($menu13== "13"){ ?> 
     
               <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Certificates</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <?php  //if($menu131== "131"){ ?> <li class="nav-item">
	                                    <a href="birthcertificatelist.php" class="nav-link ">
	                                        <span class="title">Birth Certificate</span>
	                                    </a>
	                                </li>
									<?php //}  if($menu132== "132"){ ?> 
									<li class="nav-item">
	                                    <a href="dbirthcertificateslist.php" class="nav-link "> <span class="title">Delivery / Birth Certificate</span>
	                                    </a>
	                                </li><?php //} if($menu133== "133"){ ?> 
									<li class="nav-item">
	                                    <a href="sterilisationcertificateslist.php" class="nav-link "> <span class="title">Sterilisation Certificate</span>
	                                    </a>
	                                </li><?php //}  ?>
	                               
	                            </ul>
	                        </li><?php //}?>
                           -->
							
	                        <!--<li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="pull-left image">
	                                    <img src="../img/dp.jpg" class="img-circle user-img-circle" alt="User Image" />
	                                </div>
	                                <div class="pull-left info">
	                                    <p> Dr</p>
	                                    <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
	                                </div>
	                            </div>
	                        </li>-->
	                        
							
               
	                            
	                        <!--<li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
	                                <span class="title">Patients</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="all_patients.html" class="nav-link "> <span class="title">All Patients</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="add_patient.html" class="nav-link "> <span class="title">Add Patient</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="add_patient_material.html" class="nav-link "> <span class="title">Add Patient Material</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="edit_patient.html" class="nav-link "> <span class="title">Edit Patient</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="patient_profile.html" class="nav-link "> <span class="title">Patient Profile</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Room Allotment</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="room_allotment.html" class="nav-link "> <span class="title">Alloted Rooms</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="add_room_allotment.html" class="nav-link "> <span class="title">New Allotment</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="add_room_allotment_material.html" class="nav-link "> <span class="title">New Allotment Material</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="edit_room_allotment.html" class="nav-link "> <span class="title">Edit Allotment</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">monetization_on</i>
	                                <span class="title">Payments</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="payments.html" class="nav-link "> <span class="title">Payments</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="add_payment.html" class="nav-link "> <span class="title">Add Payments</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="invoice_payment.html" class="nav-link "> <span class="title">Patient Invoice</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="widget.html" class="nav-link nav-toggle"> <i class="material-icons">widgets</i>
	                                <span class="title">Widget</span> 
	                            </a>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">dvr</i>
	                                <span class="title">UI Elements</span> 
	                                <span class="label label-rouded label-menu">10</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="ui_buttons.html" class="nav-link ">
	                                        <span class="title">Buttons</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_tabs_accordions_navs.html" class="nav-link ">
	                                        <span class="title">Tabs &amp; Accordions</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="sweet_alert.html" class="nav-link ">
	                                        <span class="title">Alert</span>

	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_typography.html" class="nav-link ">
	                                        <span class="title">Typography</span>
	                                    </a>
	                                </li><li class="nav-item  ">
	                                    <a href="ui_icons.html" class="nav-link ">
	                                        <span class="title">Icons</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_modal.html" class="nav-link ">
	                                        <span class="title">Modals</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_panels.html" class="nav-link ">
	                                        <span class="title">Panels</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_grid.html" class="nav-link ">
	                                        <span class="title">Grids</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="calendar.html" class="nav-link ">
	                                        <span class="title">Calender</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_tree.html" class="nav-link ">
	                                        <span class="title">Tree View</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ui_carousel.html" class="nav-link ">
	                                        <span class="title">Carousel</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">store</i>
	                                <span class="title">Material Elements</span> 
	                                <span class="label label-rouded label-menu deepPink-bgcolor">14</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="material_button.html" class="nav-link ">
	                                        <span class="title">Buttons</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_tab.html" class="nav-link ">
	                                        <span class="title">Tabs</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_chips.html" class="nav-link ">
	                                        <span class="title">Chips</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_grid.html" class="nav-link ">
	                                        <span class="title">Grid</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_icons.html" class="nav-link ">
	                                        <span class="title">Icon</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_form.html" class="nav-link ">
	                                        <span class="title">Form</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_datepicker.html" class="nav-link ">
	                                        <span class="title">DatePicker</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_select.html" class="nav-link ">
	                                        <span class="title">Select Item</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_loading.html" class="nav-link ">
	                                        <span class="title">Loading</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_menu.html" class="nav-link ">
	                                        <span class="title">Menu</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_slider.html" class="nav-link ">
	                                        <span class="title">Slider</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_tables.html" class="nav-link ">
	                                        <span class="title">Tables</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_toggle.html" class="nav-link ">
	                                        <span class="title">Toggle</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="material_badges.html" class="nav-link ">
	                                        <span class="title">Badges</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="javascript:;" class="nav-link nav-toggle">
	                                <i class="material-icons">subtitles</i>
	                                <span class="title">Forms </span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="layouts_form.html" class="nav-link ">
	                                        <span class="title">Form Layout</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="advance_form.html" class="nav-link ">
	                                        <span class="title">Advance Component</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="wizard_form.html" class="nav-link ">
	                                        <span class="title">Form Wizard</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="validation_form.html" class="nav-link ">
	                                        <span class="title">Form Validation</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="editable_form.html" class="nav-link ">
	                                        <span class="title">Editor</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="javascript:;" class="nav-link nav-toggle">
	                                <i class="material-icons">list</i>
	                                <span class="title">Data Tables</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="basic_table.html" class="nav-link ">
	                                        <span class="title">Basic Tables</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="advanced_table.html" class="nav-link ">
	                                        <span class="title">Advance Tables</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="group_table.html" class="nav-link ">
	                                        <span class="title">Grouping</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="tableData.html" class="nav-link ">
	                                        <span class="title">Tables With Sourced Data</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">desktop_mac</i>
	                                <span class="title">Layout</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="layout_boxed.html" class="nav-link "> <span class="title">Boxed</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="layout_full_width.html" class="nav-link "> <span class="title">Full Width</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="layout_right_sidebar.html" class="nav-link "> <span class="title">Right Sidebar</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="layout_collapse.html" class="nav-link "> <span class="title">Collapse Menu</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="layout_sidebar_hover_menu.html" class="nav-link "> <span class="title">Hover Sidebar Menu</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="layout_mega_menu.html" class="nav-link "> <span class="title">Mega Menu</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="javascript:;" class="nav-link nav-toggle">
	                                <i class="material-icons">timeline</i>
	                                <span class="title">Charts</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="charts_echarts.html" class="nav-link ">
	                                        <span class="title">eCharts</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="charts_morris.html" class="nav-link ">
	                                        <span class="title">Morris Charts</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="charts_chartjs.html" class="nav-link ">
	                                        <span class="title">Chartjs</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="javascript:;" class="nav-link nav-toggle">
	                                <i class="material-icons">map</i>
	                                <span class="title">Maps</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="google_maps.html" class="nav-link ">
	                                        <span class="title">Google Maps</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="vector_maps.html" class="nav-link ">
	                                        <span class="title">Vector Maps</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="javascript:;" class="nav-link nav-toggle"> <i class="material-icons">description</i>
	                            <span class="title">Extra pages</span> 
	                            <span class="label label-rouded label-menu purple-bgcolor">7</span>
	                            <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="login.html" class="nav-link "> <span class="title">Login</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="sign_up.html" class="nav-link "> <span class="title">Sign Up</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="forgot_password.html" class="nav-link "> <span class="title">Forgot Password</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  "><a href="user_profile.html" class="nav-link "><span
											class="title">Profile</span>
									</a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="contact.html" class="nav-link "> <span class="title">Contact Us</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="lock_screen.html" class="nav-link "> <span class="title">Lock Screen</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="page-404.html" class="nav-link "> <span class="title">404 Page</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="page-500.html" class="nav-link "> <span class="title">500 Page</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="blank_page.html" class="nav-link "> <span class="title">Blank Page</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item">
	                            <a href="javascript:;" class="nav-link nav-toggle">
	                                <i class="material-icons">slideshow</i>
	                                <span class="title">Multi Level Menu</span>
	                                <span class="arrow "></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="javascript:;" class="nav-link nav-toggle">
	                                        <i class="fa fa-university"></i> Item 1
	                                        <span class="arrow"></span>
	                                    </a>
	                                    <ul class="sub-menu">
	                                        <li class="nav-item">
	                                            <a href="javascript:;" class="nav-link nav-toggle">
	                                                <i class="fa fa-bell-o"></i> Arrow Toggle
	                                                <span class="arrow "></span>
	                                            </a>
	                                            <ul class="sub-menu">
	                                                <li class="nav-item">
	                                                    <a href="javascript:;" class="nav-link">
	                                                        <i class="fa fa-calculator"></i> Sample Link 1</a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a href="#" class="nav-link">
	                                                        <i class="fa fa-clone"></i> Sample Link 2</a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a href="#" class="nav-link">
	                                                        <i class="fa fa-cogs"></i> Sample Link 3</a>
	                                                </li>
	                                            </ul>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-file-pdf-o"></i> Sample Link 1</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-rss"></i> Sample Link 2</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-hdd-o"></i> Sample Link 3</a>
	                                        </li>
	                                    </ul>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="javascript:;" class="nav-link nav-toggle">
	                                        <i class="fa fa-gavel"></i> Arrow Toggle
	                                        <span class="arrow"></span>
	                                    </a>
	                                    <ul class="sub-menu">
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-paper-plane"></i> Sample Link 1</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-power-off"></i> Sample Link 1</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a href="#" class="nav-link">
	                                                <i class="fa fa-recycle"></i> Sample Link 1
	                                             </a>
	                                        </li>
	                                    </ul>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="#" class="nav-link">
	                                        <i class="fa fa-volume-up"></i> Item 3 </a>
	                                </li>-->
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
                </div>
							 </div><?php //}?>