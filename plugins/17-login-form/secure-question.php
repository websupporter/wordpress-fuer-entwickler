<?php
add_filter( 'login_form_middle', 'get_secure_form' );
function get_secure_form(){
    $sec = create_secure_question();
    $string = '
  <input type="hidden" name="securekey" value="'.$sec['key'].'" />
  <p>
    <label for="sec_input">' . $sec['frage'] . '</label>
    <input type="text" name="secure" id="sec_input" />
  </p>';
    return $string;
}