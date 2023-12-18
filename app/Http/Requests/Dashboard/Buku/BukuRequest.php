<?php

namespace App\Http\Requests\Dashboard\Buku;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getName(){
        return $this->name;
    }
    public function getPenerbit(){
        return $this->penerbit;
    }
    public function getTahunTerbit(){
        return $this->tahun_terbit;
    }
    public function getPenulis(){
        return $this->penulis;
    }
    public function getBuku(){
        return $this->buku;
    }
    public function getSeriBuku(){
        return $this->seri_buku;
    }
    public function getBukusCatagory(){
        return $this->categoryBukus;
    }
    public function getUserAdd(){
        return $this->user_add;
    }
    public function getCover(){
        return $this->cover;
    }


    public function getSlug(){
        return $this->slug;
    }


    public function rules(): array
    {
        return [
            //
        ];
    }
}
