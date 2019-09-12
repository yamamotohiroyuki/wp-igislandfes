<div class="underconstruction">
  <?php
    if(is_page('access')):
      $file_name = 'underconstruction-yet';
    else:
      $file_name = 'underconstruction';
    endif;
  ?>
  <p><img src="<?php echo temp_add('img/underconstruction/').$file_name ?>.png" alt="underconstruction" class="shake-little"></p>
</div>