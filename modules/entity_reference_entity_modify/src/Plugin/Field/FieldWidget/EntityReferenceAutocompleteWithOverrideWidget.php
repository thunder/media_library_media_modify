<?php

namespace Drupal\entity_reference_entity_modify\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
use Drupal\media_library_media_modify\Plugin\Field\FieldWidget\EntityReferenceEntityModifyWidgetTrait;

/**
 * Implementation of the 'entity_reference_autocomplete_with_override' widget.
 *
 * @FieldWidget(
 *   id = "entity_reference_autocomplete_with_override",
 *   label = @Translation("Autocomplete (with override)"),
 *   description = @Translation("An autocomplete text field with overrides"),
 *   field_types = {
 *     "entity_reference_entity_modify"
 *   }
 * )
 */
class EntityReferenceAutocompleteWithOverrideWidget extends EntityReferenceAutocompleteWidget {

  use EntityReferenceEntityModifyWidgetTrait;

}
