<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Contracts\Logging\Log;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $user = $this->users->all();

        return view('users.index')->with(compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('users.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate()
    {
        $data = \Request::all();
        $this->users->fill($data);
        $this->users->save();

        return redirect()->to('/');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        $user = $this->users->find($id);
        return view('users.edit')->withUser($user);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit($id)
    {
        \Log::info('id=' . $id);
        $user = $this->users->find($id);
        \Log::info('name=' . $user->name);
        $data = \Request::all();
        \Log::info($user);
        \Log::info($data);

        $user->fill($data);
        $user->save();
        return redirect()->to('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function postDelete($id)
    {
        $user = $this->users->find($id);
        $user->delete();

        return redirect()->to('/');
    }
}
