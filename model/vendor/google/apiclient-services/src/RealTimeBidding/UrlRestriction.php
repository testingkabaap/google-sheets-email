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

namespace Google\Service\RealTimeBidding;

class UrlRestriction extends \Google\Model
{
  /**
   * @var Date
   */
  public $endDate;
  protected $endDateType = Date::class;
  protected $endDateDataType = '';
  /**
   * @var string
   */
  public $restrictionType;
  /**
   * @var Date
   */
  public $startDate;
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param Date
   */
  public function setEndDate(Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setRestrictionType($restrictionType)
  {
    $this->restrictionType = $restrictionType;
  }
  /**
   * @return string
   */
  public function getRestrictionType()
  {
    return $this->restrictionType;
  }
  /**
   * @param Date
   */
  public function setStartDate(Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlRestriction::class, 'Google_Service_RealTimeBidding_UrlRestriction');
