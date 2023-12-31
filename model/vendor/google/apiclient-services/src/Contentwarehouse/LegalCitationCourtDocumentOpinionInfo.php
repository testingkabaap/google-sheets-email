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

namespace Google\Service\Contentwarehouse;

class LegalCitationCourtDocumentOpinionInfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "bench" => "Bench",
        "deliveredBy" => "DeliveredBy",
        "joinedBy" => "JoinedBy",
        "type" => "Type",
  ];
  /**
   * @var int
   */
  public $bench;
  /**
   * @var LegalPerson
   */
  public $deliveredBy;
  protected $deliveredByType = LegalPerson::class;
  protected $deliveredByDataType = '';
  /**
   * @var LegalPerson
   */
  public $joinedBy;
  protected $joinedByType = LegalPerson::class;
  protected $joinedByDataType = '';
  /**
   * @var int
   */
  public $type;

  /**
   * @param int
   */
  public function setBench($bench)
  {
    $this->bench = $bench;
  }
  /**
   * @return int
   */
  public function getBench()
  {
    return $this->bench;
  }
  /**
   * @param LegalPerson
   */
  public function setDeliveredBy(LegalPerson $deliveredBy)
  {
    $this->deliveredBy = $deliveredBy;
  }
  /**
   * @return LegalPerson
   */
  public function getDeliveredBy()
  {
    return $this->deliveredBy;
  }
  /**
   * @param LegalPerson
   */
  public function setJoinedBy(LegalPerson $joinedBy)
  {
    $this->joinedBy = $joinedBy;
  }
  /**
   * @return LegalPerson
   */
  public function getJoinedBy()
  {
    return $this->joinedBy;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationCourtDocumentOpinionInfo::class, 'Google_Service_Contentwarehouse_LegalCitationCourtDocumentOpinionInfo');
