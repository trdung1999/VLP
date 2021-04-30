<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateGalleyComponent extends Component
{
    use WithFileUploads;
    public $gallery_id;
    public $title;
    public $image;
    public $new_image;

    public function mount($gallery_id){
        $this->gallery_id = $gallery_id;
        $gallery = Gallery::where('id',$this->gallery_id)->first();
        $this->title = $gallery->title;
        $this->image = $gallery->image;
    }

    public function updateGallery(){
        $gallery = Gallery::find($this->gallery_id);
        $gallery->title = $this->title;
        if($this->new_image){
            $imageName = Carbon::now()->timestamp. '.'.$this->new_image->extension();
            $this->new_image->storeAs('galleries',$imageName);
            $gallery->image = $imageName;
        }
        $gallery->save();
        session()->flash('message','Cập nhật hình ảnh thành công !');
    }

    public function render()
    {
        return view('livewire.admin.update-galley-component')->layout('layouts.base');
    }
}
