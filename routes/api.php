<?php

use App\Models\ListEntries;
use App\Models\Lists;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('user', function () {
    return response(Users::all()->toJson(), 200);
});

Route::get('user/{id}', function (string $id) {
    try {
        return response(Users::query()->findOrFail($id)->toJson(), 200);
    } catch (Throwable) {
        return response('Not found', 404);
    }
});

Route::post('user/{id}', function (Request $request) {
    $user = new Users();
    $user->Id = Str::uuid();
    $user->Email = $request['body.email'];
    $user->FirstName = $request['body.firstName'];
    $user->LastName = $request['body.lastName'];
    $user->save();
    return response($user, 201);
});

Route::put('user/{id}', function (Request $request, string $id) {
    $user = Users::query()->findOrFail($id);
    $user->update();
    return $user;
});

Route::delete('user/{id}', function (string $id) {
    Users::query()->find($id)->delete();
    return 204;
});

Route::get('list', function () {
    return response(Lists::all()->toJson(), 200);
});

Route::get('list/{id}', function (string $id) {
    try {
        return response(Lists::query()->findOrFail($id)->toJson(), 200);
    } catch (Throwable) {
        return response('Not found', 404);
    }
});

Route::post('list/{id}', function (Request $request) {
    $list = new Lists();
    $list->Id = Str::uuid();
    $list->User_Id = $request['body.userId'];
    $list->Name = $request['body.name'];
    $list->save();
    return response($list, 201);
});

Route::put('list/{id}', function (Request $request, string $id) {
    $list = Lists::query()->findOrFail($id);
    $list->update([
                      'User_Id' => $request['body.userId'],
                      'Name' => $request['body.name'],
                  ]);
    return response($list->toJson(),200);
});

Route::delete('list/{id}', function (string $id) {
    Lists::query()->find($id)->delete();
    return 204;
});


Route::get('listEntry', function () {
    return response(ListEntries::all()->toJson(), 200);
});

Route::get('listEntry/{id}', function (string $id) {
    try {
        return response(ListEntries::query()->findOrFail($id)->toJson(), 200);
    } catch (Throwable) {
        return response('Not found', 404);
    }
});

Route::post('listEntry/{id}', function (Request $request) {
    return ListEntries::query()->create($request->all());
});

Route::put('listEntry/{id}', function (Request $request, string $id) {
    $listEntrie = ListEntries::query()->findOrFail($id);
    $listEntrie->update($request->all());
    return $listEntrie;
});

Route::delete('listEntry/{id}', function (string $id) {
    ListEntries::query()->find($id)->delete();
    return 204;
});
