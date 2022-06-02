<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function __construct() {
        $this->client = new Client();
    }
    public function client() {
        $clients = $this->client->getAll();
        // dd($clients);
        return view('admin.categoryClient',compact('clients'));
    }
}
