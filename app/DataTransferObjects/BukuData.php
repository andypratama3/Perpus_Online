<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\Dashboard\Buku\BukuRequest;


class BukuData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $penerbit,
        public readonly string $tahun_terbit,
        public readonly string $penulis,
        public readonly string $seri_buku,
        public readonly array $role_id,
        public readonly ?UploadedFile $buku,
        public readonly ?array $cover,
        public readonly array $categoryBukus,
        public readonly ?string $slug,


    ) {
        //
    }

    public static function fromRequest(BukuRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getDescription(),
            $request->getPenerbit(),
            $request->getTahunTerbit(),
            $request->getPenulis(),
            $request->getBuku(),
            $request->getSeriBuku(),
            $request->getCover(),
            $request->getBukusCatagory(),
            $request->getRole(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'description.required' => 'Kolom Deskripsi tidak boleh kosong!',
            'penerbit.required' => 'Kolom Penerbit tidak boleh kosong!',
            'penulis.required' => 'Kolom Penulis tidak boleh kosong!',
            'role_id.required' => 'Kolom Bukut Untuk Role tidak boleh kosong!',
            'buku.required' => 'Kolom buku tidak boleh kosong!',
            'cover.required' => 'Kolom Cover Tidak Boleh Kosong',
            'cover.required' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'seri_buku.required' => 'Kolom Seri Buku tidak boleh kosong!',
        ];
    }
}
