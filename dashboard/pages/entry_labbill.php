<?php //include('config.php');
include_once("../db/connection.php");
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include("header.php");?>
<script>
	
	function show1(){
	    var bno=document.getElementById('bno').value;
	   var all_location_id = document.querySelectorAll('input[name="result10[]"]:checked');

var aIds = [];
var c=all_location_id.length;
console.log(c);
for(var x = 0, l = all_location_id.length; x < l;  x++)
{
    aIds.push(all_location_id[x].value);
}

var str = aIds.join(', ');
c1=c+1;
document.getElementById('count').value=c1;
Show(str);

//self.location="print_result2.php?bno="+bno+"&str="+encodeURIComponent(str);
//console.log(str);
     
       }

		
		//alert(t);
	
	
	</script>
<script>
function show2(str){
	var bno=document.getElementById('bno').value;
	
	alert(str);
	window.open('rentry_labbill.php?bno='+bno+'&test='+str,'mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');
}
function Show(str)
{
    var c=document.getElementById("count").value;
	//c=c1+1;
	//alert(c);
var d=document.getElementById("bno").value;
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var show=xmlhttp.responseText;
	var strar=show.split("#");
//	console.log(strar);
	//document.getElementById("supname").value=strar[2];
	
	for(i=1;i<=c;i++){
	document.getElementById("testlab"+i).innerHTML=strar[i];
	}
//	document.getElementById("testlab1").innerHTML=strar[2];
//	document.getElementById("testlab2").innerHTML=strar[3];
//	document.getElementById("testlab3").innerHTML=strar[4];
//	document.getElementById("testlab4").innerHTML=strar[5];
//	document.getElementById("testlab5").innerHTML=strar[6];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search8166.php?q="+str+"&bno="+d,true);
xmlhttp.send();
}
</script>
<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Lab Bill</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Lab Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Lab Bill Entry</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Lab Bill</header>
                                    
                                     
				                       
                                </div>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <?php
										$id=$_GET['id'];
											$tp="select *  from bill where billno='$id'";
											$rst = mysqli_query($link,$tp) or die(mysqli_error($link));

										foreach($rst as $key => $res){
											$bdate1 = str_replace('-', '/', ($res['bdate']));
											$bdate=date('d/m/Y', strtotime($bdate1));
											$tamount=$res['tamount'];
											$discount=$res['discount'];
											$namount=$res['namount'];
											$pamount=$res['pamount'];
											$bamount=$res['bamount'];
											$remarks=$res['remarks'];
											$paymenttype=$res['paymenttype'];
											
											?>
										<div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mrno"   id="mrno" placeholder="Enter MRNO" class="form-control mrno" readonly value="<?php echo $mrno=$res['mrno']; ?>" required /> 
													
													 </div>
                                            										
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
												
											
                                                <div class="col-md-4">
												
                                                    <input type="text" name="bno" data-required="1" id="bno" placeholder="Enter Bill No" class="form-control" value="<?php echo $bno1=$res['billno']; ?>" readonly/>
													 <input type="hidden" name="user"  id="user"  class="form-control" value="<?php echo $ses; ?>" />
													 <input type="hidden" name="id"  id="id"  class="form-control" value="<?php echo $res['id']; ?>" />
													</div>
											
												<label class="control-label col-md-2">Bill Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="text" value="<?php echo $bdate; ?>" name="bdate" id="bdate">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            </div>
												</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pname" data-required="1" id="pname"  placeholder="Enter Patient Name" class="form-control" required value="<?php echo $res['pname']; ?>"/> 
                                                    <input type="hidden" name="count" id="count"/>
													
													</div>
												<label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="age" data-required="1" id="age"  placeholder="Enter Age" class="form-control" required value="<?php echo $res['age']; ?>"/> 
                                              </div>
											
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="gender" data-required="1" id="gender"   placeholder="Enter Gender" class="form-control" required value="<?php echo $res['gender']; ?>"/> 
													
													</div>
                                            <label class="control-label col-md-2">Doctor Name
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dname"  id="dname" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $res['dname']; ?>"/> </div>
                                            
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Mobile No</label>
                                                <div class="col-md-4">
                                                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile No" class="form-control" value="<?php echo $res['mobile']; ?>"/> </div>
                                                 <label class="control-label col-md-2">Patient Type</label>
                                                <div class="col-md-4">
                                                <input type="text" name="ptype" data-required="1" id="ptype" placeholder="Enter Patient type" class="form-control" value="<?php echo $res['ptype']; ?>"/> </div>
                                          	</div>
											
										
                                          	
                                          	
                                          <div class="form-group row">
                                                
                                                
                                                <div class="col-md-4">
                                                
												<?php 
													$qt="select * from bill1 where bno='$id'";
													$q=mysqli_query($link,$qt);
													foreach($q as $key=>$r){
													 $test=$r['testname']; 
													?>
													<input type="radio" name="test" id="test" value="<?php echo $test; ?>" onClick="show2('<?php echo $test; ?>')" /><?php echo $test; ?><br/>
												<?php  } ?>
												
												
												 </div>
												 
												 <div class="col-md-4"></div>
                                          	</div>	
                                   
											<?php }?>
											
                                        			
                                        			
                                        			
                                        			
                                        			
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="labbillentrylist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
	   
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    

	      <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>