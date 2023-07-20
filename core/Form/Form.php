<?php

namespace Core\Form;

class Form
{

    /**
     * @var array
     */
    private array $att;

    /**
     * @var array
     */
    private array $field = [];

    /**
     * @var array
     */
    private array $label = [];

    /**
     * @var array
     */
    private array $button = [];


    /**
     * @param array $att
     */
    public function __construct(array $att = [])
    {
        $this->att = $att;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->start() . implode('', $this->label) . implode('', $this->field) . implode('', $this->button) . $this->end();
    }


    /**
     * @param FieldsInterface $field
     * @return $this
     */
    public function addField(FieldsInterface $field): self
    {
        $this->field[$field->getName()] = $field;
        return $this;
    }


    /**
     * @param Label $label
     * @return $this
     */
    public function addLabel(Label $label): self
    {
        $this->label[$label->getLabel()] = $label;
        return $this;
    }


    /**
     * @param Button $button
     * @return $this
     */
    public function addButton(Button $button): self
    {
        $this->button[$button->getName()] = $button;
        return $this;
    }


    /**
     * @param string $name
     * @return FieldsInterface
     */
    public function get(string $name): FieldsInterface
    {
        return $this->field[$name];
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
        return sprintf('<form %s>', implode(' ', $attribute));
    }


    /**
     * @return string
     */
    public function end(): string
    {
        return '</form>';
    }


}
