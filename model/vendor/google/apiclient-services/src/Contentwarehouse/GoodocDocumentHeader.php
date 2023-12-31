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

class GoodocDocumentHeader extends \Google\Collection
{
  protected $collection_key = 'font';
  protected $internal_gapi_mappings = [
        "ocrEngineId" => "OcrEngineId",
        "ocrEngineVersion" => "OcrEngineVersion",
  ];
  /**
   * @var string
   */
  public $ocrEngineId;
  /**
   * @var string
   */
  public $ocrEngineVersion;
  /**
   * @var GoodocDocumentHeaderFont[]
   */
  public $font;
  protected $fontType = GoodocDocumentHeaderFont::class;
  protected $fontDataType = 'array';

  /**
   * @param string
   */
  public function setOcrEngineId($ocrEngineId)
  {
    $this->ocrEngineId = $ocrEngineId;
  }
  /**
   * @return string
   */
  public function getOcrEngineId()
  {
    return $this->ocrEngineId;
  }
  /**
   * @param string
   */
  public function setOcrEngineVersion($ocrEngineVersion)
  {
    $this->ocrEngineVersion = $ocrEngineVersion;
  }
  /**
   * @return string
   */
  public function getOcrEngineVersion()
  {
    return $this->ocrEngineVersion;
  }
  /**
   * @param GoodocDocumentHeaderFont[]
   */
  public function setFont($font)
  {
    $this->font = $font;
  }
  /**
   * @return GoodocDocumentHeaderFont[]
   */
  public function getFont()
  {
    return $this->font;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocDocumentHeader::class, 'Google_Service_Contentwarehouse_GoodocDocumentHeader');
