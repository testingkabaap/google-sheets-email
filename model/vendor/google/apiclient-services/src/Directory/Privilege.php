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

namespace Google\Service\Directory;

class Privilege extends \Google\Collection
{
  protected $collection_key = 'childPrivileges';
  /**
   * @var Privilege[]
   */
  public $childPrivileges;
  protected $childPrivilegesType = Privilege::class;
  protected $childPrivilegesDataType = 'array';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var bool
   */
  public $isOuScopable;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $privilegeName;
  /**
   * @var string
   */
  public $serviceId;
  /**
   * @var string
   */
  public $serviceName;

  /**
   * @param Privilege[]
   */
  public function setChildPrivileges($childPrivileges)
  {
    $this->childPrivileges = $childPrivileges;
  }
  /**
   * @return Privilege[]
   */
  public function getChildPrivileges()
  {
    return $this->childPrivileges;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param bool
   */
  public function setIsOuScopable($isOuScopable)
  {
    $this->isOuScopable = $isOuScopable;
  }
  /**
   * @return bool
   */
  public function getIsOuScopable()
  {
    return $this->isOuScopable;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPrivilegeName($privilegeName)
  {
    $this->privilegeName = $privilegeName;
  }
  /**
   * @return string
   */
  public function getPrivilegeName()
  {
    return $this->privilegeName;
  }
  /**
   * @param string
   */
  public function setServiceId($serviceId)
  {
    $this->serviceId = $serviceId;
  }
  /**
   * @return string
   */
  public function getServiceId()
  {
    return $this->serviceId;
  }
  /**
   * @param string
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Privilege::class, 'Google_Service_Directory_Privilege');
