<?php

namespace rklein79\drupal8_common\Event;

use Drupal\taxonomy\TermInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event fired when a term is inserted, updated or deleted.
 */
class TermEvent extends Event {

  const TERM_INSERT = 'rklein79.drupal8_common.term.insert';

  const TERM_UPDATE = 'rklein79.drupal8_common.term.update';

  const TERM_DELETE = 'rklein79.drupal8_common.term.delete';

  /**
   * The term.
   *
   * @var \Drupal\taxonomy\TermInterface
   */
  private $term;

  /**
   * Constructor.
   *
   * @param \Drupal\taxonomy\TermInterface $term
   *   The term.
   */
  public function __construct(TermInterface $term) {
    $this->term = $term;
  }

  /**
   * Gets the term.
   *
   * @return \Drupal\taxonomy\TermInterface
   *   The term.
   */
  public function getTerm() {
    return $this->term;
  }

}
