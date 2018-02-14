<?php 
  class Settings
  {

      //    ____  _______     __
      //   |  _ \| ____\ \   / /
      //   | | | |  _|  \ \ / /
      //   | |_| | |___  \ V /
      //   |____/|_____|  \_/
      //
      
      const SEAWARE_API_ROOT_PATH = "http://13.228.122.182:8081/ota/";
      const SEAWARE_CLIENT_ID = "ota";
      const SEAWARE_CLIENT_SECRET = "ota";
      const SEAWARE_GRANT_TYPE = "password";
      const SEAWARE_SCOPE = "travelagent";
      const SEAWARE_USER_NAME = "USDVIPP";
      const SEAWARE_PASSWORD = "xzXf0M";

      const DRS_API_ROOT_PATH = "http://52.77.149.78/DRSAPI_DEV/Service.asmx/";
      const DRS_ID = "MANIC";
      const DRS_PWD = "MANIC";
      const DRS_WORKGROUP = "MEML";
      const DRS_COMP_ISSUE_LOCATION = "";                             // pending
      const DRS_PROFIT_CENTER = " 7SHW";
      const DRS_PROFIT_CENTER_PT = "MCAB";
      const DRS_PROFIT_CENTER_CC = "7SHW";



      // not used anymore
      // const SEAWARE_MEMBER_RATES_API_ROOT_PATH = "https://m.gentingtravel.starcruises.com/CruiseServices_REDSO_UATV2/CloudInfo.svc/CruiseAPI/";
      // const CRUISE_CREDENTIAL_AppAccount = "REDSO01";
      // const CRUISE_CREDENTIAL_AppId = "REDSOAPP";
      // const CRUISE_CREDENTIAL_AppPassword = "R3D$0@PP!";
      // const DRS_SMS_API_ROOT_PATH = "http://10.236.9.156/smsapi_membership/SMSService.asmx/";
      // const MAX_WORKERS_CRUISE = 8;
      

      // set to true on prod
      const IS_PRODUCTION = FALSE;

      // for development of JS
      const IS_DEBUG = TRUE;
      

  }
?>

