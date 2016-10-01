<?php
namespace IFaces;

interface IService
{
    public function listar();
    public function save();
    public function update();
    public function delete();
}