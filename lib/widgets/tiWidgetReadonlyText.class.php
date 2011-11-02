<?php
class tiWidgetReadonlyText extends sfWidgetForm {
  
	protected function configure($options = array(), $attributes = array())
	{
		parent::configure($options, $attributes);

		$this->addOption('type', 'hidden');
	}	
  
  /**
   * Renders the widget.
   *
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return $this->renderContentTag('label', $value, $attributes).$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));
  }
}