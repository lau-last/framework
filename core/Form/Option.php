<?php

namespace Core\Form;

class Option
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @var string
     */
    private string $text;

    /**
     * @var array
     */
    private array $att;


    /**
     * @param string $value
     * @param string $text
     * @param array $att
     */
    public function __construct(string $value, string $text, array $att = [])
    {
        $this->value = $value;
        $this->text = $text;
        $this->att = $att;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<option value="%s" %s>%s</option>', $this->value, implode(' ', $attribute), $this->text);
    }


    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}