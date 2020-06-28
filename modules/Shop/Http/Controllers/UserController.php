<?php

namespace ListaShop\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use ListaShop\User\Repositories\UserRepository;

/**
 * My account page controller
 */
class UserController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $user;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop::account.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }
}
