<?php

namespace Drupal\media_library_media_modify\Exception;

/**
 * Thrown before saving of overridden entities.
 *
 * ReadOnlyEntityException should be thrown if an an entity referenced in the
 * 'media_library_media_modify' field is saved.
 */
class ReadOnlyEntityException extends \LogicException {}
