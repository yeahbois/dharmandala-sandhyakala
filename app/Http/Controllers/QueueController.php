<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectId;
use App\Http\Controllers\FormController;
use App\Services\GoogleSheetService;

class QueueController extends Controller
{
    private $collection;

    public function __construct()
    {
        // Use the native MongoDB database connection
        $this->collection = DB::connection('mongodb')->getCollection('pbqueue');
    }

    /** ✅ Get all data, sorted by orderNo */
    public function getAllData()
    {
        $data = $this->collection
            ->find([], ['sort' => ['orderNo' => 1]])
            ->toArray();

        return response()->json($data);
    }

    /** ✅ Add a new entry to the queue (always at bottom) */
    public function appendData(Request $request)
    {
        $data = $request->only(['nama', 'tipe_antrian']);
        $check = $this->collection->findOne(['nama' => $data['nama']]);
        if ($check) return response()->json(['success' => false, 'message' => 'data sudah ada'], 500);
        $maxOrderDoc = $this->collection->findOne([], ['sort' => ['orderNo' => -1]]);
        $maxOrder = $maxOrderDoc['orderNo'] ?? 0;

        $insertData = [
            'nama' => $data['nama'],
            'tipe' => $data['tipe_antrian'],
            'orderNo' => $maxOrder + 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $this->collection->insertOne($insertData);

        return response()->json(['success' => true, 'data' => $insertData]);
    }

    /** ✅ Remove by name */
    public function removeData($name)
    {
        $target = $this->collection->findOne(['nama' => $name]);
        if (!$target) {
            return response()->json(['error' => 'Not found'], 404);
        }

        // Delete target and shift others up
        $this->collection->deleteOne(['nama' => $name]);
        $this->collection->updateMany(
            ['orderNo' => ['$gt' => $target['orderNo']]],
            ['$inc' => ['orderNo' => -1]]
        );

        return response()->json(['success' => true]);
    }

    /** ✅ Search by name (partial) */
    public function searchByName($name)
    {
        $cursor = $this->collection->find(
            ['nama' => ['$regex' => $name, '$options' => 'i']],
            ['sort' => ['orderNo' => 1]]
        );

        return response()->json(iterator_to_array($cursor));
    }

    /** ✅ Move up by one */
    public function moveUp($name)
    {
        $current = $this->collection->findOne(['nama' => $name]);
        if (!$current) return response()->json(['error' => 'Not found'], 404);
        if ($current['orderNo'] <= 1) return response()->json(['error' => 'Already at top'], 400);

        $prev = $this->collection->findOne(['orderNo' => $current['orderNo'] - 1]);
        if (!$prev) return response()->json(['error' => 'Previous item not found'], 500);

        $this->collection->updateOne(
            ['_id' => new ObjectId($current['_id'])],
            ['$set' => ['orderNo' => $prev['orderNo']]]
        );
        $this->collection->updateOne(
            ['_id' => new ObjectId($prev['_id'])],
            ['$set' => ['orderNo' => $current['orderNo']]]
        );

        return response()->json(['success' => true]);
    }

    /** ✅ Move down by one */
    public function moveDown($name)
    {
        $current = $this->collection->findOne(['nama' => $name]);
        if (!$current) return response()->json(['error' => 'Not found'], 404);

        $next = $this->collection->findOne(['orderNo' => $current['orderNo'] + 1]);
        if (!$next) return response()->json(['error' => 'Already at bottom'], 400);

        $this->collection->updateOne(
            ['_id' => new ObjectId($current['_id'])],
            ['$set' => ['orderNo' => $next['orderNo']]]
        );
        $this->collection->updateOne(
            ['_id' => new ObjectId($next['_id'])],
            ['$set' => ['orderNo' => $current['orderNo']]]
        );

        return response()->json(['success' => true]);
    }

    /** ✅ Move to top */
    public function moveToTop($name)
    {
        $current = $this->collection->findOne(['nama' => $name]);
        if (!$current) return response()->json(['error' => 'Not found'], 404);

        $this->collection->updateMany(
            ['orderNo' => ['$lt' => $current['orderNo']]],
            ['$inc' => ['orderNo' => 1]]
        );
        $this->collection->updateOne(
            ['_id' => new ObjectId($current['_id'])],
            ['$set' => ['orderNo' => 1]]
        );

        return response()->json(['success' => true]);
    }

    /** ✅ Move to bottom */
    public function moveToBottom($name)
    {
        $current = $this->collection->findOne(['nama' => $name]);
        if (!$current) return response()->json(['error' => 'Not found'], 404);

        $maxOrderDoc = $this->collection->findOne([], ['sort' => ['orderNo' => -1]]);
        $maxOrder = $maxOrderDoc['orderNo'] ?? 0;

        $this->collection->updateMany(
            ['orderNo' => ['$gt' => $current['orderNo']]],
            ['$inc' => ['orderNo' => -1]]
        );
        $this->collection->updateOne(
            ['_id' => new ObjectId($current['_id'])],
            ['$set' => ['orderNo' => $maxOrder]]
        );

        return response()->json(['success' => true]);
    }

    /** ✅ Mark as completed */
    public function complete(Request $request)
    {
        $name = $request->input('name');
        $jumlah = $request->input('jumlah');

        $dataPesan = $this->collection->findOne(['nama' => $name]);
        if (!$dataPesan) return \Log::info('not found');

        $data = new \Illuminate\Http\Request([
            'Nama' => $dataPesan['nama'],
            'Jumlah Pesanan' => $jumlah
        ]);

        $googleSheetService = new GoogleSheetService("1MYDCEtoS0BLec9WCfFAhlZoL9txz1QIXnZTQXeDOrHs");
        $formController = new FormController($googleSheetService);
        return $formController->submitForm($data);
    }
}