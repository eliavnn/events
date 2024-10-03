<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        $organizations = $request->user()->organizations;
        $store_url = route('organizations.store');
        return Inertia::render('Organizations/Index',
            [
                'organizations' => $organizations,
                'storeUrl' => $store_url
            ]
        );
    }

    public function store(Request $request)
    {
        $validated_org = $request->validate([
            "name" => ["required", "string", "max:255"],
            "main_image" => ["nullable", "image", "max:2048"],
            "logo" => ["nullable", "image", "max:2048"],
            "description" => "nullable",
            "website" => "nullable",
            "contact_phone" => "nullable",
            "contact_email" => "nullable",
            "address" => "nullable",
            "city" => "nullable",
            "state" => "nullable",
            "country" => "nullable",
            "postal_code" => "nullable",
        ]);

        $validated_org["user_id"] = $request->user()->id;

        if ($request->hasFile("logo")) {
            $validated_org["logo"] = $request->file("logo")->store("organizations/logos");
        }

        if ($request->hasFile("main_image")) {
            $validated_org["main_image"] = $request->file("main_image")->store("organizations/main_images");
        }

        Organization::create($validated_org);
        return redirect(route("organizations.index"));
    }
}
