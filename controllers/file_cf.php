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
                                  
                                  //Convert files(gz) to bin directly before put them in upload directory
                                  if (substr($subValue3, -3) !== '.gz'){
                                    $filenames = $subValue3;
                                    //check if the file exists
                                    if(!is_file(getcwd()."/".$dir2.$subValue3))
                                    { 
                                      $this->download_remote_file_with_curl($newurl3, $dir2.$filenames);
                                    }
                                  }else{
                                    $rest = substr($subValue3, 0, -3);
                                    $filenames = $rest;
                                    //check if the file exists
                                    if(!is_file(getcwd()."/".$dir2.$rest))
                                    { 
                                      $this->download_remote_file_with_curl($newurl3, $dir2.$filenames);
                                    }
                                  }

                                  //overwrite index.txt
                                  $txt = $filenames."\n";
                                  fwrite($myfile, $txt);
                                  echo '<pre>';
                                  print_r($filenames);
                                  echo '</pre>';
                              } 
                          }
                          
                      }
                  }
              }
          }
      }
  }
  function download_remote_file_with_curl($files_url, $save_to)
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
      fclose($downloaded_file);
      curl_close( $che );
 
  }
}