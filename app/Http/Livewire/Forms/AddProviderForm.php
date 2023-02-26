<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProviderForm extends Component
{

    use WithFileUploads;

    public $name;
    public $code;
    public $percentage;
    public $percentage_fix = false;
    public $photo;
    public $is_service_provider = false;
    public $purl = null;
    public $m_h = 286;
    public $m_w = 286;
    public $d_img;

    protected function rules(){
        $rules = [
            'name' => 'required|min:1|unique:providers',
            'percentage' => 'required|numeric|between:0.01,99.99',
            ];

        !$this->is_service_provider ? $rules['code'] = 'required|digits_between:2,5' : $rules['photo'] = 'required|image|max:1024|dimensions:min_width='.$this->m_w.',min_height='.$this->m_h.',max_width='.$this->m_w.',max_height='.$this->m_h;

        return $rules;
    }

    public function mount (){
        $this->d_img = 'https://placehold.it/'.$this->m_w.'x'.$this->m_h;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function updatedPhoto()
    {
        $this->purl = $this->photo->getRealPath();
    }

    public function updatedPercentage(){
        $this->emitTo('pages.providers.provider-add','setPercentage',['value' => $this->percentage]);
    }

    public function updatedPercentageFix(){

        $this->emitTo('pages.providers.provider-add','setPercentageFix',['value' => $this->percentage_fix]);
    }

    public function save(){
        $state = $this->validate();

        $this->emitTo('pages.providers.provider-add','savePercentages',$this->all());
    }


    public function render()
    {
        return view('livewire.forms.add-provider-form');
    }
}
