<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the users. Here
     * you may consult the user id to make
     * transactions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->user->rules(), $this->user->feedback());
        $user = $this->user->create($request->all());
        // $user->password = bcrypt($request->password);

        // $user = new User();
        // $user->getWallet();

        $user->wallet()->create([
          'balance' => 0.00,
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = $this->user->find($id);
        if($user === null) {
          return response()->json(['erro' => 'User does not exist.'], 404) ;
        }

      return response()->json($user, 200);
    }
}
