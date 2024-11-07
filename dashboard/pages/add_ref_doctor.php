<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
	
<script>
function calc(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>

<script>
function calc1(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc3(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('labshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('labamount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
lab=document.getElementById('labamount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount)+parseFloat(lab);
document.getElementById('total').value=tt;
}
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
			
			<?php
$result = mysqli_query($link,"SHOW TABLE STATUS WHERE `Name` = 'referal_doctor'");
$data = mysqli_fetch_assoc($result);
 $next_increment = $data['Auto_increment'];


 ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Referal Doctor</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="ref_doctor.php">Referal Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Referal Doctor</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Referal Doctor Details</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								
								<form name="form" method="post" action="../modal/insert.php">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Doctor Name</label>
	                                            <input type="text" class="form-control" name="refdoc" required="required" id="dname" >
												 <input type="hidden" class="form-control"  value="<?php echo $ses?>"  name="user" id="user" >
												
												
	                                        </div>
											
											 <div class="form-group">
	                                            <label>E-Mail</label>
	                                            <input type="email" class="form-control"  name="gmail" id="gmail" >
	                                        </div>
											<div class="form-group">
	                                            <label>Ref Code</label>
												<input type="text" name="refcode" class="form-control" value="RCD-<?php echo $next_increment ?>" readonly="readonly"/>
												
												
	                                        </div>
											
										
											
											
												<!--<div class="form-group">
	                                            <label>O/p Lab Share(%)</label>
	                                            <input type="text" class="form-control" required="required" name="hospitalshare" id="hospitalshare">
												<input type="hidden" name="hamo" id="hamo" readonly="readonly" onfocus="calc()" class="text"/>
	                                        </div>-->
											
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Mobile No.</label>
	                                            <input type="text" class="form-control" name="contno" required="required" id="contno" >
                                        </div>
										
										 <div class="form-group">
                                            <label>Address</label>
	                                           <textarea name="addr" class="form-control" ></textarea>
                                        </div>
									
                                        
										
										<!--<div class="form-group">
	                                            <label>Doctor Share(%)</label>
	                                            <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
												name="doctorshare" id="doctorshare" >
												<input type="hidden" required="required" readonly="readonly" name="doctoamount" id="doctoramount" onfocus="calc1()" class="text"/>
	                                        </div>
									  
									   <div class="form-group">
                                            <label>I/P Lab Share(%)</label>
                                    <input type="text" required="required" class="form-control" name="labshare" id="labshare" onfocus="calc3()" class="text"/>
									<input type="hidden" required="required" readonly="readonly" name="labamount" id="labamount"  class="text"/>
									   </div> -->
									   
									  
									
									   
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="add_ref_doct">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='reffer_doctor.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					
              
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

header('Location:../../index.php');

}

?>