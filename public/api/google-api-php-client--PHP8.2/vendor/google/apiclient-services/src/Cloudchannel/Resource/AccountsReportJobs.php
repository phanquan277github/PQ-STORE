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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1FetchReportResultsRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1FetchReportResultsResponse;

/**
 * The "reportJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $reportJobs = $cloudchannelService->accounts_reportJobs;
 *  </code>
 */
class AccountsReportJobs extends \Google\Service\Resource
{
  /**
   * Retrieves data generated by CloudChannelReportsService.RunReportJob.
   * (reportJobs.fetchReportResults)
   *
   * @param string $reportJob Required. The report job created by
   * CloudChannelReportsService.RunReportJob. Report_job uses the format:
   * accounts/{account_id}/reportJobs/{report_job_id}
   * @param GoogleCloudChannelV1FetchReportResultsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1FetchReportResultsResponse
   */
  public function fetchReportResults($reportJob, GoogleCloudChannelV1FetchReportResultsRequest $postBody, $optParams = [])
  {
    $params = ['reportJob' => $reportJob, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fetchReportResults', [$params], GoogleCloudChannelV1FetchReportResultsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsReportJobs::class, 'Google_Service_Cloudchannel_Resource_AccountsReportJobs');
