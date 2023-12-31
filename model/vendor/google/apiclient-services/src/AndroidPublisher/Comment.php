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

namespace Google\Service\AndroidPublisher;

class Comment extends \Google\Model
{
  /**
   * @var DeveloperComment
   */
  public $developerComment;
  protected $developerCommentType = DeveloperComment::class;
  protected $developerCommentDataType = '';
  /**
   * @var UserComment
   */
  public $userComment;
  protected $userCommentType = UserComment::class;
  protected $userCommentDataType = '';

  /**
   * @param DeveloperComment
   */
  public function setDeveloperComment(DeveloperComment $developerComment)
  {
    $this->developerComment = $developerComment;
  }
  /**
   * @return DeveloperComment
   */
  public function getDeveloperComment()
  {
    return $this->developerComment;
  }
  /**
   * @param UserComment
   */
  public function setUserComment(UserComment $userComment)
  {
    $this->userComment = $userComment;
  }
  /**
   * @return UserComment
   */
  public function getUserComment()
  {
    return $this->userComment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Comment::class, 'Google_Service_AndroidPublisher_Comment');
