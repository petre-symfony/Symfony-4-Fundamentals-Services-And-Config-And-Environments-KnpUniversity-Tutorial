<?php
namespace App\Service;

use Symfony\Component\Cache\Adapter\AdapterInterface;
use Michelf\MarkdownInterface;

class MarkdownHelper {
  public function parse(string $source, AdapterInterface $cache, MarkdownInterface $markdown):string{
    $item = $cache->getItem('markdown_'.md5($source));
    if (!$item->isHit()){
      $item->set($markdown->transform($source));
      $cache->save($item);
    }

    return $item->get();
  }
}
