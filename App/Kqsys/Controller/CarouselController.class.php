<?php
namespace Kqsys\Controller;
use Think\Page;
class CarouselController extends CommonController{
    public function classify(){
        $url='HTTP://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];;
        session('url',$url);

        $this->display();
    }
}