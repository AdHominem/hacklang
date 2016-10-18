<?hh

class Tracker
{

  public function __construct() {
    # code...
  }

  public function print(): void {
    echo "<p>request uri: " . $_SERVER['REQUEST_URI'] . "</p>";
    echo "<p>remote port: " . $_SERVER['REMOTE_PORT'] . "</p>";
    echo "<p>remote IP: " . $_SERVER['REMOTE_HOST'] . "</p>";
    echo "<p>remote addr: " . $_SERVER['REMOTE_ADDR'] . "</p>";
    echo "<p>user agent: " . $_SERVER['HTTP_USER_AGENT'] . "</p>";
    #echo "<p>referer: " . $_SERVER['HTTP_REFERER'] . "</p>";
    echo "<p>request method: " . $_SERVER['REQUEST_METHOD'] . "</p>";
  }
}

function get_ip_address(){

    $ip_sources = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED',
    'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED',
    'REMOTE_ADDR');

    foreach ($ip_sources as $key) {

        if (array_key_exists($key, $_SERVER)){

            foreach (explode(',', $_SERVER[$key]) as $ip){

                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}



$tracker = new Tracker();
$tracker->print();
echo "IP: " . get_ip_address();
