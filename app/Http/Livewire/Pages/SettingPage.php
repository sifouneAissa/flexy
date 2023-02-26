<?php

namespace App\Http\Livewire\Pages;

use App\Models\Setting;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingPage extends Component
{
    use WithFileUploads;

    public $name;
    public $content;
    public $itemToUpdate;
    public $photo;
    public $with_photo = false;
    public $m_h = 286;
    public $m_w = 286;
    public $d_url = null;
    public $himage = false;

    protected $listeners = [
        'setModal' => 'setModal'
    ];

    protected function rules(){
        $rules = [
            'name' => 'required|min:1|',
            'content' => 'required|max:255',
        ];

        if($this->with_photo)
        $rules['photo'] = ($this->himage ? 'nullable|' : 'required|').'image|max:1024|dimensions:min_width='.$this->m_w.',min_height='.$this->m_h.',max_width='.$this->m_w.',max_height='.$this->m_h;

        return $rules;
    }


    public function removeImage(){
        $this->photo = null;
        $this->resetValidation(['photo']);
    }


    public function mount(){
        $this->d_url = 'https://placehold.it/'.$this->m_w.'x'.$this->m_h;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        $this->itemToUpdate->update(filterRequest($this->all(),Setting::class));
        if($this->with_photo)
        {
            if($media = $this->itemToUpdate->fimage())
                $media->delete();

            $this->itemToUpdate->addMedia($this->photo)->toMediaCollection();
        }
        // to refresh datatable
        $this->reset(['name','content','with_photo','photo']);

        $this->emit('refreshLivewireDatatable');

        $this->dispatchBrowserEvent('setModal',[
            'state' => false
        ]);
    }

    public function setModal($id){

        // to refresh datatable
        $this->reset(['name','content','with_photo','photo']);

        $this->itemToUpdate = Setting::find($id);
        $this->name = $this->itemToUpdate->name;
        $this->content = $this->itemToUpdate->content;

        if($url = $this->itemToUpdate->getWebP()) {
            $this->d_url = $url;
            $this->with_photo = true;
            $this->himage = true;
        }

        $this->dispatchBrowserEvent('setModal',['state' => true]);
    }
    public function render()
    {
        return view('livewire.pages.setting-page')->layout("livewire.layouts.base-layout");
    }
}
