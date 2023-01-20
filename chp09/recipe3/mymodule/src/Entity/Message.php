<?php

namespace Drupal\mymodule\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\RevisionLogEntityTrait;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the message entity class.
 *
 * @ContentEntityType(
 *   id = "message",
 *   label = @Translation("Message"),
 *   base_table = "message",
 *   entity_keys = {
 *     "id" = "message_id",
 *     "label" = "title",
 *     "uuid" = "uuid",
 *   },
 *   admin_permission = "administer message",
 *   field_ui_base_route = "entity.message.collection",
 *   handlers = {
 *     "list_builder" = "Drupal\mymodule\MessageListBuilder",
 *     "form" = {
 *       "default" = "Drupal\mymodule\MessageForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *     "canonical" = "/messages/{message}",
 *     "add-form" = "/messages/add",
 *     "edit-form" = "/messages/{message}/edit",
 *     "delete-form" = "/messages/{message}/delete",
 *     "collection" = "/admin/structure/messages"
 *   },
 *   revision_table = "message_revision",
 *   show_revision_ui = TRUE,
 *   revision_metadata_keys = {
 *     "revision_user" = "revision_uid",
 *     "revision_created" = "revision_timestamp",
 *     "revision_log_message" = "revision_log"
 *   },
 * )
 */
class Message extends ContentEntityBase {

  use RevisionLogEntityTrait;

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);
    // Add the revision metadata fields.
    $fields += static::revisionLogBaseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayConfigurable('view', TRUE);
    $fields['content'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Content'))
      ->setRequired(TRUE)
      ->setDescription(t('Content of the message'))
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'text_default',
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
