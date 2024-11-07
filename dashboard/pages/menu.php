<?php if($_SESSION['user']=="admin"){ ?>
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
<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse ">
	                <div id="remove-scroll" class="left-sidemenu">
	                    <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
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
	                        
							
							
							<li class="nav-item">
	                            <a href="dashboard.php" class="nav-link nav-toggle">
	                                <i class="material-icons">dashboard</i>
	                                <span class="title">Dashboard</span>
	                                <span class="selected"></span>
                                	<span class="arrow "></span>
	                            </a>
	                           <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="update_hospital.php" class="nav-link ">
	                                        <span class="title">Hospital Details</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item ">
	                                    <a href="update_pharmacy.php" class="nav-link ">
	                                        <span class="title">Pharmacy Details</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="update_lab.php" class="nav-link ">
	                                        <span class="title">Lab Details</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									
									 <!--<li class="nav-item  ">
	                                    <a href="daycarelist.php" class="nav-link ">
	                                        <span class="title">Daycare Details</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									-->
									 <li class="nav-item">
	                                    <a href="labtestdeptlist.php" class="nav-link ">
	                                        <span class="title">Lab Test Department</span>
	                                    </a>
	                                </li>
									
									 <li class="nav-item">
	                                    <a href="labtestdetails.php" class="nav-link ">
	                                        <span class="title">Lab Test Details</span>
	                                    </a>
	                                </li>
									<li class="nav-item">
	                                    <a href="city3.php" class="nav-link ">
	                                        <span class="title">Add Procedure</span>
	                                    </a>
	                                </li>
									
									<li class="nav-item">
	                                    <a href="update_validity.php" class="nav-link ">
	                                        <span class="title">Update Validity Days</span>
	                                    </a>
	                                </li>
									<li class="nav-item">
	                                    <a href="insurancelist.php" class="nav-link ">
	                                        <span class="title">Add Insurance Companies</span>
	                                    </a>
	                                </li>
									<li class="nav-item">
	                                    <a href="hospitaltarriflist.php" class="nav-link ">
	                                        <span class="title">Add Hospital Tarrif List</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="insurancetarriflist.php" class="nav-link ">
	                                        <span class="title">Add Insurance Tarrif List</span>
	                                    </a>
	                                </li>
									<li class="nav-item">
	                                    <a href="city.php" class="nav-link ">
	                                        <span class="title">Add City</span>
	                                    </a>
	                                </li><li class="nav-item">
	                                    <a href="city1.php" class="nav-link ">
	                                        <span class="title">Add Mandal</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="city2.php" class="nav-link ">
	                                        <span class="title">Add Address</span>
	                                    </a>
	                                </li>
	                                 
									<li class="nav-item  ">
	                                    <a href="empdeptlist.php" class="nav-link ">
	                                        <span class="title">Employee Department</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="employeeslist.php" class="nav-link ">
	                                        <span class="title">Employee Details</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									 <li class="nav-item  ">
	                                    <a href="userview.php" class="nav-link ">
	                                        <span class="title">Change Password</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="userview.php" class="nav-link ">
	                                        <span class="title">User Management</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                         <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
	                                <span class="title">Doctors</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="doctor.php" class="nav-link "> <span class="title">Doctor</span>
	                                    </a>
	                                </li>
									
									<li class="nav-item  ">
	                                    <a href="doctdeptlist.php" class="nav-link ">
	                                        <span class="title">Doctor Department</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>
									  <li class="nav-item  ">
	                                    <a href="reffer_doctor.php" class="nav-link "> <span class="title">Referal Doctor</span>
	                                    </a>
	                                </li>
									
	                               <!-- <li class="nav-item  ">
	                                    <a href="add_doctor.php" class="nav-link "> <span class="title">Add Doctor</span>
	                                    </a>
	                                </li>-->
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
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Wards</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="locationlist.php" class="nav-link "> <span class="title">Locations</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="roomtypeslist.php" class="nav-link "> <span class="title">Room Types</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="roomslist.php" class="nav-link "> <span class="title">Rooms</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="bedslist.php" class="nav-link "> <span class="title">Beds</span>
	                                    </a>
	                                </li>
	    <!--                            <li class="nav-item  ">
	                                    <a href="roomtarriflist.php" class="nav-link "> <span class="title">Room Tarrif</span>
	                                    </a>
	                                </li>-->
									<li class="nav-item  ">
	                                    <a href="bedstatus.php" class="nav-link "> <span class="title">Beds Status</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
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
	                          <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
	                            <span class="title">Appointment</span><span class="arrow"></span></a>
	                            <ul class="sub-menu">
	                                <!--<li class="nav-item  ">
	                                    <a href="schedule.html" class="nav-link "> <span class="title">Doctor Schedule</span>
	                                    </a>
	                                </li>-->
	                                <li class="nav-item  ">
	                                    <a href="book_appointment.php" class="nav-link "> <span class="title">Book Appointment</span>
	                                    </a>
	                                </li>
									
									 <li class="nav-item  ">
	                                    <a href="reg_card.php" class="nav-link "> <span class="title">Registration Card</span>
	                                    </a>
	                                </li>
									
										 
									<li class="nav-item  ">
	                                    <a href="op_report.php" class="nav-link "> <span class="title">Out Patient History</span>
	                                    </a>
	                                </li>
	                               <!-- <li class="nav-item  ">
	                                    <a href="book_appointment_material.html" class="nav-link "> <span class="title">Book Appointment Material</span>
	                                    </a>
	                                </li>
	                                 <li class="nav-item  ">
	                                    <a href="edit_appointment.html" class="nav-link "> <span class="title">Edit Appointment</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="view_appointment.html" class="nav-link "> <span class="title">View All Appointment</span>
	                                    </a>
	                                </li>-->
	                            </ul>
	                        </li>
	                       
	                       
<script>
function reportxx(){
	//alert("hi");
	//var fdate = document.getElementById("fromdate").value;
	//var tdate = document.getElementById("todate").value;
	window.open('admit_patients1.php','Mywindow','width=1020,height=800,toolbar=no,menubar=no');

}
</script>	
	                       
	                       <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
	                                <span class="title">In Patients</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="inpatient.php" class="nav-link "> <span class="title">All Patients</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="ipbedlist.php" class="nav-link "> <span class="title">Ip Room Transfer</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="phistory.php" class="nav-link "> <span class="title">Patient History</span>
	                                    </a>
	                                </li>
	                                 <li class="nav-item  ">
									<a href="" onclick="reportxx();">
	                                  <span class="title">All Patient Report</span>
	                                    </a>
	                                </li>
	                                
	                            </ul>
	                        </li>
	                       
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Billing</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="advancebilllist.php" class="nav-link "> <span class="title">Advance Payment</span>
	                                    </a>
	                                </li>
	                               <!-- <li class="nav-item  ">
	                                    <a href="padvancebilllist.php" class="nav-link "> <span class="title">PhysiotherapyAdvance Payment</span>
	                                    </a>
	                                </li>-->
	                                <li class="nav-item  ">
	                                    <a href="labbilllist.php" class="nav-link "> <span class="title">Lab Bill</span>
	                                    </a>
	                                </li>
	                                 <li class="nav-item  ">
	                                    <a href="labbilllistk.php" class="nav-link "> <span class="title">Procedure Lab Bill</span>
	                                    </a>
	                                </li>
	                              <!--  <li class="nav-item  ">
	                                    <a href="daycarebilllist.php" class="nav-link "> <span class="title">Daycare Bill</span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="gpbilllist.php" class="nav-link "> <span class="title">GP Bill</span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="physiotherapybilllist.php" class="nav-link "> <span class="title">Physiotherapy Bill</span>
	                                    </a>
	                                </li>-->
	                               
	                                <li class="nav-item  ">
	                                    <a href="dischargesummarylist.php" class="nav-link "> <span class="title">Discharge Summary</span>
	                                    </a>
	                                </li>
	                                
	                               <li class="nav-item  ">
	                                    <a href="finalbilllist.php" class="nav-link "> <span class="title">Final Bill Insurance</span>
	                                    </a>
	                                </li>
									 <li class="nav-item  ">
	                                    <a href="finalbilllis1.php" class="nav-link "> <span class="title">Final Bill</span>
	                                    </a>
	                                </li>
	                                 <!--<li class="nav-item  ">
	                                    <a href="labreultlist.php" class="nav-link "> <span class="title">Print Lab Results</span>
	                                    </a>
	                                </li>-->
	                            </ul>
	                        </li>
	                        
	                        
           
		   <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Cancellation</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="op_can1.php" class="nav-link "> <span class="title">OP Cancellation</span>
	                                    </a>
	                                </li>
	                               
	                                <li class="nav-item  ">
	                                    <a href="lab_cancel.php" class="nav-link "> <span class="title">Lab Bill Cancellation</span>
	                                    </a>
	                                </li>
	                                 <li class="nav-item  ">
	                                    <a href="plab_cancel.php" class="nav-link "> <span class="title">Procedure Lab Bill Cancellation</span>
	                                    </a>
	                                </li>
	                             
	                               
	                                 
	                            </ul>
	                        </li>
	                        
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Return Amount</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item  ">
	                                    <a href="ip_ret.php" class="nav-link "> <span class="title">IP Return</span>
	                                    </a>
	                                </li>
	                               
	                          <!--      <li class="nav-item  ">
	                                    <a href="lab_ret.php" class="nav-link "> <span class="title">Lab Return </span>
	                                    </a>
	                                </li>
	                                 
	                               <li class="nav-item  ">
	                                    <a href="plab_ret.php" class="nav-link "> <span class="title">Procedure Lab Return </span>
	                                    </a>
	                                </li>
	                                 -->
	                            </ul>
	                        </li>
			
							<li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Lab</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                
	                               
	                                <li class="nav-item  ">
	                                    <a href="labbillentrylist.php" class="nav-link "> <span class="title">Lab Results Entry</span>
	                                    </a>
	                                </li>
	                            								
	                                 <!--<li class="nav-item  ">
	                                    <a href="labreultlist.php" class="nav-link "> <span class="title">Print Lab Results</span>
	                                    </a>
	                                </li>-->
	                            </ul>
	                        </li>
		   
		   
		   
		   
		   
		   
		   
		   
		   
	                      
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                                
                                
                                
                                
                                
                                
                                <!-- <li class="nav-item  "><a href="uom.php"><span class="title">UOM</span></a></li>-->
                        <li class="nav-item  "><a href="product_type_list.php"><span class="title">Product Type</span></a></li>
						<li class="nav-item  "> <a href="supplier_info_list.php"><span class="title">Supplier Information</span></a></li>
						<li class="nav-item  "><a href="supplier_info_list2.php"><span class="title">Supplier Amount</span></a></li>
                       <!-- <li class="nav-item  "><a href="packing_info_list.php"><span class="title">Packing Information</span></a></li>-->
						<li class="nav-item  "><a href="product_details_list.php"><span class="title">Product Details</span></a></li>
                        <li class="nav-item  "><a href="edit_product.php"><span class="title">Product Details Edit</span></a></li>

                                
	                              
	                            </ul>
								
								
								
	                        </li>
	                        <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Purchase</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                                 <li class="nav-item  "><a href="purchase_invoice_list.php"><span class="title">Purchase Invoice</span></a></li>
                        <li class="nav-item  "><a href="purchase_return_list.php"><span class="title">Purchase Return</span></a></li>
						<li class="nav-item  "> <a href="stock_adjustment.php"><span class="title">Stock Adjustment</span></a></li>
						<li class="nav-item  "><a href="stock_report.php"><span class="title">Stock Adjustment Report</span></a></li>
                       
      
	                            </ul>
								
	                        </li>
                            
							 <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Sales</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                                  <li class="nav-item  "><a href="salesentry_list.php"><span class="title">Sales Entry</span></a></li>
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
                        <li class="nav-item  "><a href="salesreturn.php"><span class="title">
                        Sales Return</span></a></li>
						<li class="nav-item  "><a href="duecustomer.php"><span class="title">
                       Due Patient/Customer</span></a></li>
					   <!-- <li class="nav-item  "><a href="drugindent_view.php"  ><span class="title">
                       Drug Indent Form</span></a></li>	 -->
      </ul>
								
	                        </li>
							
							  <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
	                                <span class="title">Pharmacy Reports</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
                                
                                 <li class="nav-item  "><a href="stock_report.php"><span class="title">Stock Adjustment Report</span></a></li>
								 
								
								 
                        <li class="nav-item  "><a href="purchase_entry_report.php">
                        <span class="title">Purchase Entry Report</span></a></li>
						<li class="nav-item  ">
                         <a href="purchase_return_report.php"><span class="title">Purchase Return Report</span></a></li>
						<li class="nav-item  "><a href="add_supplier_items.php"><span class="title">
                       Supplier Items</span></a></li>
                       
      <li class="nav-item  "><a href="vat_report.php"><span class="title">
                       GST Report</span></a></li>
      
<!-- <li class="nav-item  "><a href="stock_position_report.php"><span class="title">
                       Stock Position Report</span></a></li>-->
               <li class="nav-item  "><a href="medicinelist.php" target="new"><span class="title">
                       Medicine Short List</span></a></li>
					    <li class="nav-item  "><a href="searchbox.php" ><span class="title">
                       Search Medicine</span></a></li>
					     <li class="nav-item  "><a href="searchbox1.php" ><span class="title">
                       Compare Medicine</span></a></li>
					    <li class="nav-item  "><a href="drug_expiry.php?report=11" ><span class="title">
                       Drug Expiry Report</span></a></li>
					    <!--<li class="nav-item  "><a href="FSN_productdetails_list.php" ><span class="title">
                       FSN Analysis</span></a></li>
               <li class="nav-item  "><a href="ABC_Analysis.php" ><span class="title">
                       ABC Analysis</span></a></li>-->
					   
					    <li class="nav-item  "><a href="stock_position_report1.php" ><span class="title">
                       Stock Position Report</span></a></li>
					   
					    <li class="nav-item  "><a href="salesentry_report.php" ><span class="title">
                       Day Sales Report</span></a></li>
					    <li class="nav-item  "><a href="sales_typesmonth_report.php" ><span class="title">
                       M-Sales Entry Report</span></a></li>
					    <li class="nav-item  "><a href="druginspector_report.php" target="new" ><span class="title">
                       Drug Inspector Report</span></a></li>
					    <li class="nav-item  "><a href="salesentryreports.php"  ><span class="title">
                       Sales Entry Report</span></a></li>
					    <li class="nav-item  "><a href="salesreturnreports.php"  ><span class="title">
                       Sales Return Report</span></a></li>
                       
       <li class="nav-item  "><a href="profit_report.php"  ><span class="title">
                      Pharmacy Account Summery</span></a></li>
					  
					   <li class="nav-item  "><a href="pharmacy_history.php"  ><span class="title">
                      Pharmacy History</span></a></li>
					  
					   <li class="nav-item  "><a href="pharmacy_history1.php"  ><span class="title">
                      Pharmacy History With Amount</span></a></li>
					  
	                            </ul>
								
	                        </li>
                            
                            
                            <li class="nav-item  ">
	                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
	                                <span class="title">Reports</span> <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                 <li class="nav-item  ">
	                                    <a href="hospitalpatients_report.php" class="nav-link "> <span class="title"> Out Patient Report</span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="labtestreportslist.php" class="nav-link "> <span class="title">Total Lab Test List</span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="op_report_doct.php" class="nav-link "> <span class="title">Doctor wise Patient Report</span>
	                                    </a>
	                                </li>
									<!--<li class="nav-item  ">
	                                    <a href="patientpaymenthistory.php" class="nav-link "> <span class="title">In Patient Payment History</span>
	                                    </a>
	                                </li>-->
								<!--	<li class="nav-item  ">
	                                    <a href="admitpatients.php" class="nav-link "> <span class="title">Admited Patients Report</span>
	                                    </a>
	                                </li>-->
									 <li class="nav-item  ">
	                                    <a href="hospitalpatients_report1.php" class="nav-link "> <span class="title">Village Report </span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="year2019.php" class="nav-link "> <span class="title">Year wise Report </span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="discount.php" class="nav-link "> <span class="title">Discount Report </span>
	                                    </a>
	                                </li>

									<li class="nav-item  ">
	                                    <a href="cancle_rp.php" class="nav-link"> <span class="title">Cancellation Report</span>
	                                    </a>
	                                </li>
									
									<li class="nav-item  ">
	                                    <a href="referal_doctors_List.php" target="new" class="nav-link "> <span class="title">Referal Doctors List</span>
	                                    </a>
	                                </li>
									<li class="nav-item  ">
	                                    <a href="datereferaldoctoramountcollection.php" class="nav-link "> <span class="title">Date Wise Referal Doctors Amount Report</span>
	                                    </a>
	                                </li>
								<!--	<li class="nav-item  ">
	                                    <a href="op_report.php" class="nav-link "> <span class="title">Out Patient Report</span>
	                                    </a>
	                                </li>-->
	                                
	                                <li class="nav-item  ">
	                                    <a href="dis_report.php" class="nav-link "> <span class="title">Discharge Patient Report</span>
	                                    </a>
	                                </li>
	                                
	                                
	                                
	                                
	                                <li class="nav-item  ">
	                                    <a href="test_labreport.php" class="nav-link "> <span class="title">Test Wise Lab Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="test_plabreport.php" class="nav-link "> <span class="title">Test Wise Procedure Lab Report</span>
	                                    </a>
	                                </li>
									
									<li class="nav-item  ">
	                                    <a href="op_report1.php" class="nav-link "> <span class="title">Admited In Patients Report</span>
	                                    </a>
	                                </li>
									
									<li class="nav-item  ">
	                                    <a href="referalpatients_report.php" class="nav-link "> <span class="title">Referal Patients Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="advancebillreport.php" class="nav-link "> <span class="title">Advance Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="labbillreport.php" class="nav-link "> <span class="title">Lab Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="labduebillreport.php" class="nav-link "> <span class="title">Lab Due Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="plabbillreport.php" class="nav-link "> <span class="title">Procedure Lab Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="plabduebillreport.php" class="nav-link "> <span class="title">Procedure Due Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="finalbillreport.php" class="nav-link "> <span class="title">Final Bill Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="insurancebillreport.php" class="nav-link "> <span class="title">Final Bill Insurance Report</span>
	                                    </a>
	                                </li>
	                                <!-- <li class="nav-item  ">
	                                    <a href="daycarebillreport.php" class="nav-link "> <span class="title">Daycare Bill Report</span>
	                                    </a>
	                                </li>
	                               <li class="nav-item  ">
	                                    <a href="physiotherapybillreport.php" class="nav-link "> <span class="title">Physiotherapy Bill Report</span>
	                                    </a>
	                                </li>-->
	                                 <li class="nav-item  ">
	                                    <a href="daily_amount.php" class="nav-link "> <span class="title">Daily Collected Amount Report</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="daily_amount1.php" class="nav-link "> <span class="title">Daily  Amount Pharmacy</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item  ">
	                                    <a href="daily_amount_emp.php" class="nav-link "> <span class="title">Daily  Amount Summary</span>
	                                    </a>
	                                </li>
	                               
	                            </ul>
	                        </li>
                           
     
              
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
                </div>
            </div>
				<?php }else{

include('menu1.php');
}?>		