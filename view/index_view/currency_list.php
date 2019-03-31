<?php include './include/header.php'; ?>
<main>

    <h2>Financial Currencies List</h2>
    <section>
        <table>
            <tr>
                <th>Currency Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($currencies as $currency) : ?>
                <tr>
                    <td><?php echo $currency['currency_name']; ?></td>    
                    <td><?php echo $currency['currency_description']; ?></td>
                    <td><?php echo $currency['currency_price']; ?></td>   
                  
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="view/index_view/userLogIn.php">Login</a></p>
        <p><a href="?action=register_new_form">Register</a></p>
    </section>
</section>

</main>

<?php
/*require_once './model/exchange.php';
$rates = new exchange();

//Some Test rates
echo "1 USD equals ".$rates->exchange_rate_convert("USD","EUR",1) . " EUR <br>";
echo "1 USD equals ".$rates->exchange_rate_convert("USD","GBP",1) . " GBP <br>";
echo "1 USD equals ".$rates->exchange_rate_convert("USD","CAN",1) . " CAN <br>";
echo "1 USD equals ".$rates->exchange_rate_convert("USD","CNY",1) . " EUR <br>";



//$rates->show_rates();*/

?>


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
        <?php 	$from="USD"; $to="EUR"; $amt=1; 	     ?>
        $
        <input name="usd1" type="text" id="usd1" size="7" value="1" onChange="document.formx.eur.value=document.formx.usd1.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD
        =</td>
      <td width="137"><input name="eur" type="text" size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd1.value=Math.round(document.formx.eur.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>));"   />
        EUR </td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="GBP"; $amt=1; ?>
        $
        <input name="usd2" type="text" id="usd2" size="7" value="1" onChange="document.formx.gbp.value=document.formx.usd2.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD=</td>
      <td><input name="gbp" type="text"  size="11"  value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd2.value=Math.round(document.formx.gbp.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"  />
        GBP </td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="CAD"; $amt=1;    ?>
        $
        <input name="usd3" type="text" id="usd3" size="7"  value="1" onChange="document.formx.cad.value=document.formx.usd3.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD
        =</td>
      <td><input name="cad" type="text"  size="11"  value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"  onChange="document.formx.usd3.value=Math.round(document.formx.cad.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        CAD </td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="HKD"; $amt=1;    ?>
        $
        <input name="usd4" type="text" id="usd4" size="7" value="1"  onChange="document.formx.hkd.value=document.formx.usd4.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD= </td>
      <td><input name="hkd" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onChange="document.formx.usd4.value=Math.round(document.formx.hkd.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>) )"   />
        HKD</td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="AUD"; $amt=1;    ?>
        $
        <input name="usd5" type="text" id="usd5" size="7" value="1"  onChange="document.formx.aud.value=document.formx.usd5.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD=</td>
      <td><input name="aud" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onChange="document.formx.usd5.value=Math.round(document.formx.aud.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        AUD </td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="SGD"; $amt=1;    ?>
        $
        <input name="usd6" type="text" id="usd6" size="7" value="1"  onchange="document.formx.sgd.value=document.formx.usd6.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>; Math.round(document.formx.usd6.value)" />
        USD=</td>
      <td><input name="sgd" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd6.value=Math.round(document.formx.sgd.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        SGD</td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="CNY"; $amt=1;    ?>
        $
        <input name="usd7" type="text" id="usd7" size="7" value="1"  onchange="document.formx.cny.value=Math.round(document.formx.usd7.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?> )" />
        USD=</td>
      <td><input name="cny" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd7.value=document.formx.cny.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>)"   />
        RMB </td>
    </tr>
    <tr>
      <td><?php 	$from="USD"; $to="INR"; $amt=1;    ?>
        $
        <input name="usd8" type="text" id="usd8" size="7" value="1"  onchange="document.formx.inr.value=document.formx.usd8.value*<?php printf("%.2f", $rates->exchange_rate_convert($from,$to,$amt))  ?>" />
        USD=</td>
      <td><input name="inr" type="text"  size="11" value="<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>"   onchange="document.formx.usd8.value=Math.round(document.formx.inr.value*(1/<?php printf($decimal, $rates->exchange_rate_convert($from,$to,$amt))  ?>))"   />
        INR </td>
    </tr>
  </table>
 
  </fieldset>
 <a href="<?php echo $rates->exchange_source_url ?>">Source</a> : Valid for <?php echo  $rates->exchange_rate_time ?> done
  <input type="button" name="Reset" id="button" value="Get Rates" onClick="location.reload();" /> <input type="reset" name="Reset" id="button" value="Reset" />  
</form>
<!-- end of Widget Form -->




<?php include './include/footer.php'; ?>