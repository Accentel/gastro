<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
//include('../db/insert_employee.php');
include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">User Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">User Management</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>User Management</header>
                                     
				                        
                                </div>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="user_insert.php" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										
										<table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tr >
                        <td width="40%" align="right" >Employee Name :</td>
                        <td width="60%"  align="left" >
                            <select  name="ename" id="ename" class="home_textbox" style="width:180px;" required>
                            <option value="">Select Emp Name</option>
                            <?php
							$qry="select * from employee";
							$r=mysqli_query($link,$qry) or die(mysql_error());
							while($rt=mysqli_fetch_array($r)){ ?>
								<option value="<?php echo $rt['empcode'] ?>"><?php echo $rt['empname'] ?></option>
								<?php		} ?>
                            </select>
                        </td>
                    </tr>            
                    <tr >
                        <td width="40%" align="right" >User Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="user_id" id="user_id" class="home_textbox"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Password :</td>
                        <td align="left">
                            <input type="password" name="pwd" id="pwd" class="home_textbox"/>
                             <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['name1']; ?>" class="home_textbox"/>
                        </td>
                    </tr>
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>
		
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="2" />&nbsp;&nbsp; <b>DASHBOARD</b>
        </div>
		<div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="21" />&nbsp;&nbsp; Hospital Details<br>
			<input type="checkbox" name="menu[]" value="22" />&nbsp;&nbsp; Pharmacy Details<br>
			<input type="checkbox" name="menu[]" value="23" />&nbsp;&nbsp; Lab Details<br>
			<!--<input type="checkbox" name="menu[]" value="24" />&nbsp;&nbsp; Daycare Details<br>-->
			<input type="checkbox" name="menu[]" value="25" />&nbsp;&nbsp; Lab Test Department<br>
			<input type="checkbox" name="menu[]" value="26" />&nbsp;&nbsp; Lab Test Details<br>
			  <input type="checkbox" name="menu[]" value="24" />&nbsp;&nbsp; Add Procedure <br>
			 <!--<input type="checkbox" name="menu[]" value="27" />&nbsp;&nbsp; Add Expenses Type<br>
			 <input type="checkbox" name="menu[]" value="28" />&nbsp;&nbsp; Add Expenses List<br>-->
			 <input type="checkbox" name="menu[]" value="29" />&nbsp;&nbsp; Add Insurance Companies <br>
			 <input type="checkbox" name="menu[]" value="200" />&nbsp;&nbsp; Add Hospital Tarrif List <br>
			 <input type="checkbox" name="menu[]" value="2020" />&nbsp;&nbsp; Add Insurance Tarrif List <br>
			 <input type="checkbox" name="menu[]" value="0206" />&nbsp;&nbsp; Update Validity days<br>
			 	 <input type="checkbox" name="menu[]" value="0200" />&nbsp;&nbsp; Add City <br>
				 <input type="checkbox" name="menu[]" value="0201" />&nbsp;&nbsp; Add Mandal <br>
				 <input type="checkbox" name="menu[]" value="0202" />&nbsp;&nbsp; Add Address <br>
				
			 <input type="checkbox" name="menu[]" value="201" />&nbsp;&nbsp; Employee Department <br>
			 <input type="checkbox" name="menu[]" value="202" />&nbsp;&nbsp; Employee Details <br>
			<!-- <input type="checkbox" name="menu[]" value="203" />&nbsp;&nbsp; Birth Certificate Format <br>
			 <input type="checkbox" name="menu[]" value="204" />&nbsp;&nbsp; Delivery / Birth Certificate Format <br>
			<input type="checkbox" name="menu[]" value="205" />&nbsp;&nbsp;Sterilisation Certificate Format<br>-->
			<input type="checkbox" name="menu[]" value="206" />&nbsp;&nbsp; Change Password<br>
			<input type="checkbox" name="menu[]" value="207" />&nbsp;&nbsp; User Management<br>
			 
		
			
			
			
		</div>
		</td>
        
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" />&nbsp;&nbsp; <b>DOCTOR</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" />&nbsp;&nbsp; Doctor<br>
			<input type="checkbox" name="menu[]" value="42" />&nbsp;&nbsp; Doctor Department<br>
			<input type="checkbox" name="menu[]" value="43" />&nbsp;&nbsp; Referal Doctor<br>
			<!--<input type="checkbox" name="menu[]" value="44" />&nbsp;&nbsp; Prescription List<br>
			<input type="checkbox" name="menu[]" value="45" />&nbsp;&nbsp; Upload Reports<br>-->
		</div>
		</td>
		<td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="3" />&nbsp;&nbsp; <b>WARD</b>
        </div>
		<div class="checkprd" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="31" />&nbsp;&nbsp; Locations<br>
		<input type="checkbox" name="menu[]" value="32" />&nbsp;&nbsp; Room Types<br>
		<input type="checkbox" name="menu[]" value="33" />&nbsp;&nbsp; Rooms <br>
		<input type="checkbox" name="menu[]" value="34" />&nbsp;&nbsp; Beds<br>
	<!--	<input type="checkbox" name="menu[]" value="35" />&nbsp;&nbsp; Room Tarrif<br>-->
		<input type="checkbox" name="menu[]" value="36" />&nbsp;&nbsp; Beds Status<br>
		
			
			
			<br>
      
		
		</div>
		</td>
        <td ></td>
        </tr>
		
        <tr >
		
		
		
		 <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" />&nbsp;&nbsp; <b>Appointment</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" />&nbsp;&nbsp; Book Appointment<br>
			
            <input type="checkbox" name="menu[]" value="53" />&nbsp;&nbsp; Registration Card<br>
			<!--<input type="checkbox" name="menu[]" value="52" />&nbsp;&nbsp; OP Cancellation<br>-->
			<input type="checkbox" name="menu[]" value="54" />&nbsp;&nbsp;Out Patient History<br>
		</div>
		</td>
        <td ></td>
		
		
		
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="05" />&nbsp;&nbsp; <b>IN PATIENT</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="054" />&nbsp;&nbsp; All In Patients<br>
		<input type="checkbox" name="menu[]" value="055" />&nbsp;&nbsp; IP Room Transfer<br>
		<input type="checkbox" name="menu[]" value="056" />&nbsp;&nbsp; Patient History<br>
		<input type="checkbox" name="menu[]" value="0203" />&nbsp;&nbsp; All Patients Report<br>
		</div>
		</td>
        <td ></td>
        	
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="6" />&nbsp;&nbsp; <b>BILLING</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="61" />&nbsp;&nbsp; Advance Payment<br>
            <input type="checkbox" name="menu[]" value="62" />&nbsp;&nbsp; Lab Bill<br>
			<!--<input type="checkbox" name="menu[]" value="63" />&nbsp;&nbsp; Daycare Bill<br>-->
				<input type="checkbox" name="menu[]" value="63" />&nbsp;&nbsp; Procedure Lab Bill<br>
			<input type="checkbox" name="menu[]" value="64" />&nbsp;&nbsp; Discharge Summary<br>
			<input type="checkbox" name="menu[]" value="65" />&nbsp;&nbsp; Final Bill Insurance<br>
			<input type="checkbox" name="menu[]" value="0204" />&nbsp;&nbsp; Final Bill<br>
        </div>
		</td>
		
		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="15" />&nbsp;&nbsp; <b>Cancellation</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="151" />&nbsp;&nbsp; OP Cancel<br>
        <input type="checkbox" name="menu[]" value="152" />&nbsp;&nbsp;  Lab Bill Cancel<br>
		<input type="checkbox" name="menu[]" value="153" />&nbsp;&nbsp; Procedure Lab Bill Cancel<br>
		
        </div>
		</td>
		
		
		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="16" />&nbsp;&nbsp; <b>Return Amount</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="161" />&nbsp;&nbsp; IP Return<br>
       <!-- <input type="checkbox" name="menu[]" value="162" />&nbsp;&nbsp;  Lab Bill Return<br>
		<input type="checkbox" name="menu[]" value="163" />&nbsp;&nbsp; Procedure Lab Bill Return<br>-->
		
        </div>
		</td>
		
		
		
		
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="7" />&nbsp;&nbsp; <b>Lab</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			
            
           
            <input type="checkbox" name="menu[]" value="71" />&nbsp;&nbsp; Lab Results Entry<br>
            <!--<input type="checkbox" name="menu[]" value="72" />&nbsp;&nbsp; Print Lab Results<br>-->
         
            
		</div>
		</td>
        <td ></td>
        </tr>
       
        <tr >
       
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="9" />&nbsp;&nbsp; <b>Pharmacy</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="90" />&nbsp;&nbsp; <B>Masters</B><br>-->
            
                 <!--&nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="91" />&nbsp;&nbsp; UOM<br>-->
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="92" />&nbsp;&nbsp; Product Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="93" />&nbsp;&nbsp; Supplier Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="94" />&nbsp;&nbsp; Supplier Amount<br>
                 <!--&nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="95" />&nbsp;&nbsp; Packing Information<br>-->
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="96" />&nbsp;&nbsp; Product Details<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="97" />&nbsp;&nbsp; Product Details Edit<br>
				 
            
		</td>
        <td colspan="2" class="label1" ></td>
		
		 
		
		 <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="90" />&nbsp;&nbsp; <b>Pharmacy Purchase</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			     &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="98" />&nbsp;&nbsp; Purchase Invoice<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99" />&nbsp;&nbsp; Purchase Return<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="990" />&nbsp;&nbsp; Stock Adjustment<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="991" />&nbsp;&nbsp; Stock Adjustment Report<br>
            
		</div>
		</td>
      
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="10" />&nbsp;&nbsp; <b>Pharmacy Sales</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="101" />&nbsp;&nbsp; Sales Entry<br>
            <input type="checkbox" name="menu[]" value="102" />&nbsp;&nbsp; Sales Return<br>
			<input type="checkbox" name="menu[]" value="103" />&nbsp;&nbsp; Due Patient/Customer<br>
			  
			
		
			<!--menu108
           
           
            <input type="checkbox" name="menu[]" value="105" />&nbsp;&nbsp; Sales Entry & Returns<br>
            
            
             <input type="checkbox" name="menu[]" value="138" />&nbsp;&nbsp; Drug Indent Form<br>-->
		</div>
		</td>
        <td ></td>
		
		
		 <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12903" />&nbsp;&nbsp; <b>Pharmacy Reports</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			  <input type="checkbox" name="menu[]" value="992" />&nbsp;&nbsp; Purchase Entry Report<br>
			  <input type="checkbox" name="menu[]" value="993" />&nbsp;&nbsp; Purchase Return Report<br>
			  <input type="checkbox" name="menu[]" value="994" />&nbsp;&nbsp; Supplier Items<br>
			  <input type="checkbox" name="menu[]" value="995" />&nbsp;&nbsp; GST Report<br>
			  <!--<input type="checkbox" name="menu[]" value="9994" />&nbsp;&nbsp; Stock Position Report<br>-->
			  <input type="checkbox" name="menu[]" value="996" />&nbsp;&nbsp; Stock Position<br>
			  <input type="checkbox" name="menu[]" value="997" />&nbsp;&nbsp; Medicine Shortlist<br> 
			  <input type="checkbox" name="menu[]" value="998" />&nbsp;&nbsp; Search Medicine<br>
			  <input type="checkbox" name="menu[]" value="999" />&nbsp;&nbsp; Compare Medicine Price<br>
			  <input type="checkbox" name="menu[]" value="9990" />&nbsp;&nbsp; Drug Expiry Report<br>
			  <input type="checkbox" name="menu[]" value="9991" />&nbsp;&nbsp; FSN Analysis<br>
			  <input type="checkbox" name="menu[]" value="9992" />&nbsp;&nbsp; ABC Analysis<br>
		<!--	<input type="checkbox" name="menu[]" value="9993" />&nbsp;&nbsp; Stock Position Report<br>-->
			<input type="checkbox" name="menu[]" value="9996" />&nbsp;&nbsp; DAY-SALES REPORT<br>
			<input type="checkbox" name="menu[]" value="9997" />&nbsp;&nbsp; M-Sales Entry Report<br>
			<input type="checkbox" name="menu[]" value="9998" />&nbsp;&nbsp; Drug Inspector Report<br>
			<input type="checkbox" name="menu[]" value="106" />&nbsp;&nbsp; Sales Entry Report<br>
			<input type="checkbox" name="menu[]" value="107" />&nbsp;&nbsp; Sales Return Report<br>
		<input type="checkbox" name="menu[]" value="138" />&nbsp;&nbsp; Pharmacy Account Summery<br>
		<input type="checkbox" name="menu[]" value="139" />&nbsp;&nbsp; Stock Adjustment Report<br>
		<input type="checkbox" name="menu[]" value="1388" />&nbsp;&nbsp; Pharmacy History<br>
		<input type="checkbox" name="menu[]" value="1389" />&nbsp;&nbsp; Pharmacy History With Amount<br>
		
			
			
		</div>
		</td>
        <td ></td>
        </tr>
        <tr >
   
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12" />&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="122" />&nbsp;&nbsp; Total Patiens List<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="028" />&nbsp;&nbsp; Doctor wise Patient Report<br>                
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="124" />&nbsp;&nbsp; In Patient Payment History<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="126" />&nbsp;&nbsp; Admitted Patients Report<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1294" />&nbsp;&nbsp; Referal Doctors List<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="029" />&nbsp;&nbsp; Date Wise Referal Doctors Amount Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="030" />&nbsp;&nbsp; Out Patient Report<br>
				   &nbsp;&nbsp;  <input type="checkbox" name="menu[]" value="1297" />&nbsp;&nbsp; Admited In Patients Report<br>
				     &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1293" />&nbsp;&nbsp; Referal Patients Report<br>
					  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="031" />&nbsp;&nbsp; Advance Bill Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12902" />&nbsp;&nbsp; Lab Bill Report<br>
				  <!--&nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12903" />&nbsp;&nbsp; Daycare Bill Report<br>-->
				  <input type="checkbox" name="menu[]" value="12910" />&nbsp;&nbsp; Total Lab Test List<br>
				  <input type="checkbox" name="menu[]" value="12911" />&nbsp;&nbsp; Doctor Wise Patient Report<br>
                
                 
				  <!--&nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="125" />&nbsp;&nbsp; Total Expenses Report<br>-->
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1205" />&nbsp;&nbsp; Dialy Amount Collected Report<br>
                
                
            <!--<input type="checkbox" name="menu[]" value="12902" />&nbsp;&nbsp; <B>LAB</B><br>-->
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12096" />&nbsp;&nbsp; Year Wise Report<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12097" />&nbsp;&nbsp; Discount  Wise Report<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12098" />&nbsp;&nbsp; Village Wise Report<br>
                 
                 <input type="checkbox" name="menu[]" value="99096" />&nbsp;&nbsp; Test Wise Lab Report<br>
				<input type="checkbox" name="menu[]" value="99097" />&nbsp;&nbsp; Test Wise Procedure Lab Report<br>
                 
                 
                 
                 
         
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1296" />&nbsp;&nbsp; Daily  Amount Pharmacy<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1299" />&nbsp;&nbsp; Daily  Amount Summary<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1820" />&nbsp;&nbsp; Discharge Patient Report<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1821" />&nbsp;&nbsp; Lab Due Bill Report<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1822" />&nbsp;&nbsp; Procedure Lab Bill Report<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1823" />&nbsp;&nbsp; Procedure Lab Due Bill Report<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1824" />&nbsp;&nbsp; Final Bill Report<br>
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1825" />&nbsp;&nbsp; Insurance Final Bill  Report<br>
                
                
                 
          
            
                
		</td>
       <!-- <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="13" />&nbsp;&nbsp; <b>CERTIFICATES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		
		
			<input type="checkbox" name="menu[]" value="131" />&nbsp;&nbsp; Birth Certificate<br>
            
           
            <input type="checkbox" name="menu[]" value="132" />&nbsp;&nbsp;Delivery / Birth Certificate<br>
            <input type="checkbox" name="menu[]" value="133" />&nbsp;&nbsp; Sterilisation Certificate<br>
			  
               
            
           
           
            
           
           
            
		</div>
		</td>-->
        <td ></td>
        </tr>
 
 <!--
  <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="14" />&nbsp;&nbsp; <b>ACCOUNTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="141" />&nbsp;&nbsp; <B>EXPENSES</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="142" />&nbsp;&nbsp; Expenses Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="143" />&nbsp;&nbsp; Expenses List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="144" />&nbsp;&nbsp; Expenses Report<br>
                 
                
            <input type="checkbox" name="menu[]" value="145" />&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAID</B><br>
                 
                 
                 
            <input type="checkbox" name="menu[]" value="146" />&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAIDLIST</B><br>
            
                 
            
               </div> 
		</td>
        <td ></td>
        
        
        
        
        
        </tr>-->
  
       
                </table>
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="employeeslist.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>