<?php
include("../db/connection.php");

 //$sdate=$_GET['sdate'];
 //$edate=$_GET['edate'];
 //$sdate1=date('Y-m-d',strtotime($sdate));
 //$edate1=date('Y-m-d',strtotime($edate));
 //$nsdate=$sdate+1;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 


 
?>
<table >
<tr><td ><img src="../img/raajtop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Year Wise Summary - 2019-2020</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Month.</b></td>
                             <td align="center"><b>OP</b></td>
                             <td align="center"><b>IP.</b></td>
						
                            <td align="center"><b>Lab Bill.</b></td>
                           
							
                           
                            
							
                            
							
						</tr>
                        
                        <tr>
                            <td align="center">1</td>
                             <td align="center">April</td>
                              <td align="center">
							175950
							  </td>
                            <td align="center">
						 
							
							 695465
							</td>
                            
                             <td align="center"> 
							
							  45950</td>
                               
						</tr>
						<tr>
                            <td align="center">2</td>
                             <td align="center">May</td>
                              <td align="center">
							226750
							  </td>
                            <td align="center">
						 
							
							 759540
							</td>
                            
                             <td align="center"> 
							
							  35678</td>
                               
						</tr>
						<tr>
                            <td align="center">3</td>
                             <td align="center">June</td>
                              <td align="center">
							108975
							  </td>
                            <td align="center">
						 
							
							  
							 985750
							</td>
                            
                             <td align="center"> 
							
							  49795</td>
                               
						</tr>
						<tr>
                            <td align="center">4</td>
                             <td align="center">July</td>
                              <td align="center">
							195410
							  </td>
                            <td align="center">
						 
							
							 698745
							</td>
                            
                             <td align="center"> 
							
							  77650</td>
                               
						</tr>
						<tr>
                            <td align="center">5</td>
                             <td align="center">August</td>
                              <td align="center">
							226950
							  </td>
                            <td align="center">
						 
							
							 645679
							</td>
                            
                             <td align="center"> 
							
							  35264</td>
                               
						</tr>
						<tr>
                            <td align="center">6</td>
                             <td align="center">September</td>
                              <td align="center">
							278500
							  </td>
                            <td align="center">
						 
							
							 987511
							</td>
                            
                             <td align="center"> 
							
							  65411</td>
                               
						</tr>
						<tr>
                            <td align="center">7</td>
                             <td align="center">October</td>
                              <td align="center">
							287510
							  </td>
                            <td align="center">
						 
							
							 775900
							</td>
                            
                             <td align="center"> 
							
							  49751</td>
                               
						</tr>
						<tr>
                            <td align="center">8</td>
                             <td align="center">November</td>
                              <td align="center">
							109762
							  </td>
                            <td align="center">
						 
							
							 885394
							</td>
                            
                             <td align="center"> 
							
							  63741</td>
                               
						</tr>
						<tr>
                            <td align="center">9</td>
                             <td align="center">December</td>
                              <td align="center">
							126650
							  </td>
                            <td align="center">
						 
							
							 952675
							</td>
                            
                             <td align="center"> 
							
							  65481</td>
                               
						</tr>
						<tr>
                            <td align="center">10</td>
                             <td align="center">January</td>
                              <td align="center">
							1259765
							  </td>
                            <td align="center">
						 
							
							 968711
							</td>
                            
                             <td align="center"> 
							
							  65481</td>
                               
						</tr>
							<tr>
                            <td align="center">11</td>
                             <td align="center">February</td>
                              <td align="center">
							195750
							  </td>
                            <td align="center">
						 
							
							 974650
							</td>
                            
                             <td align="center"> 
							
							  45121</td>
                               
						</tr>
							<tr>
                            <td align="center">12</td>
                             <td align="center">March</td>
                              <td align="center">
							275940
							  </td>
                            <td align="center">
						 
							
							 697400
							</td>
                            
                             <td align="center"> 
							
							  29450</td>
                               
						</tr>
						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : 14124105</b></td>
						 
						</tr>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>

<br/>
<br/>

<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Year Wise Summary - 2020-2021</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Month.</b></td>
                             <td align="center"><b>OP</b></td>
                             <td align="center"><b>IP.</b></td>
						
                            <td align="center"><b>Lab Bill.</b></td>
                           
							
                           
                            
							
                            
							
						</tr>
                        
                        <tr>
                            <td align="center">1</td>
                             <td align="center">April</td>
                              <td align="center">
							265750
							  </td>
                            <td align="center">
						 
							
							 875000
							</td>
                            
                             <td align="center"> 
							
							  136950</td>
                               
						</tr>
						<tr>
                            <td align="center">2</td>
                             <td align="center">May</td>
                              <td align="center">
							164980
							  </td>
                            <td align="center">
						 
							
							 779500
							</td>
                            
                             <td align="center"> 
							
							  162025</td>
                               
						</tr>
						<tr>
                            <td align="center">3</td>
                             <td align="center">June</td>
                              <td align="center">
							175000
							  </td>
                            <td align="center">
						 
							
							  
							 698750
							</td>
                            
                             <td align="center"> 
							
							  145960</td>
                               
						</tr>
						<tr>
                            <td align="center">4</td>
                             <td align="center">July</td>
                              <td align="center">
							189000
							  </td>
                            <td align="center">
						 
							
							 857490
							</td>
                            
                             <td align="center"> 
							
							  67500</td>
                               
						</tr>
						<tr>
                            <td align="center">5</td>
                             <td align="center">August</td>
                              <td align="center">
							123890
							  </td>
                            <td align="center">
						 
							
							 945120
							</td>
                            
                             <td align="center"> 
							
							  49850</td>
                               
						</tr>
						<tr>
                            <td align="center">6</td>
                             <td align="center">September</td>
                              <td align="center">
							212575
							  </td>
                            <td align="center">
						 
							
							 896054
							</td>
                            
                             <td align="center"> 
							
							  64750</td>
                               
						</tr>
						<tr>
                            <td align="center">7</td>
                             <td align="center">October</td>
                              <td align="center">
							225975
							  </td>
                            <td align="center">
						 
							
							 791452
							</td>
                            
                             <td align="center"> 
							
							  96975</td>
                               
						</tr>
						<tr>
                            <td align="center">8</td>
                             <td align="center">November</td>
                              <td align="center">
							169700
							  </td>
                            <td align="center">
						 
							
							 697850
							</td>
                            
                             <td align="center"> 
							
							  164950</td>
                               
						</tr>
						<tr>
                            <td align="center">9</td>
                             <td align="center">December</td>
                              <td align="center">
							147000
							  </td>
                            <td align="center">
						 
							
							 975750
							</td>
                            
                             <td align="center"> 
							
							  125987</td>
                               
						</tr>
						<tr>
                            <td align="center">10</td>
                             <td align="center">January</td>
                              <td align="center">
							216950
							  </td>
                            <td align="center">
						 
							
							 996985
							</td>
                            
                             <td align="center"> 
							
							  69750</td>
                               
						</tr>
							<tr>
                            <td align="center">11</td>
                             <td align="center">February</td>
                              <td align="center">
							229500
							  </td>
                            <td align="center">
						 
							
							 1132698
							</td>
                            
                             <td align="center"> 
							
							  96780</td>
                               
						</tr>
							<tr>
                            <td align="center">12</td>
                             <td align="center">March</td>
                              <td align="center">
							175900
							  </td>
                            <td align="center">
						 
							
							 987632
							</td>
                            
                             <td align="center"> 
							
							  187950</td>
                               
						</tr>
						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : 14299928</b></td>
						 
						</tr>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>

<br/>
<br/>
<br/>
<br/>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Year Wise Summary - 2021-2022</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Month.</b></td>
                             <td align="center"><b>OP</b></td>
                             <td align="center"><b>IP.</b></td>
						
                            <td align="center"><b>Lab Bill.</b></td>
                           
							
                           
                            
							
                            
							
						</tr>
                        
                        <tr>
                            <td align="center">1</td>
                             <td align="center">April</td>
                              <td align="center">
							264200
							  </td>
                            <td align="center">
						 
							
							 697925
							</td>
                            
                             <td align="center"> 
							
							  105640</td>
                               
						</tr>
						<tr>
                            <td align="center">2</td>
                             <td align="center">May</td>
                              <td align="center">
							197950
							  </td>
                            <td align="center">
						 
							
							 874621
							</td>
                            
                             <td align="center"> 
							
							  89750</td>
                               
						</tr>
						<tr>
                            <td align="center">3</td>
                             <td align="center">June</td>
                              <td align="center">
							216750
							  </td>
                            <td align="center">
						 
							
							  
							 956410
							</td>
                            
                             <td align="center"> 
							
							  199451</td>
                               
						</tr>
						<tr>
                            <td align="center">4</td>
                             <td align="center">July</td>
                              <td align="center">
							269500
							  </td>
                            <td align="center">
						 
							
							 1045990
							</td>
                            
                             <td align="center"> 
							
							  196541</td>
                               
						</tr>
						<tr>
                            <td align="center">5</td>
                             <td align="center">August</td>
                              <td align="center">
							247750
							  </td>
                            <td align="center">
						 
							
							 689511
							</td>
                            
                             <td align="center"> 
							
							  199154</td>
                               
						</tr>
						<tr>
                            <td align="center">6</td>
                             <td align="center">September</td>
                              <td align="center">
							224750
							  </td>
                            <td align="center">
						 
							
							 758450
							</td>
                            
                             <td align="center"> 
							
							  175151</td>
                               
						</tr>
						<tr>
                            <td align="center">7</td>
                             <td align="center">October</td>
                              <td align="center">
							269750
							  </td>
                            <td align="center">
						 
							
							 1695440
							</td>
                            
                             <td align="center"> 
							
							  130642</td>
                               
						</tr>
						<tr>
                            <td align="center">8</td>
                             <td align="center">November</td>
                              <td align="center">
							247510
							  </td>
                            <td align="center">
						 
							
							 1697401
							</td>
                            
                             <td align="center"> 
							
							  167955</td>
                               
						</tr>
						<tr>
                            <td align="center">9</td>
                             <td align="center">December</td>
                              <td align="center">
							196540
							  </td>
                            <td align="center">
						 
							
							 876131
							</td>
                            
                             <td align="center"> 
							
							  99975</td>
                               
						</tr>
						<tr>
                            <td align="center">10</td>
                             <td align="center">January</td>
                              <td align="center">
							169875
							  </td>
                            <td align="center">
						 
							
							 954165
							</td>
                            
                             <td align="center"> 
							
							  197951</td>
                               
						</tr>
							<tr>
                            <td align="center">11</td>
                             <td align="center">February</td>
                              <td align="center">
							136900
							  </td>
                            <td align="center">
						 
							
							 984511
							</td>
                            
                             <td align="center"> 
							
							  197484</td>
                               
						</tr>
							<tr>
                            <td align="center">12</td>
                             <td align="center">March</td>
                              <td align="center">
							175725
							  </td>
                            <td align="center">
						 
							
							 1095400
							</td>
                            
                             <td align="center"> 
							
							  216450</td>
                               
						</tr>
						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : 16919299</b></td>
						 
						</tr>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>



<tr><td>&nbsp;</td></tr>

<br/>
<br/>

<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Year Wise Summary - 2022-2023</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Month.</b></td>
                             <td align="center"><b>OP</b></td>
                             <td align="center"><b>IP.</b></td>
						
                            <td align="center"><b>Lab Bill.</b></td>
                           
							
                		
						</tr>
                        
                        <tr>
                            <td align="center">1</td>
                             <td align="center">April</td>
                              <td align="center">
                              339750
							  </td>
                            <td align="center">
						 
							
							22200
							</td>
                            
                             <td align="center"> 
							
                             1411270</td>
                               
						</tr>
						<tr>
                            <td align="center">2</td>
                             <td align="center">May</td>
                              <td align="center">
                              344850
							  </td>
                            <td align="center">
						 
							
                            16500
							</td>
                            
                             <td align="center"> 
							
                             1203800</td>
                               
						</tr>
						<tr>
                            <td align="center">3</td>
                             <td align="center">June</td>
                              <td align="center">
                              340650
							  </td>
                            <td align="center">
						 
							
							  
							24600
							</td>
                            
                             <td align="center"> 
							
                             1551110</td>
                               
						</tr>
						<tr>
                            <td align="center">4</td>
                             <td align="center">July</td>
                              <td align="center">
                              419850
							  </td>
                            <td align="center">
						 
							
                            21300
							</td>
                            
                             <td align="center"> 
							
                             1688920</td>
                               
						</tr>
						<tr>
                            <td align="center">5</td>
                             <td align="center">August</td>
                              <td align="center">
                              390450
							  </td>
                            <td align="center">
						 
							
                            26700
							</td>
                            
                             <td align="center"> 
							
                             1775690</td>
                               
						</tr>
						<tr>
                            <td align="center">6</td>
                             <td align="center">September</td>
                              <td align="center">
                              400350
							  </td>
                            <td align="center">
						 
							
                            30600
							</td>
                            
                             <td align="center"> 
							
                             1897200</td>
                               
						</tr>
						<tr>
                            <td align="center">7</td>
                             <td align="center">October</td>
                              <td align="center">
                              390300
							  </td>
                            <td align="center">
						 
							
							23100
							</td>
                            
                             <td align="center"> 
							
							 1779850</td>
                               
						</tr>
						<tr>
                            <td align="center">8</td>
                             <td align="center">November</td>
                              <td align="center">
                              377250
							  </td>
                            <td align="center">
						 
							
                            24000
							</td>
                            
                             <td align="center"> 
							
                             1744210</td>
                               
						</tr>
						<tr>
                            <td align="center">9</td>
                             <td align="center">December</td>
                              <td align="center">
                              434400
							  </td>
                            <td align="center">
						 
							
							32400
							</td>
                            
                             <td align="center"> 
							
                             1824640</td>
                               
						</tr>
						<tr>
                            <td align="center">10</td>
                             <td align="center">January</td>
                              <td align="center">
                              471000
							  </td>
                            <td align="center">
						 
							
							25200
							</td>
                            
                             <td align="center"> 
							
							 1805780</td>
                               
						</tr>
							<tr>
                            <td align="center">11</td>
                             <td align="center">February</td>
                              <td align="center">
                              384050
							  </td>
                            <td align="center">
						 
							
                            18900
							</td>
                            
                             <td align="center"> 
							
							 1422360</td>
                               
						</tr>
							<tr>
                            <td align="center">12</td>
                             <td align="center">March</td>
                              <td align="center">
                              555000
							  </td>
                            <td align="center">
						 
							
							33000
							</td>
                            
                             <td align="center"> 
							
                             2304330</td>
                               
						</tr>
						<tr style="color:red"><td colspan="4" align="center"><b>Total Collection Amount : 25555560</b></td>
						 
						</tr>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>






<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
