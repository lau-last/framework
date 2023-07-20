<?php

namespace Core\Form;

class Label
{

    /**
     * @var string
     */
    private string $label;

    /**
     * @var array
     */
    private array $att;


    /**
     * @param string $label
     * @param array $att
     */
    public function __construct(string $label, array $att = [])
    {
        $this->label = $label;
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
        return sprintf('<label %s>%s</label>', implode(' ', $attribute), $this->label);
    }


    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }


}