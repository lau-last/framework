<?php

namespace Core\Form;

class Select implements FieldsInterface
{

    /**
     * @var array
     */
    private array $att;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @var bool
     */
    private bool $required = false;

    /**
     * @var string
     */
    private string $name;


    /**
     * @param string $name
     * @param array $att
     */
    public function __construct(string $name, array $att = [])
    {
        $this->att = $att;
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->start() . implode('', $this->options) . $this->end();
    }


    /**
     * @param Option $option
     * @return $this
     */
    public function addOption(Option $option): self
    {
        $this->options[] = $option;
        return $this;
    }


    /**
     * @return string
     */
    public function start(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<select name="%s" %s %s>', $this->name, implode(' ', $attribute), $this->required ? 'required' : '');
    }


    /**
     * @return string
     */
    public function end(): string
    {
        return '</select>';
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
