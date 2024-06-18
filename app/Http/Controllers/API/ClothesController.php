<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Clothes;

class ClothesController extends Controller
{
    /**
     * Display a listing of the item.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clothes::get();
    }

    /**
     * Store a newly created item in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $clothes = new Clothes;
            $clothes->fill($request->validated())->save();

            return $clothes;
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }


/**
 * Display the specified item.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $clothes = Clothes::findOrFail($id);

    return $clothes;
}

/**
 * Update the specified item in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    if (!$id) {
        throw new HttpException(400, "Invalid id");
    }

    try {
        $clothes = Clothes::find($id);
        $clothes->fill($request->validated())->save();

        return $clothes;

    } catch (\Exception $exception) {
        throw new HttpException(400, "Invalid data - {$exception->getMessage}");
    }
}

/**
 * Remove the specified item from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $clothes = Clothes::findOrFail($id);
    $clothes->delete();

    return response()->json(null, 204);
}
}
