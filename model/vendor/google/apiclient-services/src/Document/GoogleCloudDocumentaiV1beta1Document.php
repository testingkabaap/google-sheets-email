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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1beta1Document extends \Google\Collection
{
  protected $collection_key = 'textStyles';
  /**
   * @var string
   */
  public $content;
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentEntity[]
   */
  public $entities;
  protected $entitiesType = GoogleCloudDocumentaiV1beta1DocumentEntity::class;
  protected $entitiesDataType = 'array';
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentEntityRelation[]
   */
  public $entityRelations;
  protected $entityRelationsType = GoogleCloudDocumentaiV1beta1DocumentEntityRelation::class;
  protected $entityRelationsDataType = 'array';
  /**
   * @var GoogleRpcStatus
   */
  public $error;
  protected $errorType = GoogleRpcStatus::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentPage[]
   */
  public $pages;
  protected $pagesType = GoogleCloudDocumentaiV1beta1DocumentPage::class;
  protected $pagesDataType = 'array';
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentRevision[]
   */
  public $revisions;
  protected $revisionsType = GoogleCloudDocumentaiV1beta1DocumentRevision::class;
  protected $revisionsDataType = 'array';
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentShardInfo
   */
  public $shardInfo;
  protected $shardInfoType = GoogleCloudDocumentaiV1beta1DocumentShardInfo::class;
  protected $shardInfoDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentTextChange[]
   */
  public $textChanges;
  protected $textChangesType = GoogleCloudDocumentaiV1beta1DocumentTextChange::class;
  protected $textChangesDataType = 'array';
  /**
   * @var GoogleCloudDocumentaiV1beta1DocumentStyle[]
   */
  public $textStyles;
  protected $textStylesType = GoogleCloudDocumentaiV1beta1DocumentStyle::class;
  protected $textStylesDataType = 'array';
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentEntityRelation[]
   */
  public function setEntityRelations($entityRelations)
  {
    $this->entityRelations = $entityRelations;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentEntityRelation[]
   */
  public function getEntityRelations()
  {
    return $this->entityRelations;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setError(GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPage[]
   */
  public function setPages($pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPage[]
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentRevision[]
   */
  public function setRevisions($revisions)
  {
    $this->revisions = $revisions;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentRevision[]
   */
  public function getRevisions()
  {
    return $this->revisions;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentShardInfo
   */
  public function setShardInfo(GoogleCloudDocumentaiV1beta1DocumentShardInfo $shardInfo)
  {
    $this->shardInfo = $shardInfo;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentShardInfo
   */
  public function getShardInfo()
  {
    return $this->shardInfo;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentTextChange[]
   */
  public function setTextChanges($textChanges)
  {
    $this->textChanges = $textChanges;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentTextChange[]
   */
  public function getTextChanges()
  {
    return $this->textChanges;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentStyle[]
   */
  public function setTextStyles($textStyles)
  {
    $this->textStyles = $textStyles;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentStyle[]
   */
  public function getTextStyles()
  {
    return $this->textStyles;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1Document::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1Document');
