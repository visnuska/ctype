 function templatename_button($variables) {
  $element = $variables['element'];
  $type = strtolower($element['#button_type']);
  switch($type){
    case 'submit':
    case 'reset':
    case 'button':
      break;
    default:
      $type = 'submit';
      break;
  }
  $element['#attributes']['type'] = $type;

  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}
and in your form

  $form['mybutton'] = array(
    '#type'  => 'button',
    '#value' =>  t('mytext'),
    '#button_type' => 'button',
  );
  