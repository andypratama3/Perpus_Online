<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\Dashboard\Buku\BukuRequest;


class BukuData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $penerbit,
        public readonly string $tahun_terbit,
        public readonly string $penulis,
        public readonly string $seri_buku,
        public readonly UploadedFile $buku,

        public readonly array $categoryBukus,

        public readonly ?string $slug,


    ) {
        //
    }

    public static function fromRequest(BukuRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getPenerbit(),
            $request->getTahunTerbit(),
            $request->getPenulis(),
            $request->getBuku(),
            $request->getSeriBuku(),
            $request->getBukusCatagory(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'penerbit.required' => 'Kolom Penerbit tidak boleh kosong!',
            'penulis.required' => 'Kolom Penulis tidak boleh kosong!',
            'buku.required' => 'Kolom buku tidak boleh kosong!',
            'seri_buku.required' => 'Kolom Seri Buku tidak boleh kosong!',
        ];
    }
}
