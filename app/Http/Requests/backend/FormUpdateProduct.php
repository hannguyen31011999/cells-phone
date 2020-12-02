<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateProduct extends FormRequest
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
        return [
            'categories_id'=>'numeric',
            'product_name'=>'required|max:254',
            'desc'=>'required',
            'screen'=>'required|numeric',
            'screen_resolution'=>'required|max:254',
            'operating_system'=>'required|max:254',
            'cpu'=>'required|max:254',
            'gpu'=>'required|max:254',
            'ram'=>'required|numeric',
            'camera_fr'=>'required|max:254',
            'camera_ba'=>'required|max:254',
            'video'=>'required|max:254',
            'pin'=>'required|numeric',
            'image'=>'unique:list_image,image|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'categories_id.numeric'=>'Hãng sản xuất không được trống',
            'product_name.required'=>'Tên sản phẩm không được trống',
            'product_name.max'=>'Tên sản phẩm quá dài',
            'product_name.unique'=>'Tên sản phẩm đã tồn tại',
            'desc.required'=>'Mô tả không được trống',
            'screen.required'=>'Kích thước màn hình trống',
            'screen.numeric'=>'Kích thước màn hình phải là số',
            'screen_resolution.required'=>'Độ phân giải màn hình trống',
            'screen_resolution.max'=>'Độ phân giải màn hình quá dài',
            'operating_system.required'=>'Tên HĐH đang trống',
            'operating_system.max'=>'Tên HĐH quá dài',
            'cpu.required'=>'Chip xử lý đang trống',
            'cpu.max'=>'Chip xử lý tên quá dài',
            'gpu.required'=>'Chip đồ họa đang trống',
            'gpu.max'=>'Chip đồ họa tên quá dài',
            'camera_fr.required'=>'Thông số camera trước đang trống',
            'camera_fr.max'=>'Thông số camera trước quá dài',
            'camera_ba.required'=>'Thông số camera sau đang trống',
            'camera_ba.max'=>'Thông số camera sau quá dài',
            'video.required'=>'Thông số quay video đang trống',
            'video.max'=>'Thông số quay video quá dài',
            'pin.required'=>'Thông số pin không được trống',
            'pin.numeric'=>'Thông số pin là số',
            'ram.required'=>'Thông số ram không được trống',
            'ram.numeric'=>'Ram là số',
            'image.image'=>'Ảnh không đúng định dạng',
            'image.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
            'image.max'=>'Quá kích thước ảnh',
            'image.unique'=>'Ảnh đã tồn tại'
        ];
    }
}
