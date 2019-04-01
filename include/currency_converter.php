<?php require_once("./model/exchange.php");  //class holds RSS  feed details 

$rates = new exchange(); //instantiate the class and fetch initial rates
?>

<form action="#" method="post" name="formx">
  <fieldset>
  <legend> Currency and Exchange Rates </legend>
  <table border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td width="131"><?php 
	
	 
	$decimal="%.3f"; // format currenct into how many decimals
	
	?>
        <?php 	$from="EUR"; $to="USD"; $amt=1; 	     ?>
        €
        <input name="usd1" type="text" id="usd1" size="7" value="1" onChange="document.formx.eur.value=document.formx.usd1.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td width="137"><input name="eur" type="text" size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd1.value=Math.round(document.formx.eur.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>));"   />
        USD </td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="GBP"; $amt=1; ?>
        €
        <input name="usd2" type="text" id="usd2" size="7" value="1" onChange="document.formx.gbp.value=document.formx.usd2.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td><input name="gbp" type="text"  size="11"  value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd2.value=Math.round(document.formx.gbp.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"  />
        GBP </td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="CAD"; $amt=1;    ?>
        €
        <input name="usd3" type="text" id="usd3" size="7"  value="1" onChange="document.formx.cad.value=document.formx.usd3.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td><input name="cad" type="text"  size="11"  value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd3.value=Math.round(document.formx.cad.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        CAD </td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="HKD"; $amt=1;    ?>
        €
        <input name="usd4" type="text" id="usd4" size="7" value="1"  onChange="document.formx.hkd.value=document.formx.usd4.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td><input name="hkd" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onChange="document.formx.usd4.value=Math.round(document.formx.hkd.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>) )"   />
        HKD</td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="AUD"; $amt=1;    ?>
        €
        <input name="usd5" type="text" id="usd5" size="7" value="1"  onChange="document.formx.aud.value=document.formx.usd5.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td><input name="aud" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onChange="document.formx.usd5.value=Math.round(document.formx.aud.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        AUD </td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="SGD"; $amt=1;    ?>
        €
        <input name="usd6" type="text" id="usd6" size="7" value="1"  onchange="document.formx.sgd.value=document.formx.usd6.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>; Math.round(document.formx.usd6.value)" />
        EUR =</td>
      <td><input name="sgd" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd6.value=Math.round(document.formx.sgd.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        SGD</td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="CNY"; $amt=1;    ?>
        €
        <input name="usd7" type="text" id="usd7" size="7" value="1"  onchange="document.formx.cny.value=Math.round(document.formx.usd7.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?> )" />
        EUR =</td>
      <td><input name="cny" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd7.value=document.formx.cny.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>)"   />
        RMB </td>
    </tr>
    <tr>
      <td><?php 	$from="EUR"; $to="INR"; $amt=1;    ?>
        €
        <input name="usd8" type="text" id="usd8" size="7" value="1"  onchange="document.formx.inr.value=document.formx.usd8.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        EUR =</td>
      <td><input name="inr" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd8.value=Math.round(document.formx.inr.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        INR </td>
    </tr>
  </table>
 
  </fieldset>
 <a href="<?php echo $rates->exchange_source_url ?>">Source</a>
  <input type="reset" name="Reset" id="button" value="Reset" />  
</form>
<!-- end of Widget Form -->
