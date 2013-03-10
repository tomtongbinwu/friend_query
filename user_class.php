<?php
  
class user_class
{
    private $uid;
    private $token;
    private $url = "https://graph.facebook.com/";
    
    function set_uid($facebook_id)
    {
        $this->uid = $facebook_id;
    }
    
    function set_access_token($access_token)
    {
        $this->token = $access_token;
    }
    
    function get_user_name()
    {
        $web_url = $this->url . $this->uid . "?fields=name&access_token=" . $this->token;
        $url_content = file_get_contents($web_url);
        $json_array = json_decode($url_content, true);
        return $json_array['name'];
    }
    
    function get_friend_list()
    {
        $web_url = $this->url . $this->uid . "?fields=friends&access_token=" . $this->token;
        $url_content = file_get_contents($web_url);
        $json_array = json_decode($url_content, true);
        echo $json_array['friends']['data'][0]['id'];
        var_dump($json_array);
    }

}

$Tom = new user_class();
$Tom->set_access_token("AAACEdEose0cBAJmpdmB2QZCgdCCNpaQWXK8Y7YkXQvvOt0brMwkq0YWu03Iif5pIvcYoUxTcQU0aW20xMKfxww33kc84vlQMAZBALamjMrYbXZAqTaz");
$Tom->set_uid("1158216884");
echo $Tom->get_user_name();
$Tom->get_friend_list();


?>
