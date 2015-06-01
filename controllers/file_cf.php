<?php

class File_cf extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'AdServer Daten';
      $this->connect();
      //clearstatcache();
      $this->_view->render('header', $data);
      $this->_view->render('warn', $data);
      $this->_view->render('footer');
   }

   public function get_web_page( $url )
   {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
        $username = ADS_USER;
        $password = ADS_PASS;  
        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
         		CURLOPT_HTTPAUTH	   => CURLAUTH_ANY,
  			    CURLOPT_USERPWD		   => "$username:$password",
		);

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
	}
  public function connect()
  {
      //Read a web page and check for errors:
      $url = "http://sgsdata.adtech.de/59.1/0/cf/";
       
      $result = $this->get_web_page( $url );

      if ( $result['errno'] != 0 )
          Message::set("error: bad url | timeout | redirect loop ...");

      if ( $result['http_code'] != 200 )
          Message::set("error: no page | no permissions | no service ");

      $page = $result['content'];

      if($result==TRUE){  
          //explode
          $str = $page;
          $preg=preg_match_all('#<li><a.*?>(.*?)<\/a></li>#', $str, $parts);
          if($preg==TRUE){
              
              //get the highest available array key          
              $maxIndex = array_search(max($parts[0]), $parts[0]);
              //rename value from $maxIndex. Before : "(1 space)value"
              $subValue = substr($parts[1][$maxIndex], 1);
              $newurl="http://sgsdata.adtech.de/59.1/0/cf/".$subValue."";
              //print_r($newurl);

              $result2 = $this->get_web_page( $newurl );

              if ( $result2['errno'] != 0 )
                  Message::set("error: bad url | timeout | redirect loop ...");

              if ( $result2['http_code'] != 200 )
                  Message::set("error: no page | no permissions | no service ");

              $page2 = $result2['content'];

              if($result2==TRUE){
                  $str2 = $page2;
                  $preg2=preg_match_all('#<li><a.*?>(.*?)<\/a></li>#', $str2, $parts2);
                  if($preg2==TRUE){
                      
                      //get the highest available array key          
                      $maxIndex2 = array_search(max($parts2[0]), $parts2[0]);
                      //rename value from $maxIndex. Before : "(1 space)value"
                      $subValue2 = substr($parts2[1][$maxIndex2], 1);
                      $newurl2="http://sgsdata.adtech.de/59.1/0/cf/".$subValue.$subValue2."";
                      //print_r($newurl2);
                      $result3 = $this->get_web_page( $newurl2 );

                      if ( $result3['errno'] != 0 )
                          Message::set("error: bad url | timeout | redirect loop ...");

                      if ( $result3['http_code'] != 200 )
                          Message::set("error: no page | no permissions | no service ");

                      $page3 = $result3['content'];
                      if($result3==TRUE){
                          //create folder 
                          if(!is_dir($dir .= "uploads/".$subValue)){ 
                            mkdir($dir, 0777, true);
                            chmod($dir, 0777);
                          }
                          if(!is_dir($dir2 .= 'uploads/'.$subValue.$subValue2)){  
                              mkdir($dir2, 0777, true);
                              chmod($dir2, 0777);
                          }
                          //create index file
                          $myfile = fopen($dir2."index.txt", "w") or die("Unable to open file!");

                          $str3 = $page3;
                          $preg3=preg_match_all('#<li><a.*?>(.*?)<\/a></li>#', $str3, $parts3);
                          if($preg3==TRUE){
                              //count summe of all files with array key
                              $countArray = count($parts3[1]);
                              for ($i = 1; $i < $countArray; $i++) {
                                  //rename file. Before : "(1 space)filename"
                                  $subValue3 = substr($parts3[1][$i], 1);
                                  //upload files to storage
                                  //url to files
                                  $newurl3="http://sgsdata.adtech.de/59.1/0/cf/".$subValue.$subValue2.$subValue3."";
                                  $subName = substr($subValue3,0,-3);
                                  //check if files already exist
                                  if(!is_file(getcwd()."/".$dir2.$subName)){
                                    //check if files had been already parsed
                                    if(!is_file(getcwd()."/".$dir2.$subName.".done")){
                                      //download remote files
                                      $this->download_remote_file_with_curl($newurl3, getcwd()."/".$dir2.$subValue3);
                                      //check if uploaded file extention is gz
                                      if (substr(getcwd()."/".$dir2.$subValue3, -3) !== '.gz') {
                                            //rename
                                            $filenames = $subValue3;
                                      }else{
                                            //Convert files(gz) to bin directly after put them in uploads directory
                                            $this->convert(getcwd()."/".$dir2.$subValue3);
                                            //rename
                                            $filenames = substr($subValue3, 0, -3);
                                            //delete gz file
                                            unlink(getcwd()."/".$dir2.$subValue3);
                                      }
                                  }else{
                                    $filenames = substr($subValue3, 0, -3);
                                  } 
                                  //overwrite index.txt
                                  $txt = $filenames."\n";
                                  fwrite($myfile, $txt);
                                  echo '<pre>';
                                  print_r($filenames);
                                  echo '</pre>';
                                }
                              }
                              //Parse files into Database
                              $this->parse($dir2);
                          }
                      }
                  }
              }
          }
      }
  }

  public function convert($file_in)
  {
    //This input should be from somewhere else, hard-coded in this example
    $file_name = $file_in;
    // Raising this value may increase performance
    $buffer_size = 4096; // read 4kb at a time
    $out_file_name = str_replace('.gz', '', $file_name); 
    // Open our files (in binary mode)
    $file = gzopen($file_name, 'rb');
    $out_file = fopen($out_file_name, 'wb'); 
    // Keep repeating until the end of the input file
    while(!gzeof($file)) {
      // Read buffer-size bytes
      // Both fwrite and gzread and binary-safe
      fwrite($out_file, gzread($file, $buffer_size));
    } 
    // Files are done, close files
    fclose($out_file);
    gzclose($file);
    echo $out_file;
  }

  public function download_remote_file_with_curl($files_url, $save_to)
  {
      $username = ADS_USER;
      $password = ADS_PASS;
      $che = curl_init();
      curl_setopt($che, CURLOPT_POST, 0); 
      curl_setopt($che, CURLOPT_URL,$files_url); 
      curl_setopt($che, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($che, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
      curl_setopt($che, CURLOPT_USERPWD, "$username:$password");

      $content = curl_exec($che);
                              
      $download = fopen($save_to, 'w');
      fwrite($download, $content);
      fclose($download);
      curl_close( $che );
  }

  public function parse($dir2) {
      //echo $dir2.$filenames;
      ini_set('max_execution_time', 68000); 
      @set_time_limit(68000);

      $debugTimeStart = microtime(true); 

      $dataTypesSize = array(
            'tinyint'=> array('code'=>'C', 'size'=>''),
            'smallint'=> array( 'code'=>'n', 'size'=>''),
            'int'=> array('code'=>'N', 'size'=>''),
            'unsignedint'=> array('code'=>'N', 'size'=>''),
            'char(16)'=> array('code'=>'a16', 'size'=>''),
            'char(32)'=> array('code'=>'a32', 'size'=>''),
            'char(50)'=> array('code'=>'a50', 'size'=>''),
            'char(150)'=> array('code'=>'a150', 'size'=>''),
            'char(200)'=> array('code'=>'a200', 'size'=>''),
            'char(1000)'=> array('code'=>'a1000', 'size'=>''),
            'varchar(1024)'=> array('code'=>'a1023', 'size'=>''),
            'varchar(924)'=> array('code'=>'a923', 'size'=>''),
            'varchar(101)'=> array('code'=>'a100', 'size'=>''),
            'varchar(100)'=> array('code'=>'a99', 'size'=>''),
            'varchar(297)'=> array('code'=>'a296', 'size'=>'') 
      ); 
      $codeCF = array(
            array('name'=>'VersionId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>'0'),
            array('name'=>'SequenceId', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),       
            array('name'=>'PlcNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlcSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'WebsiteId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'PlacementId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //5
            array('name'=>'PageId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CmgnNetworkId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CmgnSubNetworkId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'MasterCampaignId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 10
            array('name'=>'BannerId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BannerNumber', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),       
            array('name'=>'PaymentId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'StateId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CountTypeId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //15
            array('name'=>'IpAddress', 'type'=>'unsignedint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'UserId', 'type'=>'char(16)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'OsId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BrowserId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'BrowserLanguage', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 20
            array('name'=>'TagType', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'IpRangeId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'DateEntered', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Hour', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'Minute', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), //25
            array('name'=>'Second', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'AdServerIp', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'AdServerFarmId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'DMAId', 'type'=>'tinyint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CountryId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 30
            array('name'=>'ZipCodeId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CityId', 'type'=>'int', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'IspId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'CountTypeId', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
            array('name'=>'RecordSize', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''), // 35
            array('name'=>'sizeStringBuffer', 'type'=>'smallint', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
        //    array('name'=>'Referer', 'type'=>'varchar(297)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
        //    array('name'=>'QueryString', 'type'=>'varchar(297)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
        //    array('name'=>'LinkUrl', 'type'=>'varchar(297)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),
        //    array('name'=>'UserAgent', 'type'=>'varchar(297)', 'size'=>'', 'code'=>'', 'accumulatedPointer'=>''),// 40    
            
      );

      $code = $codeCF;
      //$code = $codeBPC;
      
      /*
        sizes of datatypes  
      */  
      foreach($dataTypesSize AS $k=>$v) {
        $dataTypesSize[$k]['size'] = strlen(pack($dataTypesSize[$k]['code'], ''));  
        
      };
      $rowPointer = 0;
      foreach($code AS $k=>$v) {
        $code[$k]['size'] = $dataTypesSize[$code[$k]['type']]['size'];
        $code[$k]['code'] = $dataTypesSize[$code[$k]['type']]['code'];  
        $code[$k]['accumulatedPointer'] = $rowPointer;
        $rowPointer += $code[$k]['size'];     
      };      

      /*
        size/length row
      */
      $rowLength = count($code);
      $rowSize = 0;
      foreach($code AS $k=>$v) {
        $rowSize += $code[$k]['size'];
      };
      
      /*
        errorcode
      */
      $errorcode = array('-2', '-3', '-4', '-6', '-7', '-10', '-23', '-26', '-98');

    $handlefolder = opendir (getcwd()."/".$dir2);
    while ($file = readdir ($handlefolder)) {
      if (substr($file, -4) == '.bin') {
        $handle = fopen(getcwd()."/".$dir2.$file, 'rb');
        while ($contents = fread($handle, $rowSize)) {
            $tmpObject = array();
            for ($i=0; $i<$rowLength; $i++) {
                           
            $data = unpack($code[$i]['code'], substr($contents, $code[$i]['accumulatedPointer'], $code[$i]['size']));      
            $data = $data[1];
                            
            if ($code[$i]['name'] == 'IpAddress') {
              $data = (255 & ($data >> 24)).'.'.(255 & ($data >> 16)).'.'.(255 & $data>>8).'.'.(255 & $data);       
            } elseif ($code[$i]['name'] == 'UserId') {
              $user = '';
              for ($ii=0; $ii<strlen($data); $ii++) {
                 $userTmp = ord($data[$ii]);
                 $user = $user.dechex ((15 & ($userTmp >> 4))).dechex (15 & $userTmp);
              };
              $data = $user;    
                              
             } elseif ($data < 0) {        // AND $code[$i]['type'] == 'unsignedint'
                if (!in_array($data, $errorcode))
                  $data = substr(bcsub($data*-1, 4294967296), 1);     
             };
             $tmpObject[$i] = $data;    
             if ($i == 36) {
                    $contents = fread($handle, $tmpObject[36]);
                    $data = unpack('a'.$tmpObject[36], $contents);            
                    $data = explode("\0", $data[1]);
                    $tmpObject[37] = $data[0];      
                    $tmpObject[38] = $data[1];      
                    $tmpObject[39] = $data[2];      
                    $tmpObject[40] = $data[3];                   
              };
            }; //end of for ($i=0; $i<$rowLength; $i++) {
            $datas['VersionId'] = $tmpObject[0];
            $datas['SequenceId'] = $tmpObject[1];
            $datas['PlcNetworkId'] = $tmpObject[2];
            $datas['PlcSubNetworkId'] = $tmpObject[3];
            $datas['WebsiteId'] =$tmpObject[4];
            $datas['PlacementId'] =$tmpObject[5];
            $datas['PageId'] =$tmpObject[6];
            $datas['CmgnNetworkId'] =$tmpObject[7];
            $datas['CmgnSubNetworkId'] =$tmpObject[8];
            $datas['CampaignId'] =$tmpObject[9];
            $datas['MasterCampaignId'] =$tmpObject[10];
            $datas['BannerId'] =$tmpObject[11];
            $datas['BannerNumber'] =$tmpObject[12];
            $datas['PaymentId'] =$tmpObject[13];
            $datas['StateId'] =$tmpObject[14];
            $datas['CountTypeId'] =$tmpObject[15];
            $datas['IpAddress'] =$tmpObject[16];
            $datas['UserId'] =$tmpObject[17];
            $datas['OsId'] =$tmpObject[18];
            $datas['BrowserId'] =$tmpObject[19];
            $datas['BrowserLanguage'] =$tmpObject[20];
            $datas['TagType'] =$tmpObject[21];
            $datas['IpRangeId'] =$tmpObject[22];
            $datas['DateEntered'] =$tmpObject[23];
            $datas['Hour'] =$tmpObject[24];
            $datas['Minute'] =$tmpObject[25];
            $datas['Second'] =$tmpObject[26];
            $datas['AdServerIp'] =$tmpObject[27];
            $datas['AdServerFarmId'] =$tmpObject[28];
            $datas['DMAId'] =$tmpObject[29];
            $datas['CountryId'] =$tmpObject[30];
            $datas['ZipCodeId'] =$tmpObject[31];
            $datas['CityId'] =$tmpObject[32];
            $datas['IspId'] =$tmpObject[33];
            $datas['ConnectionTypeId'] =$tmpObject[34];
            $datas['RecordSize'] =$tmpObject[35];
            $datas['sizeStringBuffer'] =$tmpObject[36];
            $datas['Referer'] =$tmpObject[37];
            $datas['QueryString'] =$tmpObject[38];
            $datas['LinkUrl'] =$tmpObject[39];
            $datas['UserAgent'] =$tmpObject[40];
            $datas['in_bin'] = $file;
            //insert to database
            $this->_model->_insert($datas);
        }; //end of while ($contents = fread($handle, $rowSize))
         
         //rename bin folder in path uploads/ 
         @fclose($handle);
         @chmod(getcwd()."/".$dir2.$file, 0666);
         @rename(getcwd()."/".$dir2.$file, getcwd()."/".$dir2.$file.'.done');
      }; //end of if (substr($file, -4) == '.bin') {
      $debugTimeEnd = microtime(true); 
    } //end of while ($file = readdir ($handlefolder))
  }  //end of function
}