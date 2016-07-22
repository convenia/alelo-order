<?php

namespace Convenia\AleloOrder\Fields;

use Convenia\AleloOrder\Interfaces\FieldInterface;
use Stringy\Stringy as S;

/**
 * Class Field.
 */
abstract class Field implements FieldInterface
{
    /**
     * @var \Stringy\Stringy
     */
    protected $value;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var int
     */
    protected $length;

    /**
     * Field constructor.
     *
     * @param $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @param $value
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = S::create($value);

        return $this;
    }

    /**
     * Return the formatted value.
     *
     * @return string
     */
    public function getValue()
    {
        return (string) $this->format();
    }

    /**
     * @param int $length
     *
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
