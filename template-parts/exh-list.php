<div class="tab-section">
  <h3>Exhibitor List</h3>
  <ul class="exh-list double-col">



<?php
$show_code = get_field('show_code');
$show_code_name = esc_html( $show_code->name );

$dcrm_data = get_site_url() . "/data/" . $show_code_name . "_exlist.json";
$string = @file_get_contents($dcrm_data, true);





if ($string === false) {
    // deal with error...
    echo "no exhibitors found";
}

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
    // echo "no exhibitors found";
}


  if(isset($json_a) && is_array($json_a))
  {

foreach ($json_a as $company_name => $company_a) { ?>
    <li>
      <a href="<?php echo $company_a['URL']; ?>" target="_blank"><?php echo $company_a['CoName']; ?></a>
      <?php if (!empty($company_a['Booth'])) {
      echo "-&nbsp;Booth&nbsp;" . $company_a['Booth'];
      } ;?>
    </li>
<?php }

  } 



?>


  </ul>
</div>  