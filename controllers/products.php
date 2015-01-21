<?php

class products extends Controller {

    function index(){
        $this->products=get_all('select * from product');

    }
    function view(){
        $product_id=$this->params[0];
        $this->product=get_first("select * from product where product_id='$product_id'");

    }
}