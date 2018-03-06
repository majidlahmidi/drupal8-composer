<?php

/**
 * @file
 * Theme settings form for mytheme theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function mytheme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['mytheme'] = [
    '#type' => 'details',
    '#title' => t('mytheme'),
    '#open' => TRUE,
  ];

  $form['mytheme']['font_size'] = [
    '#type' => 'number',
    '#title' => t('Font size'),
    '#min' => 12,
    '#max' => 18,
    '#default_value' => theme_get_setting('font_size'),
  ];

}
