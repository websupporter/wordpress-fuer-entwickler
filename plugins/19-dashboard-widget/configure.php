<?php
function autoren_widget_optionen(){
  if( isset( $_POST['autoren_widget'] ) ) {
    $optionen['anz'] = (int) $_POST['autoren_widget']['anz'];
    $optionen['autor'] = (int) $_POST['autoren_widget']['autor'];
    update_option( 'autoren_widget', $optionen );
  }
  $default = array( 'autor' => 1, 'anz' => 5 );
  $optionen = get_option( 'autoren_widget', $default );
  ?>
  <p><label for="aw_autor">Wähle einen Autoren</label></p>
  <?php wp_dropdown_users( array(
    'selected' => $optionen['autor'],
    'id' => 'aw_autor',
    'name' => 'autoren_widget[autor]'
  ) ); ?>
  <p><label for="aw_anz">Anzahl der Posts:</label></p>
  <input
    type="text"
    id="aw_anz"
    name="autoren_widget[anz]"
    value="<?php echo $optionen['anz']; ?>"
  />
  <?php
}