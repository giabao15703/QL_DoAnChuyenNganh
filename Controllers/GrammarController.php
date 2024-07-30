<?php
class GrammarController extends BaseController
{
    public function index()
    {
        return $this->view("frontend.grammars.index");
    }
}