<?php

namespace rklein79\drupal8_common\Event;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event fired when hook_form_alter is invoked.
 */
class FormEvent extends Event {

  const FORM_ALTER = 'rklein79.drupal8_common.form.alter';

  const NODE_FORM_ALTER = 'rklein79.drupal8_common.node.form.alter';

  /**
   * An associative array containing the structure of the form.
   *
   * @var array
   */
  private $form;

  /**
   * The current state of the form.
   *
   * @var \Drupal\Core\Form\FormStateInterface
   */
  private $formState;

  /**
   * The unique string identifying the form.
   *
   * @var string
   */
  private $formId;

  /**
   * Constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param string $form_id
   *   The unique string identifying the form.
   */
  public function __construct(array &$form, FormStateInterface $form_state, $form_id) {
    $this->form = &$form;
    $this->formState = $form_state;
    $this->formId = $form_id;
  }

  /**
   * Gets the form.
   *
   * @return array
   *   The form.
   */
  public function &getForm() {
    return $this->form;
  }

  /**
   * Gets the current state of the form.
   *
   * @return \Drupal\Core\Form\FormStateInterface
   *   The current state of the form.
   */
  public function getFormState() {
    return $this->formState;
  }

  /**
   * Checks if the form ID of the event is in the given form IDs.
   *
   * @param string[] $form_ids
   *   A list of form IDs.
   *
   * @return bool
   *   TRUE when the form being altered is in the given list of form IDs.
   */
  public function isEventForOneOf(array $form_ids) {
    return in_array($this->formId, $form_ids, TRUE);
  }

  /**
   * Gets the unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return $this->formId;
  }

}
