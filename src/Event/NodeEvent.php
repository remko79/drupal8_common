<?php

namespace rklein79\drupal8_common\Event;

use Drupal\node\NodeInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event fired when a node is inserted, updated or deleted.
 */
class NodeEvent extends Event {

  const NODE_PRESAVE = 'rklein79.drupal8_common.node.presave';

  const NODE_INSERT = 'rklein79.drupal8_common.node.insert';

  const NODE_UPDATE = 'rklein79.drupal8_common.node.update';

  const NODE_DELETE = 'rklein79.drupal8_common.node.delete';

  /**
   * The node.
   *
   * @var \Drupal\node\NodeInterface
   */
  private $node;

  /**
   * Constructor.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node.
   */
  public function __construct(NodeInterface $node) {
    $this->node = $node;
  }

  /**
   * Returns the node.
   *
   * @return \Drupal\node\NodeInterface
   *   The node.
   */
  public function getNode() {
    return $this->node;
  }

}
