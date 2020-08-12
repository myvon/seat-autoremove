<?php


namespace Lvlo\Autoremove\Http\Controllers;


use Lvlo\Autoremove\Http\Validation\AddCorporation;
use Lvlo\Autoremove\Models\AutoremoveCorporation;
use Seat\Eveapi\Models\Corporation\CorporationInfo;
use Seat\Web\Http\Controllers\Controller;

class AutoremoveController extends Controller
{

    public function show()
    {
        $corporationsWhitelist = AutoremoveCorporation::all();

        $ids = [];
        $corporations = [];
        foreach($corporationsWhitelist as $corp) {
            $ids[] = intval($corp->corporation_id);
            $corporations[] =  CorporationInfo::find($corp->corporation_id);
        }
        $corporationsList = [];

        $corporationsListAll = CorporationInfo::all();
        foreach ($corporationsListAll as $corp) {
            if(!in_array(intval($corp->corporation_id), $ids)) {
                $corporationsList[] = $corp;
            }
        }

        return view('autoremove::list', ['corporations' => $corporations, 'list' => $corporationsList]);
    }

    public function addCorp(AddCorporation $addCorporation)
    {
        $id = $addCorporation->request->getInt("corporation_id");

        $autoremove = AutoremoveCorporation::where(['corporation_id' => $id])->first();

        if(!$autoremove instanceof AutoremoveCorporation) {
            $autoremove = new AutoremoveCorporation();
            $autoremove->corporation_id = $id;
            $autoremove->save();
        }

        return redirect()->route('autoremove.show')
            ->with('success', 'Corporation added to whitelist.');
    }
}