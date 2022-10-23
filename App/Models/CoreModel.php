<?php

namespace App\Models;

abstract class CoreModel
{
    // force the child class to define these methods
    abstract public function findById(int $id);
    abstract public function findAll();
    abstract public function save();
    abstract public function update(int $id);
    abstract public function delete(int $id);
}