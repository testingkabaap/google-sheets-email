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

namespace Google\Service\CertificateAuthorityService;

class SubordinateConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $certificateAuthority;
  /**
   * @var SubordinateConfigChain
   */
  public $pemIssuerChain;
  protected $pemIssuerChainType = SubordinateConfigChain::class;
  protected $pemIssuerChainDataType = '';

  /**
   * @param string
   */
  public function setCertificateAuthority($certificateAuthority)
  {
    $this->certificateAuthority = $certificateAuthority;
  }
  /**
   * @return string
   */
  public function getCertificateAuthority()
  {
    return $this->certificateAuthority;
  }
  /**
   * @param SubordinateConfigChain
   */
  public function setPemIssuerChain(SubordinateConfigChain $pemIssuerChain)
  {
    $this->pemIssuerChain = $pemIssuerChain;
  }
  /**
   * @return SubordinateConfigChain
   */
  public function getPemIssuerChain()
  {
    return $this->pemIssuerChain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubordinateConfig::class, 'Google_Service_CertificateAuthorityService_SubordinateConfig');
