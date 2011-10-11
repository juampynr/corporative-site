<?php

abstract class fb_social_default extends boxes_box {

  /**
   * Implementation of boxes_content::options_defaults().
   */
  public function options_defaults() {
  	return fb_social_fb_plugin_defaults($this->fb_plugin_name);
  }

  /**
   * Implementation of boxes_content::options_form().
   */
  public function options_form(&$form_state) {
    $fieldset =  array(
        '#type' => 'fieldset', 
        '#title' => t('Facebook plugin attributes'), 
        '#collapsible' => TRUE, 
    );

    return $fieldset + $form = fb_social_fb_plugin_fb_settings_form($this->fb_plugin_name, $this -> options);
  }

  /**
   * Implementation of boxes_content::render().
   */
  public function render() {
    $title = isset($this->title) ? check_plain($this->title) : NULL;
    $block['title'] = $title;
    $block['subject'] = $title;
    $block['delta'] = $this->delta;
    $block['content'] = fb_social_box_view($this);
    return $block;
  }
}