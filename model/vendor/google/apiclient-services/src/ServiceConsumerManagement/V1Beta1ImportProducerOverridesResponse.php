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

namespace Google\Service\ServiceConsumerManagement;

class V1Beta1ImportProducerOverridesResponse extends \Google\Collection
{
  protected $collection_key = 'overrides';
  /**
   * @var V1Beta1QuotaOverride[]
   */
  public $overrides;
  protected $overridesType = V1Beta1QuotaOverride::class;
  protected $overridesDataType = 'array';

  /**
   * @param V1Beta1QuotaOverride[]
   */
  public function setOverrides($overrides)
  {
    $this->overrides = $overrides;
  }
  /**
   * @return V1Beta1QuotaOverride[]
   */
  public function getOverrides()
  {
    return $this->overrides;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1Beta1ImportProducerOverridesResponse::class, 'Google_Service_ServiceConsumerManagement_V1Beta1ImportProducerOverridesResponse');
