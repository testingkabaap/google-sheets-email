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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2IntentMessageMediaContentResponseMediaObject extends \Google\Model
{
  /**
   * @var string
   */
  public $contentUrl;
  /**
   * @var string
   */
  public $description;
  /**
   * @var GoogleCloudDialogflowV2IntentMessageImage
   */
  public $icon;
  protected $iconType = GoogleCloudDialogflowV2IntentMessageImage::class;
  protected $iconDataType = '';
  /**
   * @var GoogleCloudDialogflowV2IntentMessageImage
   */
  public $largeImage;
  protected $largeImageType = GoogleCloudDialogflowV2IntentMessageImage::class;
  protected $largeImageDataType = '';
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setContentUrl($contentUrl)
  {
    $this->contentUrl = $contentUrl;
  }
  /**
   * @return string
   */
  public function getContentUrl()
  {
    return $this->contentUrl;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setIcon(GoogleCloudDialogflowV2IntentMessageImage $icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setLargeImage(GoogleCloudDialogflowV2IntentMessageImage $largeImage)
  {
    $this->largeImage = $largeImage;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getLargeImage()
  {
    return $this->largeImage;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2IntentMessageMediaContentResponseMediaObject::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContentResponseMediaObject');
