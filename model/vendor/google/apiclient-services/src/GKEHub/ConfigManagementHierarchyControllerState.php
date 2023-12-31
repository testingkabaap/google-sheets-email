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

namespace Google\Service\GKEHub;

class ConfigManagementHierarchyControllerState extends \Google\Model
{
  /**
   * @var ConfigManagementHierarchyControllerDeploymentState
   */
  public $state;
  protected $stateType = ConfigManagementHierarchyControllerDeploymentState::class;
  protected $stateDataType = '';
  /**
   * @var ConfigManagementHierarchyControllerVersion
   */
  public $version;
  protected $versionType = ConfigManagementHierarchyControllerVersion::class;
  protected $versionDataType = '';

  /**
   * @param ConfigManagementHierarchyControllerDeploymentState
   */
  public function setState(ConfigManagementHierarchyControllerDeploymentState $state)
  {
    $this->state = $state;
  }
  /**
   * @return ConfigManagementHierarchyControllerDeploymentState
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param ConfigManagementHierarchyControllerVersion
   */
  public function setVersion(ConfigManagementHierarchyControllerVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return ConfigManagementHierarchyControllerVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementHierarchyControllerState::class, 'Google_Service_GKEHub_ConfigManagementHierarchyControllerState');
