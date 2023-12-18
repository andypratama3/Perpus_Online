<?php
namespace App\Actions\Dashboard\Jurnal;

use App\Models\Jurnal;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ActionJurnal
{
    public function execute($JurnalData)
    {
        if($JurnalData->jurnal){
            $file_Jurnal = $JurnalData->jurnal;
            $ext = $file_Jurnal->getClientOriginalExtension();
            $upload_path = public_path('storage/jurnal/');
            $file_name = 'Jurnal'.Str::slug($JurnalData->name).'_'.date('YmdHis').".$ext";
            $file_Jurnal->move($upload_path, $file_name);
        }else{
            $jurnal = Jurnal::where('slug', $JurnalData->slug)->firstOrFail();
            $file_name = $jurnal->jurnal;
        }

        //get Auth ID
        $Jurnal = Jurnal::updateOrCreate(
            ['slug' => $JurnalData->slug],
            [
                'name' => $JurnalData->name,
                'user_add' => Auth::id(),
                'jurnal' => $file_name,
            ]
        );
        if (empty($JurnalData->slug)) {
            $Jurnal->jurnals_category()->attach($JurnalData->jurnals_category);
        } else {
            $Jurnal->jurnals_category()->sync($JurnalData->jurnals_category);
        }
    }
}
