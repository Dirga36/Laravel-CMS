<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = [
            [
                "id" => 1,
                "nama" => "ronald Alberty",
                "umur" => 20
            ],
            [
                "id" => 2,
                "nama" => "kevin Leonardo",
                "umur" => 24
            ],
            [
                "id" => 3,
                "nama" => "Stevano Michael",
                "umur" => 20
            ]
        ];
        return view("users.users", ["users" => $users]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $users = [
            [
                "id" => 1,
                "nama" => "ronald Alberty",
                "umur" => 20
            ],
            [
                "id" => 2,
                "nama" => "kevin Leonardo",
                "umur" => 24
            ],
            [
                "id" => 3,
                "nama" => "Stevano Michael",
                "umur" => 20
            ]
        ];
        $result = null;
        foreach ($users as $user) {
            if ($user["id"] == $id) {
                $result = $user;
                break;
            }
        }
        return view("users.detail", ["user" => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            "nama" => ["required", "min:3"],
            "umur" => ["required", "min:1", "integer"],
            "gambar" => ["required", "file", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
        ]);

        if ($request->hasFile("gambar")) {
            $payload["gambar"] = $request->file("gambar")->store("images", "public");
        }

        return view("users.create", [
            "payload" => $payload,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
