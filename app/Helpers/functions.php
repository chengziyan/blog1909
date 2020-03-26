<?php 
/**
 * 公共函数文件
 */

//文件上传
    function upload($img){
        //接收文件
        $file = request()->$img;
        //判断上传的过程有无错误
        if($file->isValid()){
            $store_result = $file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');

        //判断上传过程中有无错误
        // if(request()->file($img)->isValid()){
        //     //接收文件
        //     $file = request()->$img;
        //     $store_result = $file->store('uploads');
        //     return $store_result;
        // }
        // exit('未获取到上传文件或上传过程出错');
    }

    //多文件上传
    function Moreupload($img)
    {
        $file = request()->$img;
        foreach($file as $k=>$v){
            if($v->isValid()){
                $store_result[$k] = $v->store('uploads'); 
            }else{
                $store_result[$k] = '未获取到上传文件或上传过程出错';
            }
        }
        return $store_result;
    }

    //无限极分类
    function CreateTree($data,$pid=0,$level=0){
        if(!$data){
            return;
        }
        static $newArray = [];
        foreach($data as $v){
            if($v->pid==$pid){
                $v->level = $level;
                $newArray[] = $v;

                //再次调用自身查找符合条件的孩子
                CreateTree($data,$v->cate_id,$level+1);
            }
        }
        return $newArray;
    }

?>