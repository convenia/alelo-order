<?php

namespace Convenia\AleloOrder\Fields\Formats;

use Convenia\AleloOrder\Fields\Field;

/**
 * Class FieldN.
 */
class FieldN extends Field
{
    /**
     * Return the formatted field.
     *
     * @return string
     */
    public function format()
    {
        $this->value = $this->value->trim();
        $actualLength = $this->value->length();

        $this->value = $this->value->replace(',', '');
        $this->value = $this->value->replace('.', '');
        $this->value = $this->value->replace('-', '');
        $this->value = $this->value->replace('/', '');
        $this->value = $this->value->replace('_', '');

        $this->value = $this->value->truncate($this->getLength());

        if ($actualLength < $this->getLength()) {
            $this->value = $this->value->padLeft($this->getLength(), 0);
        }

        return $this->value;
    }
}
