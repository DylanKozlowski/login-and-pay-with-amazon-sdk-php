<?php
namespace PayWithAmazon;

require_once 'BaseClient.php';
require_once 'ReportsClientInterface.php';

class ReportsClient extends BaseClient implements ReportsClientInterface {
	protected function setModePath() {
		$this->modePath = 'Reports';
	}

	protected function setServiceVersion() {
		$this->serviceVersion = '2009-01-01';
	}

    /* GetReportList API call - Returns a list of reports that were created in the previous 90 days.
     * @see http://docs.developer.amazonservices.com/en_US/reports/Reports_GetReportList.html
     *
     * @param requestParameters['merchant_id'] - [String]
     * @optional requestParameters['mws_auth_token'] - [String]
     */

    public function getReportList($requestParameters = array())
    {
        $parameters['Action'] = 'GetReportList';
        $requestParameters    = array_change_key_case($requestParameters, CASE_LOWER);

        $fieldMappings = array(
            'merchant_id' 		=> 'SellerId',
            'mws_auth_token' 		=> 'MWSAuthToken'
        );

        $responseObject = $this->setParametersAndPost($parameters, $fieldMappings, $requestParameters);
        return ($responseObject);
    }

    /* GetReport API call - Returns the contents of a report and the Content-MD5 header for the returned report body.
     * @see http://docs.developer.amazonservices.com/en_US/reports/Reports_GetReport.html
     *
     * @param requestParameters['merchant_id'] - [String]
     * @param requestParameters['report_id'] - [String]
     * @optional requestParameters['mws_auth_token'] - [String]
     */

    public function getReport($requestParameters = array())
    {

        $parameters['Action'] = 'GetReport';
        $requestParameters    = array_change_key_case($requestParameters, CASE_LOWER);

        $fieldMappings = array(
            'merchant_id' 		=> 'SellerId',
            'report_id' => 'ReportId',
            'mws_auth_token' 		=> 'MWSAuthToken'
        );

        $responseObject = $this->setParametersAndPost($parameters, $fieldMappings, $requestParameters, false);
        return ($responseObject);
    }    
}
