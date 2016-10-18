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

  public function toHex(int $number): string {
    $result = "";

    while ($number > 0) {
      $current_digit = $number % 16;

      if ($current_digit == 10) {
        $current_digit = "A";
      } elseif ($current_digit == 11) {
        $current_digit = "B";
      } elseif ($current_digit == 12) {
        $current_digit = "C";
      } elseif ($current_digit == 13) {
        $current_digit = "D";
      } elseif ($current_digit == 14) {
        $current_digit = "E";
      } elseif ($current_digit == 15) {
        $current_digit = "F";
      }

      $result = $current_digit . $result;
      $number = intdiv($number, 16);
    }

    return $result;
  }

  public function binaryToDecimal(string $bin): int {
    $result = 0;
    $bin_as_array = array_reverse(str_split($bin));

    for ($i = 0; $i < count($bin_as_array); $i++) {
      $result += $bin_as_array[$i] * pow(2, $i);
    }

    return $result;
  }

  public function hexToDecimal(string $hex): int {
    $result = 0;
    $hex_as_array = array_reverse(str_split($hex));

    for ($i = 0; $i < count($hex_as_array); $i++) {

      $current_digit = $hex_as_array[$i];

      if ($current_digit == "A") {
        $current_digit = 10;
      } elseif ($current_digit == "B") {
        $current_digit = 11;
      } elseif ($current_digit == "C") {
        $current_digit = 12;
      } elseif ($current_digit == "D") {
        $current_digit = 13;
      } elseif ($current_digit == "E") {
        $current_digit = 14;
      } elseif ($current_digit == "F") {
        $current_digit = 15;
      }

      $result += $current_digit * pow(16, $i);
    }

    return $result;
  }
}

$converter = new Converter();
echo $converter->hexToDecimal('FFFF');
