<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * 商品一覧画面の表示
     *
     * @param Request $request
     * @return Response $response
     */
    public function index(Request $request)
    {
        $types = [
            '1' => 'キッチン家電',
            '2' => 'オーディオ家電',
            '3' => '健康家電',
            '4' => '季節家電',
            '5' => '映像家電',
        ];

        $search_word = $request->search;
        if ($search_word) {
            //配列を初期化
            $target_type_id_array = [];
            //$typesの配列をループ
            foreach ($types as $key => $type) {
                //配列のキーワードがあれば
                if (mb_strpos($type, $search_word) !== false) {
                    //その配列のキーを代入する
                    $target_type_id_array[] = $key;
                }
            }
            $query = Item::whereHas('user', function ($query) use ($search_word) {
                // 担当者名の検索
                $query->where('name', 'LIKE', "%{$search_word}%");
            });

            $items = $query->orWhere('id', 'LIKE', "%{$search_word}%")
                ->orWhere('name', 'LIKE', "%{$search_word}%")
                ->orWhereIn('type', $target_type_id_array)
                ->get();
        } else {
            $items = Item::all();
        }

        // $searches = Item::Join('users', 'users.id', '=', 'items.user_id')
        //     ->select('users.name as nickname', 'items.*')
        //     ->get();
        // // $searches = Item::orderBy('created_at', 'asc')->get();
        return view('search.index', [
            'searches' => $search_word,
            'items' => $items,
        ]);
    }

    /**
     * 詳細画面の表示
     *
     * @param Request $request
     * @return Response $response
     */
    public function detail(Request $request, $id)
    {
        $item = Item::Join('users', 'users.id', '=', 'items.user_id')
            ->where('items.id', $id)
            ->select('users.name as nickname', 'items.*')
            ->first();
        return view('search.detail', [
            'item' => $item,
        ]);
    }
}
