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

namespace Google\Service\AdMob;

class MediationReportSpec extends \Google\Collection
{
  protected $collection_key = 'sortConditions';
  /**
   * @var DateRange
   */
  public $dateRange;
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  /**
   * @var MediationReportSpecDimensionFilter[]
   */
  public $dimensionFilters;
  protected $dimensionFiltersType = MediationReportSpecDimensionFilter::class;
  protected $dimensionFiltersDataType = 'array';
  /**
   * @var string[]
   */
  public $dimensions;
  /**
   * @var LocalizationSettings
   */
  public $localizationSettings;
  protected $localizationSettingsType = LocalizationSettings::class;
  protected $localizationSettingsDataType = '';
  /**
   * @var int
   */
  public $maxReportRows;
  /**
   * @var string[]
   */
  public $metrics;
  /**
   * @var MediationReportSpecSortCondition[]
   */
  public $sortConditions;
  protected $sortConditionsType = MediationReportSpecSortCondition::class;
  protected $sortConditionsDataType = 'array';
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param DateRange
   */
  public function setDateRange(DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param MediationReportSpecDimensionFilter[]
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return MediationReportSpecDimensionFilter[]
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  /**
   * @param string[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param LocalizationSettings
   */
  public function setLocalizationSettings(LocalizationSettings $localizationSettings)
  {
    $this->localizationSettings = $localizationSettings;
  }
  /**
   * @return LocalizationSettings
   */
  public function getLocalizationSettings()
  {
    return $this->localizationSettings;
  }
  /**
   * @param int
   */
  public function setMaxReportRows($maxReportRows)
  {
    $this->maxReportRows = $maxReportRows;
  }
  /**
   * @return int
   */
  public function getMaxReportRows()
  {
    return $this->maxReportRows;
  }
  /**
   * @param string[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param MediationReportSpecSortCondition[]
   */
  public function setSortConditions($sortConditions)
  {
    $this->sortConditions = $sortConditions;
  }
  /**
   * @return MediationReportSpecSortCondition[]
   */
  public function getSortConditions()
  {
    return $this->sortConditions;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediationReportSpec::class, 'Google_Service_AdMob_MediationReportSpec');
