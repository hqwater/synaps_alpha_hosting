
<?php
class db{
  private static $instance = NULL;
/**
* 컨스트럭터를 프라이빗 설정함으로
*아무나 객채를 생성할 수 없게 함
**/
/*TAG 사용 용 DB 연결 TEST */
private function __construct(){
/*나중에 DB 이름 설정 */
}
/*객체지향으로 DB연결 */
public static function getInstance(){
if (!self::$instance)
    {
    self::$instance = new PDO("mysql:host=localhost;dbname=synaps", 'synaps', 'neuron2014');;
    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
return self::$instance;
}
/**
*private 클론펑션을 지정해서 
*클론을 만들지 못하게 방지
**/
private function __clone(){
}
} /*** end of class ***/

?>