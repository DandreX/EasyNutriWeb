<?php

/**
 * Created by PhpStorm.
 * User: Sofia Oliveira
 * Date: 27-11-2014
 * Time: 15:29
 */
class distribuicaoDoses extends CModel
{

    protected $alimentos;
    protected $doses;
    protected $proteinas;


    public function attributeNames()
    {
        return array('alimentos', 'doses', 'proteinas');
    }

    public function attributeLabels()
    {

    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return parent::__get($name);
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            parent::__set($name, $value);
        }

    }
}