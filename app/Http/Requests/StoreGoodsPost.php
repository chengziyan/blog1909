<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreGoodsPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //获取当前路由名称
        $name = \Route::currentRouteName();
        if($name=='goodsstore'){
            //添加
            return [
                'goods_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
                'goods_huo' => 'required',
                'cate_id'=>'required',
                'brand_id'=> 'required',
                'goods_price'=> 'required',
                'goods_num'=> 'required|digits_between:1,8',
            ];
        }
        
        if($name=='goodsupdate'){
            // 编辑
            return [
                'goods_name' => [
                    'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                     Rule::unique('goods')->ignore(request()->id,'goods_id'),
                ],
                'goods_huo' => 'required',
                'cate_id'=>'required',
                'brand_id'=> 'required',
                'goods_price'=> 'required',
                'goods_num'=> 'required|digits_between:1,8',
            ];
        }
        
    }


    public function messages(){ 
        return [ 
            'goods_name.regex'=>'商品名称可以包括中文，数字，字母，下划线，长度2~50位',
            'goods_name.unique'=>'商品名称已经存在！',
            'goods_name.max'=>'商品名称最多不能大于10位！',
            'goods_huo.required'=>'商品货号不能为空！',
            'goods_huo.unique'=>'定单号不能重复！',
            'cate_id.required'=>'商品分类必选！',
            'brand_id.required'=>'商品品牌必选！',
            'goods_price.required'=>'价格不能为空！',
            'goods_num.required'=>'库存不能为空！',
            'goods_num.digits_between'=>'库存输入必须1~8位！',
        ]; 
    }
}
