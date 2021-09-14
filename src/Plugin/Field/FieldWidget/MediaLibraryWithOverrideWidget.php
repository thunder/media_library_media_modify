<?php

namespace Drupal\media_library_media_modify\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\media_library\Plugin\Field\FieldWidget\MediaLibraryWidget;
use Drupal\Core\Ajax\InvokeCommand;

/**
 * Plugin implementation of the 'media_library_media_modify_widget' widget.
 *
 * @FieldWidget(
 *   id = "media_library_media_modify_widget",
 *   label = @Translation("Media library (with override)"),
 *   description = @Translation("Allows you to select items from the media library and modify them in context."),
 *   field_types = {
 *     "entity_reference_entity_modify"
 *   },
 *   multiple_values = TRUE,
 * )
 */
class MediaLibraryWithOverrideWidget extends MediaLibraryWidget {

  use EntityReferenceEntityModifyWidgetTrait {
    formElement as singleFormElement;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    foreach ($items->referencedEntities() as $delta => $media_item) {
      $element['selection'][$delta] += $this->singleFormElement($items, $delta, [], $form, $form_state);
      $element['selection'][$delta]['edit']['#attributes'] = [
        'class' => [
          'media-library-item__edit',
        ],
      ];
      $widget_id = $element['media_library_update_widget']['#attributes']['data-media-library-widget-update'];
      $element['selection'][$delta]['edit']['#media_library_media_modify']['ajax_commands'][] = new InvokeCommand("[data-media-library-widget-update=\"$widget_id\"]", 'trigger', ['mousedown']);
    }
    return $element;
  }

}
