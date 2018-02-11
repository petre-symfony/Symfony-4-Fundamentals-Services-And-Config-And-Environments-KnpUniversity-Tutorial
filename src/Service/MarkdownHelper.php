<?php
namespace App\Service;


class MarkdownHelper {
  public function parse(string $source):string{
    $item = $cache->getItem('markdown_'.md5($articleContent));
    if (!$item->isHit()){
      $item->set($markdown->transform($articleContent));
      $cache->save($item);
    }

    return $item->get();
  }
}
