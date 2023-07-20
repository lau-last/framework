<?php

namespace Core\Form;

class Button
{

    /**
     * @var string
     */
    private string $text;

    /**
     * @var array
     */
    private array $att;

    /**
     * @var string
     */
    private string $name;


    /**
     * @param string $text
     * @param string $name
     * @param array $att
     */
    public function __construct(string $text, array $att = [], string $name = 'button')
    {
        $this->text = $text;
        $this->att = $att;
        $this->name = $name;
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
        return sprintf('<button name="%s" %s>%s</button>', $this->name, implode(' ', $attribute), $this->text);
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}