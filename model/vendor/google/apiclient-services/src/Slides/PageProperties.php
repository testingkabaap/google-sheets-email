<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Slides;

class PageProperties extends \Google\Model
{
  /**
   * @var ColorScheme
   */
  public $colorScheme;
  protected $colorSchemeType = ColorScheme::class;
  protected $colorSchemeDataType = '';
  /**
   * @var PageBackgroundFill
   */
  public $pageBackgroundFill;
  protected $pageBackgroundFillType = PageBackgroundFill::class;
  protected $pageBackgroundFillDataType = '';

  /**
   * @param ColorScheme
   */
  public function setColorScheme(ColorScheme $colorScheme)
  {
    $this->colorScheme = $colorScheme;
  }
  /**
   * @return ColorScheme
   */
  public function getColorScheme()
  {
    return $this->colorScheme;
  }
  /**
   * @param PageBackgroundFill
   */
  public function setPageBackgroundFill(PageBackgroundFill $pageBackgroundFill)
  {
    $this->pageBackgroundFill = $pageBackgroundFill;
  }
  /**
   * @return PageBackgroundFill
   */
  public function getPageBackgroundFill()
  {
    return $this->pageBackgroundFill;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PageProperties::class, 'Google_Service_Slides_PageProperties');
