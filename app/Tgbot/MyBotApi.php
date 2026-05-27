<?php
namespace App\Tgbot;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Exception\ClientException;

class MyBotApi
{
  const API_BOT_URL = 'https://api.telegram.org/bot';
  const API_FILE_URL = 'https://api.telegram.org/file/bot';
  public $token;

  public function __construct($token)
  {
    $this->token = $token;
  }
  
  public function getUpdates($query_data = [])
  {
    $request_uri = '/getUpdates';        
    $res = $this->sendRequest($request_uri, $query_data);
    return $res;
  }
  public function getMe()
  {    
    $request_uri = '/getMe';    
    $res = $this->sendRequest($request_uri);   
    return $res;
  }
  public function getBotName()// аналог getMyName
  {
    return $this->getMe()['result']['first_name'];
  }
  public function getBotId()
  {
    return $this->getMe()['result']['id'];
  }
  public function getBotLink(bool $external = false)
  {
    $res = $this->getMe()['result']['username'];
    if ($external) {
      return "https://t.me/$res";
    } else {
      return "@$res";
    }   
  }
  public function getMyName()
  {
    $request_uri = '/getMyName';
    $res = $this->sendRequest($request_uri);
    return $res;
  }
  public function getFile($file_id)
  {
    $request_uri = '/getFile';    
    $query_data = [
    'file_id' => $file_id,
    ];    
    $res = $this->sendRequest($request_uri, $query_data);
    return $res;
  }
  public function getMyDescription()
  {
    $request_uri = '/getMyDescription';
    $res = $this->sendRequest($request_uri);
    return $res;
  }
  public function setMyDescription($query_data)
  {
    $request_uri = '/setMyDescription';
    $content_type = 'application/json';        
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function getMyShortDescription()
  {
    $request_uri = '/getMyShortDescription';
    $res = $this->sendRequest($request_uri);
    return $res;
  }
  public function setMyShortDescription($query_data)
  {
    $request_uri = '/setMyShortDescription'; 
    $content_type = 'application/json';       
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function getWebhookInfo() {
    $request_uri = '/getWebhookInfo';
    $res = $this->sendRequest($request_uri);
    return $res;
  }   
  public function setMyCommands(array $my_commands)
  {    
    $request_uri = '/setMyCommands';    
    $query_data = [
    'commands' => json_encode($my_commands),
    ];
    $content_type = 'application/json';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function getMyCommands()
  {        
    $request_uri = '/getMyCommands';           
    $res = $this->sendRequest($request_uri);   
    return $res;
  }
  public function deleteMyCommands()
  {    
    $request_uri = '/deleteMyCommands';        
    $res = $this->sendRequest($request_uri);
    return $res;
  }
  public function getChat($chat_id)
  { 
    $query_data = ['chat_id' => $chat_id];     
    $request_uri = "/getChat";    
    $res = $this->sendRequest($request_uri, $query_data);
    return $res;
  }
  public function getUserName($chat_id)
  { 
    $resp = $this->getChat($chat_id)['result'];     
    $first_name = $resp['first_name'];
    $user_name = $resp['username'];
    return $first_name ?? $user_name;    
  }  
  public function getUserLink($chat_id, bool $external = false)
  { 
    $resp = $this->getChat($chat_id)['result'];           
    if (array_key_exists('username', $resp)) {
      $res = $resp['username'];
      if ($external) {
        return "https://t.me/$res";
      } else {
        return "@$res";
      }      
    } else {
       return '';
      }    
  }
  // Только для групп
  public function exportChatInviteLink($chat_id)
  {
    $query_data = ['chat_id' => $chat_id];      
    $request_uri = "/exportChatInviteLink";
    $res = $this->sendRequest($request_uri, $query_data);
    return $res;
  }

  // Только для групп
  public function getChatMember($chat_id, $user_id)
  { 
    $query_data = [
      'chat_id' => $chat_id,
      'user_id' => $user_id
    ];      
    $request_uri = "/getChatMember";
    $content_type = 'application/json';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function getChatMemberIsset($chat_id, $user_id)
  {
    return $this->getChatMember($chat_id, $user_id)['ok'];    
  }
  // Только для групп
  public function approveChatJoinRequest($chat_id, $user_id)
  {
    $query_data = [
      'chat_id' => $chat_id,
      'user_id' => $user_id,     
    ];      
    $request_uri = "/approveChatJoinRequest";
    $content_type = 'application/json';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
  }
  public function sendMessage($query_data)
  {        
    $request_uri = "/sendMessage";
    $content_type = 'application/json';           
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function forwardMessage($query_data)
  {     
    $request_uri = "/forwardMessage";
    $content_type = 'application/json';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  private function deleteMessage($query_data)
  {    
    $request_uri = "/deleteMessage";
    $content_type = 'application/json'; 
    $res = $this->sendRequest($request_uri, $query_data, $content_type);                   
    return $res;
  }
  public function delAnyMessage($chat_id, $message_id)
  {
    $query_data = [
      'chat_id' => $chat_id,
      'message_id' => $message_id
    ];
    return $this->deleteMessage($query_data);
  }
  protected function sendPhoto($query_data)
  {    
    $request_uri = "/sendPhoto";
    $content_type = 'multipart/form-data';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  protected function sendVideo($query_data)
  {    
    $request_uri = "/sendVideo"; 
    $content_type = 'multipart/form-data';   
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  protected function sendAnimation($query_data)
  {    
    $request_uri = "/sendAnimation";
    $content_type = 'multipart/form-data';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function sendDocument($query_data)
  {    
    $request_uri = "/sendDocument"; 
    $content_type = 'multipart/form-data';   
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  } 
  public function sendVoice($query_data)
  {   
    $request_uri = "/sendVoice";
    $content_type = 'multipart/form-data';    
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  public function answerWebAppQuery($query_data)
  {
    $request_uri = "/answerWebAppQuery";
    $content_type = 'application/json';
    $res = $this->sendRequest($request_uri, $query_data, $content_type);
    return $res;
  }
  
  private function sendRequest($request_uri, $query_data = [], $content_type = '') {         
    $url_basic = self::API_BOT_URL . $this->token; 
    $request_url = $url_basic . $request_uri;    
    switch (true) {
      case $content_type == 'multipart/form-data':
        $multipart = [];
        foreach ($query_data as $key => &$value) {
          $multipart_item = ['name' => $key, 'contents' => $value];
          array_push($multipart, $multipart_item);
        }
        unset($item);
        $method = 'POST';
        $options = ['multipart' => $multipart];
        break;
      case $content_type == 'application/json':
        $method = 'POST';
        $options = ['json' => $query_data];
        break;     
      default:
        $method = 'GET';
        $options = ['query' => $query_data];
        break;
    }                
    $client = new Client();         
    $response = $client->request($method, $request_url, $options);            
    $body = $response->getBody();     
    $result = json_decode($body, true);      
    return $result;      
  }    
}


  




 