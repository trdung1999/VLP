<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Partner;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePartnerComponent extends Component
{
    public $partner_id;
    public $name;
    public $image;
    public $new_image;

    public function mount($partner_id){
        $this->partner_id = $partner_id;
        $partner = Partner::where('id',$this->partner_id)->first();
        $this->name = $partner->name;
        $this->image = $partner->image;
    }

    use WithFileUploads;
    public function updatePartner(){
        $partner = Partner::find($this->partner_id);
        $partner->name = $this->name;
        if($this->new_image){
            $imageName = Carbon::now()->timestamp. '.' .$this->new_image->extension();
            $this->new_image->storeAs("sponsor-2",$imageName);
            $partner->image = $imageName;
        }
        $partner->save();
        session()->flash('message','Cập nhật đối tác thành công !');
    }

    public function render()
    {
        return view('livewire.admin.update-partner-component')->layout('layouts.base');
    }
}
