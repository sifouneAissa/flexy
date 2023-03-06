<?php

namespace App\Http\Livewire\Forms;

use App\Models\PaymentMethod;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMPaymentForm extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $m_h = 132;
    public $m_w = 178;
    public $photo;
    public $d_img;
    public $name;
    public $provider;
    public $description;


    protected function rules(){
        $rules = [
            'name' => 'required|min:1|unique:providers',
            'provider' => 'required|min:1',
            'description' => 'required|min:5|max:255',
            'photo' =>'required|image|max:1024|dimensions:min_width='.$this->m_w.',min_height='.$this->m_h.',max_width='.$this->m_w.',max_height='.$this->m_h
        ];

        return $rules;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }


    public function mount(){
            $this->d_img = 'https://placehold.it/'.$this->m_w.'x'.$this->m_h;
    }

    public function save(){
        $this->validate();
        startTransaction(function (){
            $model = PaymentMethod::query()->create(filterRequest($this->all(),PaymentMethod::class));
            $model->addMedia($this->photo)->toMediaCollection();
             return redirect()->route('mpayment.index');
        });
    }

    public function render()
    {
        return view('livewire.forms.add-m-payment-form');
    }
}
