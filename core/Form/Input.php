<?php

namespace Core\Form;

class Input implements FieldsInterface
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
    private string $type;

    /**
     * @var string
     */
    private string $name;



    /**
     * @param string $name
     * @param string $type
     * @param array $att
     */
    public function __construct(string $name, string $type = 'text', array $att = [])
    {
        $this->att = $att;
        $this->type = $type;
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
        return sprintf('<input type="%s" name="%s" %s %s>', $this->type, $this->name, implode(' ', $attribute), $this->required ? 'required' : '');
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
