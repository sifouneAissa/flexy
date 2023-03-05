<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use App\Models\ProviderType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProviderForm extends Component
{
    use WithFileUploads;
    public $name;
    public $code;
    public $percentage;
    public $item;
    public $percentage_fix = false;
    public $photo = null;
    public $is_service_provider = false;
    public $purl = null;
    public $m_h = 286;
    public $m_w = 286;
    public $d_url;
    public $himage = false;

    public $unit= 'dz';
    public $price_per_unit = 1;
    public $type;
    public $types;



    protected function rules(){
        $rules = [
            'name' => 'required|min:1|'. Rule::unique('providers', 'name')->ignore($this->item->id),
//            'code' => 'required|digits_between:2,5',
            'percentage' => 'required|numeric|between:0.01,99.99',

        ];
        if(!$this->is_service_provider) $rules['code'] = 'required|digits_between:2,5';
        else {
            $rules['photo'] = ($this->himage ? 'nullable|' : 'required|').'image|max:1024|dimensions:min_width='.$this->m_w.',min_height='.$this->m_h.',max_width='.$this->m_w.',max_height='.$this->m_h;
            $rules['unit'] = "required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/";
            $rules['price_per_unit'] = 'required|numeric';
        }

        return $rules;
    }

    public function mount(){
        $this->d_url = 'https://placehold.it/'.$this->m_w.'x'.$this->m_h;

        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->percentage = $this->item->percentage;
        $this->is_service_provider = $this->item->is_service_provider;
        $this->percentage_fix = $this->item->percentage_fix;
        $this->unit = $this->item->unit;
        $this->price_per_unit = $this->item->price_per_unit;

        $this->types = ProviderType::query()->where('active',true)->get();
        $this->type = $this->item->type ? $this->item->type :  $this->types->first()->id;

        if($url = $this->item->getWebP()) {
            $this->d_url = $url;
            $this->himage = true;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPercentageFix(){

        $this->emitTo('pages.providers.provider-edit','setPercentageFix',['value' => $this->percentage_fix]);
    }

    public function updatedPercentage(){
        $this->emitTo('pages.providers.provider-edit','setPercentage',['value' => $this->percentage]);
    }


    public function updatedPhoto()
    {
        $this->purl = $this->photo->getRealPath();
    }

    public function save(){
        $state = $this->validate();
        $this->emitTo('pages.providers.provider-edit','savePercentages',$this->all());
    }

    public function removeImage(){
        $this->photo = null;
        $this->resetValidation(['photo']);
    }


    public function render()
    {
        return view('livewire.forms.edit-provider-form');
    }
}
