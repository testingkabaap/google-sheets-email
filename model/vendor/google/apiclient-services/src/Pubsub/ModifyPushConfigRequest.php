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

namespace Google\Service\Pubsub;

class ModifyPushConfigRequest extends \Google\Model
{
  /**
   * @var PushConfig
   */
  public $pushConfig;
  protected $pushConfigType = PushConfig::class;
  protected $pushConfigDataType = '';

  /**
   * @param PushConfig
   */
  public function setPushConfig(PushConfig $pushConfig)
  {
    $this->pushConfig = $pushConfig;
  }
  /**
   * @return PushConfig
   */
  public function getPushConfig()
  {
    return $this->pushConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ModifyPushConfigRequest::class, 'Google_Service_Pubsub_ModifyPushConfigRequest');
