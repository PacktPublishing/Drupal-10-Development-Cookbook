<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends ControllerBase {

  public function store(Request $request): JsonResponse {
    $content = $request->getContent();
    $json = \Drupal\Component\Serialization\Json::decode($content);

    $entity_type_manager = $this->entityTypeManager();
    $node_storage = $entity_type_manager->getStorage('node');

    $article = $node_storage->create([
      'type' => 'article',
      'title' => $json['title'],
      'body' => $json['body'],
    ]);
    $article->save();

    $article_url = $article->toUrl()->setAbsolute()->toString();
    return new JsonResponse(
      $article->toArray(),
      201,
      ['Location' => $article_url],
    );
  }

  public function index(Request $request): JsonResponse {
    $sort = $request->query->get('sort', 'DESC');

    $entity_type_manager = $this->entityTypeManager();
    $node_storage = $entity_type_manager->getStorage('node');

    $query = $node_storage->getQuery()
      ->accessCheck(TRUE);
    $query->condition('type', 'article');
    $query->condition('status', TRUE);
    $query->sort('created', $sort);
    $node_ids = $query->execute();

    $nodes = $node_storage->loadMultiple($node_ids);
    $nodes = array_map(function (\Drupal\node\NodeInterface $node) {
      return $node->toArray();
    }, $nodes);
    return new JsonResponse($nodes);
  }

  public function get(NodeInterface $node): JsonResponse {
    $entity_type_manager = $this->entityTypeManager();
    $access_handler = $entity_type_manager->getAccessControlHandler('node');

    $node_access = $access_handler->access($node, 'view');

    if (!$node_access) {
      return new JsonResponse(NULL, 404);
    }

    return new JsonResponse(
      $node->toArray(),
    );
  }

}
