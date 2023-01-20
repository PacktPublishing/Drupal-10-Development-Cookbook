<?php

namespace Drupal\mymodule\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * @ConfigEntityType(
 *   id = "message_type",
 *   label = @Translation("Message type"),
 *   config_prefix = "message_type",
 *   bundle_of = "message",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   admin_permission = "administer message_type",
 *   handlers = {
 *     "list_builder" = "Drupal\mymodule\MessageTypeListBuilder",
 *     "form" = {
 *       "default" = "Drupal\mymodule\MessageTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *     "collection" = "/admin/structure/message-types",
 *     "add-form" = "/admin/structure/message-types/add",
 *     "delete-form" = "/admin/structure/message-types/{message_type}/delete",
 *     "edit-form" = "//admin/structure/message-types/{message_type}/edit",
 *   },
 * )
 */
class MessageType extends ConfigEntityBundleBase {

  public string $label = '';

}
