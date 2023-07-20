<?php

namespace Core\Form;

class Textarea implements FieldsInterface
{

    /**
     * @var array
     */
    private array $att;

    /**
     * @var bool
     */
    private bool $required = false;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $text;


    /**
     * @param string $name
     * @param array $att
     * @param string $text
     */
    public function __construct(string $name, array $att = [], string $text = '')
    {
        $this->att = $att;
        $this->name = $name;
        $this->text = $text;
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
        return sprintf('<textarea name="%s" %s %s>%s</textarea>', $this->name, implode(' ', $attribute), $this->required ? 'required' : '', $this->text);
    }


    /**
     * @return $this
     */
    public function required(): self
    {
        $this->required = true;
        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}
