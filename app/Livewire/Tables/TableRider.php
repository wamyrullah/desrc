<?php

namespace App\Livewire\Tables;

use App\Models\Rider;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class TableRider extends Component
{
    use WithPagination;

    public $search = '';

    public $nama = '';
    public $panggilan = '';
    public $number_plate = '';
    public $team = '';
    public $asal_kota = '';
    public $tanggal_lahir = '';
    public $no_kia = '';

    public function createNewRider()
    {
        // ubah '' → null, dan 'dd/mm/yyyy' → 'Y-m-d'
        $dob = null;
        if (filled($this->tanggal_lahir)) {
            // Flowbite kirim "dd/mm/yyyy"
            $dob = Carbon::createFromFormat('d/m/Y', $this->tanggal_lahir)
                ->format('Y-m-d');
        }
        Rider::create([
            'nama' => $this->nama,
            'panggilan' => $this->panggilan,
            'number_plate' => $this->number_plate,
            'team' => $this->team,
            'asal_kota' => $this->asal_kota,
            'tanggal_lahir' => $dob,
            'no_kia' => $this->no_kia,
        ]);
        $this->reset(['nama', 'panggilan', 'number_plate', 'team', 'asal_kota', 'tanggal_lahir', 'no_kia']);
        $this->resetValidation();
        $this->dispatch('close-modal', id: 'addRiderModal');
    }


    public function render()
    {
        $riders = Rider::query()
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.tables.table-rider', [
            'riders' => $riders
        ]);
    }
}
