<?php
class TextInput
{
 protected $value = '';

  public function add($text)
  {
       $this->value .= $text;
   }
   
  public function getValue()
  {
      return $this->value;
  }
}

class NumericInput extends TextInput
{
    public function add($text)
    {       // Jeżeli ciąg jest ciągiem innym niż cyfr, nie zostanie wypisany (pojawienie się litery wykreśla ponady ciąg)
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}

$textInput = new TextInput();
$textInput->add('Zadanie');
$textInput->add('Rekrutacyjne');
echo $textInput->getValue(); // Wyświetli: "Zadanie Rekrutacyjne"

$numericInput = new NumericInput();
$numericInput->add('111');
$numericInput->add('aaa');
$numericInput->add('333');
echo $numericInput->getValue(); // Wyświetli: "111333", "aaa" zostanie pominięty ze względu na brak ciągu cyfr
?>
