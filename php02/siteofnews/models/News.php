<?php

namespace Application\Models;

/**
 * Class NewsModel
 * @property $id
 * @property $title
 * @property $content
 * @property $timeofadd
 * @property $viewcounter
 * @property $preview
 */

class News
  extends \AbstractModel
{

  protected static $table = 'articles';

}