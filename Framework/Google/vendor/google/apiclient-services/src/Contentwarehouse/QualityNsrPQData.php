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

class QualityNsrPQData extends \Google\Collection
{
  protected $collection_key = 'subchunkData';
  /**
   * @var int
   */
  public $chard;
  protected $chardScoreEncodedType = QualityNsrVersionedIntSignal::class;
  protected $chardScoreEncodedDataType = 'array';
  protected $contentEffortType = QualityNsrVersionedFloatSignal::class;
  protected $contentEffortDataType = 'array';
  /**
   * @var float
   */
  public $deltaAutopilotScore;
  /**
   * @var float
   */
  public $deltaLinkIncoming;
  /**
   * @var float
   */
  public $deltaLinkOutgoing;
  /**
   * @var float
   */
  public $deltaSubchunkAdjustment;
  protected $ketoType = QualityNsrVersionedFloatSignal::class;
  protected $ketoDataType = 'array';
  /**
   * @var float
   */
  public $linkIncoming;
  /**
   * @var float
   */
  public $linkOutgoing;
  /**
   * @var float
   */
  public $numOffdomainAnchors;
  /**
   * @var float
   */
  public $page2vecLq;
  protected $predictedDefaultNsrType = QualityNsrVersionedFloatSignal::class;
  protected $predictedDefaultNsrDataType = 'array';
  protected $rhubarbType = QualityNsrVersionedFloatSignal::class;
  protected $rhubarbDataType = 'array';
  protected $subchunkDataType = QualityNsrPQDataSubchunkData::class;
  protected $subchunkDataDataType = 'array';
  /**
   * @var float
   */
  public $tofu;
  /**
   * @var float
   */
  public $urlAutopilotScore;
  /**
   * @var float
   */
  public $vlq;

  /**
   * @param int
   */
  public function setChard($chard)
  {
    $this->chard = $chard;
  }
  /**
   * @return int
   */
  public function getChard()
  {
    return $this->chard;
  }
  /**
   * @param QualityNsrVersionedIntSignal[]
   */
  public function setChardScoreEncoded($chardScoreEncoded)
  {
    $this->chardScoreEncoded = $chardScoreEncoded;
  }
  /**
   * @return QualityNsrVersionedIntSignal[]
   */
  public function getChardScoreEncoded()
  {
    return $this->chardScoreEncoded;
  }
  /**
   * @param QualityNsrVersionedFloatSignal[]
   */
  public function setContentEffort($contentEffort)
  {
    $this->contentEffort = $contentEffort;
  }
  /**
   * @return QualityNsrVersionedFloatSignal[]
   */
  public function getContentEffort()
  {
    return $this->contentEffort;
  }
  /**
   * @param float
   */
  public function setDeltaAutopilotScore($deltaAutopilotScore)
  {
    $this->deltaAutopilotScore = $deltaAutopilotScore;
  }
  /**
   * @return float
   */
  public function getDeltaAutopilotScore()
  {
    return $this->deltaAutopilotScore;
  }
  /**
   * @param float
   */
  public function setDeltaLinkIncoming($deltaLinkIncoming)
  {
    $this->deltaLinkIncoming = $deltaLinkIncoming;
  }
  /**
   * @return float
   */
  public function getDeltaLinkIncoming()
  {
    return $this->deltaLinkIncoming;
  }
  /**
   * @param float
   */
  public function setDeltaLinkOutgoing($deltaLinkOutgoing)
  {
    $this->deltaLinkOutgoing = $deltaLinkOutgoing;
  }
  /**
   * @return float
   */
  public function getDeltaLinkOutgoing()
  {
    return $this->deltaLinkOutgoing;
  }
  /**
   * @param float
   */
  public function setDeltaSubchunkAdjustment($deltaSubchunkAdjustment)
  {
    $this->deltaSubchunkAdjustment = $deltaSubchunkAdjustment;
  }
  /**
   * @return float
   */
  public function getDeltaSubchunkAdjustment()
  {
    return $this->deltaSubchunkAdjustment;
  }
  /**
   * @param QualityNsrVersionedFloatSignal[]
   */
  public function setKeto($keto)
  {
    $this->keto = $keto;
  }
  /**
   * @return QualityNsrVersionedFloatSignal[]
   */
  public function getKeto()
  {
    return $this->keto;
  }
  /**
   * @param float
   */
  public function setLinkIncoming($linkIncoming)
  {
    $this->linkIncoming = $linkIncoming;
  }
  /**
   * @return float
   */
  public function getLinkIncoming()
  {
    return $this->linkIncoming;
  }
  /**
   * @param float
   */
  public function setLinkOutgoing($linkOutgoing)
  {
    $this->linkOutgoing = $linkOutgoing;
  }
  /**
   * @return float
   */
  public function getLinkOutgoing()
  {
    return $this->linkOutgoing;
  }
  /**
   * @param float
   */
  public function setNumOffdomainAnchors($numOffdomainAnchors)
  {
    $this->numOffdomainAnchors = $numOffdomainAnchors;
  }
  /**
   * @return float
   */
  public function getNumOffdomainAnchors()
  {
    return $this->numOffdomainAnchors;
  }
  /**
   * @param float
   */
  public function setPage2vecLq($page2vecLq)
  {
    $this->page2vecLq = $page2vecLq;
  }
  /**
   * @return float
   */
  public function getPage2vecLq()
  {
    return $this->page2vecLq;
  }
  /**
   * @param QualityNsrVersionedFloatSignal[]
   */
  public function setPredictedDefaultNsr($predictedDefaultNsr)
  {
    $this->predictedDefaultNsr = $predictedDefaultNsr;
  }
  /**
   * @return QualityNsrVersionedFloatSignal[]
   */
  public function getPredictedDefaultNsr()
  {
    return $this->predictedDefaultNsr;
  }
  /**
   * @param QualityNsrVersionedFloatSignal[]
   */
  public function setRhubarb($rhubarb)
  {
    $this->rhubarb = $rhubarb;
  }
  /**
   * @return QualityNsrVersionedFloatSignal[]
   */
  public function getRhubarb()
  {
    return $this->rhubarb;
  }
  /**
   * @param QualityNsrPQDataSubchunkData[]
   */
  public function setSubchunkData($subchunkData)
  {
    $this->subchunkData = $subchunkData;
  }
  /**
   * @return QualityNsrPQDataSubchunkData[]
   */
  public function getSubchunkData()
  {
    return $this->subchunkData;
  }
  /**
   * @param float
   */
  public function setTofu($tofu)
  {
    $this->tofu = $tofu;
  }
  /**
   * @return float
   */
  public function getTofu()
  {
    return $this->tofu;
  }
  /**
   * @param float
   */
  public function setUrlAutopilotScore($urlAutopilotScore)
  {
    $this->urlAutopilotScore = $urlAutopilotScore;
  }
  /**
   * @return float
   */
  public function getUrlAutopilotScore()
  {
    return $this->urlAutopilotScore;
  }
  /**
   * @param float
   */
  public function setVlq($vlq)
  {
    $this->vlq = $vlq;
  }
  /**
   * @return float
   */
  public function getVlq()
  {
    return $this->vlq;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNsrPQData::class, 'Google_Service_Contentwarehouse_QualityNsrPQData');
