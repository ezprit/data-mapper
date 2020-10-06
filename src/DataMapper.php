<?php

namespace DateMapper;

trait DataMapper
{
    public function export($target)
    {
        foreach (array_keys(get_object_vars($target)) as $key) {
            if (property_exists($this, $key)) {
                $target->$key = $this->$key;
            }
        }

        return $target;
    }

    protected function import($source)
    {
        foreach (get_object_vars($source) as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
