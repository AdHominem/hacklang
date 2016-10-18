<?hh

class Converter
{
  public function toBinary(int $number): string {
    $result = "";

    while ($number > 0) {
      $result = $number % 2 . $result;
      $number = intdiv($number, 2);
    }
    
    return $result;
  }
}

$converter = new Converter();
echo $converter->toBinary(5);
