<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\User;
use App\Republic;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
  public function createUser(UserRequest $request) {
    $user = new User;

    //attributes
    $user->nickname = $request->nickname;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->street = $request->street;
    $user->number = $request->number;
    $user->neighborhood = $request->neighborhood;
    $user->city = $request->city;
    $user->phone = $request->phone;
    $user->date_birth = $request->date_birth;
    $user->cpf = $request->cpf;
    $user->payment = $request->payment;
    $user->can_post = $request->can_post;

    //saving
    $user->save();

    /*
    //validator
    $validator = Validator::make($request->all(), [
      'nickname' => 'required|string|unique:Users, nickname',
      'email' => 'required|email|unique:Users, email',
      'password' => 'required|min:8',
      'phone' => 'required|min:9|numeric',
      'cpf' => 'required|digits:11|numeric|unique:Users, cpf'
    ]);

    if($validator->fails()) {
      return response()->json($validator->errors());
    }*/

    //returning json
    return response()->json([$user, 'User criado com sucesso!']);
  }

  //find an especific user by id
  public function findUser(Request $request, $id){
    $user = User::findOrFail($id);
    return response()->json($user);
  }

  //list all users
  public function listUser(Request $request){
    $user = User::all();

    return response()->json([$user]);
  }

  //update an existing user
  public function updateUser(UserRequest $request, $id) {
    $user = User::find($id);

    //validating request
    if($user){
      if($request->nickname){
        $user->nickname = $request->nickname;
      }
      if($request->email){
        $user->email = $request->email;
      }
      if($request->password){
        $user->password = $request->password;
      }
      if($request->street){
        $user->street = $request->street;
      }
      if($request->number){
        $user->number = $request->number;
      }
      if($request->neighborhood){
        $user->neighborhood = $request->neighborhood;
      }
      if($request->city){
        $user->city = $request->city;
      }
      if($request->phone){
        $user->phone = $request->phone;
      }
      if($request->date_birth){
        $user->date_birth = $request->date_birth;
      }
      if($request->cpf){
        $user->cpf = $request->cpf;
      }
      if($request->payment){
        $user->payment = $request->payment;
      }
      if($request->can_post){
        $user->can_post = $request->can_post;
      }
        $user->save();
        return response()->json([$user, 'User atualizado com sucesso!']);
      }
      else {
        return response()->json(['Este user nao existe']);
      }
  }

  //deletes an existing user
  public function deleteUser(Request $request, $id){
    User::destroy($id);

    return response()->json(['User deletado com sucesso!']);
  }
}
