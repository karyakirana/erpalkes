<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Pegawai;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;

class UsersForm extends Component
{
    public $user_id;
    public $update = false;

    public $pegawai_id;
    public $pegawai_kode;
    public $pegawai_nama;

    public $username;
    public $email;
    public $name;
    public $role = 'guest';
    public $password;
    public $password_confirmation;

    public $passord_change;

    protected $listeners = [
        'setPegawai'
    ];

    public function mount($user_id = null)
    {
        if (!is_null($user_id)){
            $users = User::find($user_id);
            $this->update = true;
            $this->user_id = $users->id;
            $this->pegawai_kode = $users->pegawai->kode;
            $this->pegawai_id = $users->pegawai_id;
            $this->pegawai_nama = $users->pegawai->nama;
            $this->username = $users->username;
            $this->name = $users->pegawai->nama;
            $this->email = $users->email;
        }
    }

    public function setPegawai(Pegawai $pegawai)
    {
        $this->pegawai_id = $pegawai->id;
        $this->pegawai_kode = $pegawai->kode;
        $this->name = $pegawai->nama;
        $this->email = $pegawai->email;
        $this->emit('modalPegawaiHide');
    }

    public function store()
    {
       $this->passord_change = !is_null($this->password);
        // dd($this->passord_change);
        $data = $this->validate([
            'user_id' => ($this->update) ? 'required' : 'nullable',
            'pegawai_id' => 'required',
            'pegawai_kode' => 'required',
            'name' => 'required',
            'email' => ($this->update) ? ['required', 'email'] : ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'username' => ($this->update) ? ['required'] : ['required', 'string', 'max:255', 'unique:'.User::class],
            'role' => 'required'
        ]);
        if ($this->passord_change && !$this->update){
            $dataPassword = $this->validate([
                'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $data = array_merge($data, $dataPassword);
        }
        $store = (!$this->update) ? User::create($data) : User::find($this->user_id)->update($data);
        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.master.users-form');
    }
}
