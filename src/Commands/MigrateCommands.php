<?php

namespace Drupal\media_library_media_modify\Commands;

use Drush\Commands\DrushCommands;
use Drupal\media_library_media_modify\EntityReferenceOverrideService;

/**
 * Drush commands for media_library_media_modify.
 */
class MigrateCommands extends DrushCommands {

  /**
   * The entity reference override service.
   *
   * @var \Drupal\media_library_media_modify\EntityReferenceOverrideService
   */
  protected $entityReferenceOverrideService;

  /**
   * Constructor.
   *
   * @param \Drupal\media_library_media_modify\EntityReferenceOverrideService $entityReferenceOverrideService
   *   The entity reference override service.
   */
  public function __construct(EntityReferenceOverrideService $entityReferenceOverrideService) {
    parent::__construct();
    $this->entityReferenceOverrideService = $entityReferenceOverrideService;
  }

  /**
   * Migrates an entity_reference field to media_library_media_modify.
   *
   * @param string $entity_type_id
   *   The entity type ID.
   * @param string $field_name
   *   The field name.
   *
   * @command media_library_media_modify:migrate
   *
   * @usage drush media_library_media_modify:migrate
   *   Migrates an entity_reference field to media_library_media_modify.
   */
  public function migrate($entity_type_id, $field_name) {

    try {
      $this->entityReferenceOverrideService->migrateEntityReferenceField($entity_type_id, $field_name);
    }
    catch (\Exception $exception) {
      $this->io()->error($exception->getMessage());
    }

    $this->io()->success(\dt('Migration complete.'));
  }

}
