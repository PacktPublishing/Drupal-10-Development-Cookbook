<?php

namespace Drupal\mymodule\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * @ConfigEntityType(
 *   id = "announcement",
 *   label = "Announcement",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "message",
 *   },
 *   admin_permission = "administer announcement",
 *   handlers = {
 *     "list_builder" = "Drupal\mymodule\AnnouncementListBuilder",
 *     "form" = {
 *       "default" = "Drupal\mymodule\AnnouncementForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *     "collection" = "/admin/config/system/announcements",
 *     "add-form" = "/admin/config/system/announcements/add",
 *     "delete-form" = "/admin/config/system/announcements/manage/{announcement}/delete",
 *     "edit-form" = "/admin/config/system/announcements/manage/{announcement}",
 *   },
 * )
 */
class Announcement extends ConfigEntityBase {

  public string $label = '';

  public string $message = '';

}
